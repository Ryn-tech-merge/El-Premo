<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\User;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coupons = Coupon::latest()->get();
            return Datatables::of($coupons)
                ->addColumn('action', function ($coupon) {
                    $action = '';
                    if(in_array(48,admin()->user()->permission_ids)) {
                        $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $coupon->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
                    }
                    if(in_array(49,admin()->user()->permission_ids)) {
                        $action .= '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $coupon->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button> ';
                    }
                    return $action;
                })
                ->editColumn('is_available',function ($coupon){
                    $status = $coupon->is_available=='yes' ? 'فعال' :'غير فعال' ;
                    $color = $coupon->is_available=='yes' ? 'badge-success' :'badge-danger' ;
                    return '<span class="badge ' . $color . ' " >'.$status.'</a>';
                })
                ->editColumn('type',function ($coupon){
                    return $coupon->type=='value'?'قيمة':'نسبة';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Coupon.index');
    }

    ################ Add Coupon #################
    public function create()
    {
        $users = User::where(['is_active'=>'yes','block'=>'no'])->get();
        return view('Admin.CRUD.Coupon.parts.create',compact('users'))->render();
    }

    public function store(Request $request)
    {
//        return count($request->brands) > 0;
        $valedator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'min_price' => 'required',
            'max_price' => 'required'
        ],
            [
                'code.required' => 'الكود مطلوب',
                'min_price.required' => 'اقل سعر مطلوب',
                'max_price.required' => 'اعلى سعر مطلوب',
                'type.required' => ' النوع مطلوب'
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('users');
        $coupon = Coupon::create($data);

        if ($request->users){
            foreach ($request->users as $user){
                $coupon_user = new CouponUser;
                $coupon_user['user_id'] = $user;
                $coupon_user['coupon_id'] = $coupon->id;
                $coupon_user->save();
            }
        }
        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit Coupon #################
    public function edit(Coupon $coupon)
    {
        $users = User::where(['is_active'=>'yes','block'=>'no'])->get();
        $coupon_users = CouponUser::where('coupon_id',$coupon->id)->pluck('user_id')->toArray();
        $coupon_paid_users = CouponUser::where(['coupon_id'=>$coupon->id,'is_paid'=>'yes'])->pluck('user_id')->toArray();
//        return $coupon_paid_users;
        return view('Admin.CRUD.Coupon.parts.edit', compact('coupon','users','coupon_users','coupon_paid_users'));
    }
    ###############################################
    ################ update Coupon #################
    public function update(Request $request, Coupon $coupon)
    {
        $valedator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'min_price' => 'required',
            'max_price' => 'required'
        ],
            [
                'code.required' => 'الكود مطلوب',
                'min_price.required' => 'اقل سعر مطلوب',
                'max_price.required' => 'اعلى سعر مطلوب',
                'type.required' => ' النوع مطلوب'
            ]
        );

        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

//        return $request->users;
        $data = $request->except('users');
        $coupon->update($data);
//        return $coupon;
        CouponUser::where(['coupon_id'=>$coupon->id,'is_paid'=>'no'])->delete();
        if ($request->users){
            foreach ($request->users as $user){
                $coupon_user = new CouponUser;
                $coupon_user['user_id'] = $user;
                $coupon_user['coupon_id'] = $coupon->id;
                $coupon_user->save();
            }
        }

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete coupon #################
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################

}

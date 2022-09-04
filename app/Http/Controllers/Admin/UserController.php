<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Order;
use App\Models\Target;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $governorate =  in_array($request->governorate ,['null','','all']) ? Governorate::get()->pluck('id'):[$request->governorate];
            $city =  in_array($request->city ,['null','','all']) ? City::get()->pluck('id'):[$request->city];
//            return [$governorate , $city];
            $users = User::with('governorate','city')
                ->whereIn('governorate_id',$governorate)->whereIn('city_id',$city)
                ->latest()->get();

            return Datatables::of($users)
                ->addColumn('action', function ($user) {

                    if(in_array(7,admin()->user()->permission_ids)) {
                        return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $user->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                    }

                })
                ->editColumn('address',function ($user){
                    return $user->address .'<br><a target="_blank" href="'.$user->shop_address_link.'" class="badge badge-success">الذهاب للعنوان</a>';
                })
                ->editColumn('image',function ($user){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$user->image.'">';
                })
                ->editColumn('block',function ($user){
                    $color = $user->block == "yes" ? "danger" :"dark";
                    $text = $user->block == "yes" ? "الغاء حظر" :"حظر";
                    $block =in_array(10,admin()->user()->permission_ids)? "block" : " ";
                        return '<a class="'. $block .' text-center fw-3  text-' . $color . '" data-id="' . $user->id . '" data-text="' . $text . '" style="cursor: pointer"><i class="py-2 fw-3  fa fa-ban text-' . $color . '" ></i></a>';
                })
                ->editColumn('is_active',function ($user){
                    $status = $user->is_active=='yes' ? 'فعال' :'غير فعال' ;
                    $color = $user->is_active=='yes' ? 'badge-success' :'badge-danger' ;
                    $url = in_array(9,admin()->user()->permission_ids) ? url("admin/change_user_active", $user->id) :"";
                        return '<a href="' . $url . '" class="badge ' . $color . ' change_active" >' . $status . '</a>';
                })
                ->editColumn('name',function ($user){
                    return '<a href="'.url("admin/user_profile",$user->id).'" class="text-bold cursor-pointer" >'.$user->name ?? $user->id . " ضيف رقم  " .'</a>';
                })
                ->addColumn('governorate',function ($user){
                    return $user->governorate->name ?? '';
                })
                ->addColumn('city',function ($user){
                    return $user->city->name ?? '';
                })
                ->escapeColumns([])
                ->make(true);
        }
        $governorates = Governorate::all();
        return view('Admin.User.index',compact('governorates'));
    }

    ################ Delete user #################
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ block user #################
    public function block($id)
    {
        $user = User::where('id',$id)->first();
        $text = $user->block == "yes" ? "تم الغاء الحظر بنجاح" :"تم الحظر بنجاح";
        $user->update(['block'=>$user->block=='yes'?'no':'yes']);
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }
    ################ change_active #################
    public function change_active($id)
    {
        $user = User::where('id',$id)->first();
        $text = $user->is_active == "yes" ? "تم الغاء التفعيل بنجاح" :"تم التفعيل بنجاح";
        $user->update(['is_active'=>$user->is_active=='yes'?'no':'yes']);
        return response()->json(
            [
                'success' => 'true',
                'message' => $text
            ]);
    }
    ################ getGovernorateCities #################
    public function getGovernorateCities(Request $request)
    {
        $cities = City::where('governorate_id',$request->id)->get();
        $html = '';
        if (count($cities)>0){
            $html = '<option label=" اختر مدينة ... "></option>
                     <option value="all">الكل</option>';
            foreach ($cities as $city){
                $html.= '<option value="' . $city->id.'">'.$city->name.'</option>';
            }
        }
        return response()->json(
            [
                'success' => 'true',
                'html' => $html
            ]);
    }

    //*********************************************************

    public function user_profile($id){
        $user = User::find($id);
        $new_order_count      = Order::where(['status'=>'new','user_id'=> $id])->count();
        $on_going_order_count = Order::where(['status'=>'on_going','user_id'=> $id])->count();
        $delivery_order_count = Order::where(['status'=>'delivery','user_id'=> $id])->count();
        $canceled_order_count = Order::where(['status'=>'canceled','user_id'=> $id])->count();
        $ended_order_count    = Order::where(['status'=>'ended','user_id'=> $id])->count();

        $targets = Target::orderBy('gifts_for')->get();
        foreach ($targets as $target){
            if ($user->points > $target->gifts_for)
                $target->percentage = 100;
            else
                $target->percentage = round(($user->points/$target->gifts_for)*100,0);
        }

        return view('Admin.User.parts.profile',compact('user','new_order_count','ended_order_count',
        'on_going_order_count','delivery_order_count','canceled_order_count','targets'));
    }

}

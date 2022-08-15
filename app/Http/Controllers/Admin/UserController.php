<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
//            return 1111;
            $users = User::latest()->get();
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $user->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';

                })
                ->editColumn('address',function ($user){
                    return $user->address .'<br><a target="_blank" href="'.$user->shop_address_link.'" class="badge badge-success">الذهاب للعنوان</a>';
                })
                ->editColumn('block',function ($user){
                    $color = $user->block == "yes" ? "danger" :"dark";
                    $text = $user->block == "yes" ? "الغاء حظر" :"حظر";
                    return '<a class="block text-center cursor-pointer fw-3  text-'.$color.'" data-id="' . $user->id . '" data-text="' . $text . '" ><i class="py-2 fw-3  fa fa-ban text-'.$color.'" ></i></span>';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.User.index');
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

}

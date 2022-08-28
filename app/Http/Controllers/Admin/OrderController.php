<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Wallet;

class OrderController extends Controller
{
    public function orderStatus($order_status){
        if ($order_status == 'on_going'){
            $status = 'جارى التحضير';
            $color = 'primary';
        }
        elseif ($order_status == 'delivery'){
            $status = 'جارى التوصيل';
            $color = 'primary';
        }
        elseif ($order_status==='ended'){
            $status = 'منتهى' ;
            $color = 'success';
        }
        elseif ($order_status=== 'canceled'){
            $status = 'تم الالغاء' ;
            $color = 'warning';
        }
        else{
            $status = 'جديد' ; // status ==1
            $color = 'info';
        }

        return ['status'=>$status,'color'=>$color];
    }
//#################################################################
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::with('user')->where('status','!=','waiting')->latest()->get();
            return Datatables::of($orders)
                ->addColumn('action', function ($order) {
                    return '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $order->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })
                ->editColumn('status',function ($order){
                    $order_status =  $this->orderStatus($order->status);
                    $button = '';
                    if ($order->status != 'ended' && $order->status != 'canceled' ) {
                        $button = '<div class="card-options pr-2">
                                    <a class="btn btn-sm statusBtn" style="background-color: #0ea5b9;color: white" href="'.route("change_order_status",$order->id).'"><i class="fa fa-pencil mb-0"></i></a>
                                </div>';
                    }
                    return '
                            <div class="card-header pt-0  pb-0 border-bottom-0">
                            <a  class="badge badge-'. $order_status['color'] .' text-white ">'. $order_status['status']  .'</a>
                                '.$button.'
                            </div>
							';
                })
                ->addColumn('details',function ($order){
                    return '<div class="card-options pr-2">
                                    <a class="btn btn-sm btn-primary text-white statusBtn"  href="' .route("order_details",$order->id).'"><i class="fa fa-book mb-0"></i></a>
                           </div>';
                })
                ->addColumn('user',function ($order){
                    return $order->user->name ?? 'مستخدم محذوف' ;
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Order.index');
    }


    ################ Delete Order #################
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ################ change_order_status #################
    public function change_order_status($id)
    {
        $order = Order::where('id',$id)->first();
        return view('Admin.CRUD.Order.parts.status',compact('order'))->render();
    }
    ################ change_order_status #################
    public function update_order_status(Request $request)
    {
        $order = Order::where('id',$request->id)->first();
        $order->update(['status'=>$request->status]);
        if ($order->status == 'ended'){
        // Wallet
            $setting        = Setting::first();
            $user           = $order->user;
            $user->points   += $setting->purchase_gift;
            $user->save();
            $wallet = new Wallet ;
            $wallet->order_id   = $order->id;
            $wallet->user_id    = $user->id;
            $wallet->type       = 'purchases';
            $wallet->price      = $setting->purchase_gift;
            $wallet->save();
        //end Wallet
        }

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم تغيير الحالة بنجاح '
            ]);
    }

    ##############################################

    ################ order_details #################
    public function order_details($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        return view('Admin.CRUD.Order.parts.details',compact('order'))->render();
    }
}

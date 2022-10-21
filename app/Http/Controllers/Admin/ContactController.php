<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Contact;
use App\Models\Notification;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contacts = Contact::latest()->get();
            return Datatables::of($contacts)
                ->addColumn('action', function ($contact) {
                if(in_array(21,admin()->user()->permission_ids)) {
                    return '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $contact->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>
                       ';
                    }
                })
                ->addColumn('replay', function ($contact) {
                    if ($contact->user_id == null) return '';
                    if(in_array(20,admin()->user()->permission_ids)) {
                        return '
                            <div class="card-options pr-2">
                                <a class="btn btn-sm btn-primary text-white replayBtn"  href="' . url("admin/replay_contact", $contact->user_id) . '"><i class="fa fa-reply mb-0"></i></a>
                            </div>';
                    }
                })
                ->addColumn('user', function ($contact) {
                    if (!$contact->user) return '';
                    return '<a href="'.url("admin/user_profile",$contact->user->id).'" class="text-bold cursor-pointer" >'.$contact->user->name ?? $contact->user->id . " ضيف رقم  " .'</a>';
                })->addColumn('checkbox' , function ($contact){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$contact->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Contact.index');
    }

    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Contact::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ################ Delete Contact #################
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################
    public function replay($id)
    {
        return view('Admin.Contact.parts.replay', compact('id'));
    }

    ##############################################
    public function post_replay(Request $request)
    {
        $notification = new Notification;
        $notification->user_id = $request->user_id;
        $notification->title = 'تم الرد على رسالتك';
        $notification->message = $request->message;
        $notification->save();

        firebase_notification($notification->title,$notification->message,$notification->user_id);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }

    ##############################################
}

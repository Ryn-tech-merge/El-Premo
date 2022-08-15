<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contacts = Contact::latest()->get();
            return Datatables::of($contacts)
                ->addColumn('action', function ($contact) {
                    return '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $contact->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>
                       ';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Contact.index');
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
}

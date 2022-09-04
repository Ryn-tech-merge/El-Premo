<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Target;

class TargetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $targets = Target::latest()->get();
//            return $targets;
            return Datatables::of($targets)
                ->addColumn('action', function ($target) {
                    $action = '';
                    if(in_array(44,admin()->user()->permission_ids)) {
                        $action .= '<button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $target->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
                    }
                    if(in_array(45,admin()->user()->permission_ids)) {
                        $action .= '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $target->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    }
                    return $action;
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Target.index');
    }


    ################ Add target #################
    public function create()
    {
        return view('Admin.CRUD.Target.parts.create')->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'gifts_for' => 'required',
            'gifts_price' => 'required',
        ],
            [
                'gifts_for.required' => 'عدد النقاط مطلوب',
                'gifts_price.required' => 'السعر مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        Target::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit target #################
    public function edit(Target $target)
    {
        return view('Admin.CRUD.Target.parts.edit', compact('target'));
    }
    ###############################################
    ################ update Target #################
    public function update(Request $request, Target $target)
    {
        $valedator = Validator::make($request->all(), [
            'gifts_for' => 'required',
            'gifts_price' => 'required',
        ],
            [
                'gifts_for.required' => 'عدد النقاط مطلوب',
                'gifts_price.required' => 'السعر مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $target->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete Target #################
    public function destroy(Target $target)
    {
        $target->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################
}

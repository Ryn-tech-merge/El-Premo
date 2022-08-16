<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $units = Unit::latest()->get();
            return Datatables::of($units)
                ->addColumn('action', function ($unit) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $unit->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $unit->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Unit.index');
    }


    ################ Add Unit #################
    public function create()
    {
        return view('Admin.Unit.parts.create')->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        Unit::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit Unit #################
    public function edit(Unit $unit)
    {
        return view('Admin.Unit.parts.edit', compact('unit'));
    }
    ###############################################
    ################ update unit #################
    public function update(Request $request, Unit $unit)
    {
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $unit->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete Unit #################
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################

}

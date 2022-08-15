<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Traits\PhotoTrait;
use App\Models\Brand;
use App\Models\Category;

class SubCategoryController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sub_categorys = Brand::with('category')->latest()->get();
            return Datatables::of($sub_categorys)
                ->addColumn('action', function ($sub_category) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $sub_category->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $sub_category->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })

                ->editColumn('image',function ($sub_category){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$sub_category->image.'">';
                })
                ->addColumn('category',function ($sub_category){
                    return $sub_category->category->name ?? 'قسم محذوف';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.SubCategory.index');
    }


    ################ Add sub_category #################
    public function create()
    {
        $categories = Category::all();
        return view('Admin.SubCategory.parts.create',compact('categories'))->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'image' => 'required',
        ],
            [
                'category_id.required' => 'القسم مطلوب',
                'name.required' => 'الاسم مطلوب',
                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $data['image']    = 'uploads/sub_categories/'.$this->saveImage($request->image,'uploads/sub_categories');
        Brand::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit sub_category #################
    public function edit(Brand $sub_category)
    {
        $categories = Category::all();
        return view('Admin.SubCategory.parts.edit', compact('sub_category','categories'));
    }
    ###############################################
    ################ update sub_category #################
    public function update(Request $request, Brand $sub_category)
    {
        $valedator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
//            'image' => 'required',
        ],
            [
                'category_id.required' => 'القسم مطلوب',
                'name.required' => 'الاسم مطلوب',
//                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();

        if ( $request->image && $request->image != null ){
            if (file_exists($sub_category->getAttributes()['image'])) {
                unlink($sub_category->getAttributes()['image']);
            }
            $data['image']    = 'uploads/sub_categories/'.$this->saveImage($request->image,'uploads/sub_categories');

        }
        $sub_category->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete sub_category #################
    public function destroy(Brand $sub_category)
    {
        $sub_category->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################

}

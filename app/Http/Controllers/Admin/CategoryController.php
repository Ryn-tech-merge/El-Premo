<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\PhotoTrait;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categorys = Category::latest()->get();
            return Datatables::of($categorys)
                ->addColumn('action', function ($category) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $category->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $category->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })->addColumn('images', function ($category) {
                    $url = route("category_images.index",'category_id='.$category->id);
                    return '
                                <a href="'.$url.'" class="btn btn-default btn-success btn-sm mb-2  mb-xl-0 " ><i class="fa fa-image text-white fs-16"></i></a>
                            ';
                })
                ->editColumn('image',function ($category){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$category->image.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Category.index');
    }


    ################ Add category #################
    public function create()
    {
        return view('Admin.Category.parts.create')->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $data['image']    = 'uploads/categories/'.$this->saveImage($request->image,'uploads/categories');
        Category::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit category #################
    public function edit(Category $category)
    {
        return view('Admin.Category.parts.edit', compact('category'));
    }
    ###############################################
    ################ update category #################
    public function update(Request $request, Category $category)
    {
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
//            'image' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
//                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();

        if ( $request->image && $request->image != null ){
            if (file_exists($category->getAttributes()['image'])) {
                unlink($category->getAttributes()['image']);
            }
            $data['image']    = 'uploads/categories/'.$this->saveImage($request->image,'uploads/categories');

        }
        $category->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete category #################
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################


}
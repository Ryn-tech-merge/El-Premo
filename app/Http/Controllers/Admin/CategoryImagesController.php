<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Traits\PhotoTrait;

class CategoryImagesController extends Controller
{
      use PhotoTrait;
    public function index(Request $request){
        if ($request->ajax()) {
            $images = CategoryImage::where('category_id',$request->category_id)->latest()->get();
            return Datatables::of($images)
                ->addColumn('action', function ($image) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $image->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $image->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })
                ->editColumn('image',function ($image){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$image->image.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CategoryImages.index',['category_id'=>$request->category_id]);
    }

    ################ Add category_image #################
    public function create(Request $request)
    {
//        return  $request->category_id;
        return view('Admin.CategoryImages.parts.create',['category_id'=>$request->category_id])->render();
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'image' => 'required',
        ],
            [
                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $data['image']    = 'uploads/category_images/'.$this->saveImage($request->image,'uploads/category_images');
        CategoryImage::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }

    ################ Edit category_image #################
    public function edit(CategoryImage $category_image)
    {
        return view('Admin.CategoryImages.parts.edit', compact('category_image'));
    }

    ################ update category_image #################
    public function update(Request $request, CategoryImage $category_image)
    {
//        $valedator = Validator::make($request->all(), [
//            'image' => 'required',
//        ],
//            [
//                'image.required' => ' الصورة مطلوبة',
//            ]
//        );
//        if ($valedator->fails())
//            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();

        if ( $request->image && $request->image != null ){
            if (file_exists($category_image->getAttributes()['image'])) {
                unlink($category_image->getAttributes()['image']);
            }
            $data['image']    = 'uploads/category_images/'.$this->saveImage($request->image,'uploads/category_images');

        }
        $category_image->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete category_image #################
    public function destroy(CategoryImage $category_image)
    {
        if (file_exists($category_image->getAttributes()['image'])) {
            unlink($category_image->getAttributes()['image']);
        }
        $category_image->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\CategoryBrand;
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

//                })->addColumn('images', function ($category) {
//                    $url = route("category_images.index",'category_id='.$category->id);
//                    return '
//                                <a href="'.$url.'" class="btn btn-default btn-success btn-sm mb-2  mb-xl-0 " ><i class="fa fa-image text-white fs-16"></i></a>
//                            ';
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
        $brands = Brand::all();
        return view('Admin.Category.parts.create',compact('brands'))->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return count($request->brands) > 0;
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

        $data = $request->except('brands');
        $data['image']    = 'uploads/categories/'.$this->saveImage($request->image,'uploads/categories');
        $category = Category::create($data);
//        return $category;
//
        if (count($request->brands) > 0){
            foreach ($request['brands'] as $brand){
//                return $brand;
                CategoryBrand::create([
                    'category_id'   => $category->id,
                    'brand_id'      => $brand
                ]) ;

            }
        }


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
        $brands = Brand::all();
        $brand_ids = $category->categoryBrands->pluck('brand_id')->toArray();
//        return $brand_ids;
        return view('Admin.Category.parts.edit', compact('category','brands','brand_ids'));
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

        $data = $request->except('brands');

        if ( $request->image && $request->image != null ){
            if (file_exists($category->getAttributes()['image'])) {
                unlink($category->getAttributes()['image']);
            }
            $data['image']    = 'uploads/categories/'.$this->saveImage($request->image,'uploads/categories');

        }
        $category->update($data);

        if (count($request->brands) > 0){
            CategoryBrand::where('category_id',$category['id'])->delete();
            foreach ($request['brands'] as $brand){
//                return $brand;
                CategoryBrand::create([
                    'category_id'   => $category->id,
                    'brand_id'      => $brand
                ]) ;

            }
        }

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

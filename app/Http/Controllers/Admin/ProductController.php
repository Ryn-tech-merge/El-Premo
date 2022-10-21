<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Traits\PhotoTrait;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Slider;
use App\Models\Cart;

class ProductController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('category','brand','sm_unit','lg_unit')->latest()->get();
            return Datatables::of($products)
                ->addColumn('action', function ($product) {
                    $action = '';
                    if(in_array(32,admin()->user()->permission_ids)) {
                        $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $product->id . '" ><i class="fa fa-edit text-white"></i>
                        </button> ';
                    }
                    if(in_array(33,admin()->user()->permission_ids)) {
                        $action .= '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $product->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    }
                    return $action;

                })
                ->editColumn('image',function ($product){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$product->image.'">';
                })
                ->addColumn('category',function ($product){
                    return $product->category->name??'قسم محذوف';
                })
                ->addColumn('brand',function ($product){
                    return $product->brand->name??'شركة محذوفة';
                })
                ->addColumn('sm_unit',function ($product){
                    return $product->sm_unit->name??'';
                })
                ->addColumn('lg_unit',function ($product){
                    return $product->lg_unit->name??'';
                })
                ->addColumn('lg_amount',function ($product){
                    return $product->amount / $product->lg_sm_amount;
                })
                ->editColumn('is_available',function ($product){
                    $status = $product->is_available=='yes' ? 'فعال' :'غير فعال' ;
                    $color = $product->is_available=='yes' ? 'badge-success' :'badge-danger' ;
                    return '<span class="badge ' . $color . ' " >'.$status.'</a>';
                })->addColumn('checkbox' , function ($product){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$product->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Product.index');
    }


    ################ Add Product #################
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('Admin.CRUD.Product.parts.create',compact('categories','units'))->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sm_unit_id' => 'required',
            'min_sm_amount' => 'required',
            'max_sm_amount' => 'required',
            'sm_unit_price' => 'required',
            'lg_sm_amount' => 'required',
            'lg_amount' => 'required',
            'purchase_price' => 'required',
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'image.required' => ' الصورة مطلوبة',
                'category_id.required' => 'القسم مطلوب',
                'brand_id.required' => ' الشركة مطلوبة',
                'sm_unit_id.required' => ' الوحدة الصغرى مطلوبة',
                'min_sm_amount.required' => ' الحد الادنى للوحدة الصغرى مطلوب',
                'max_sm_amount.required' => ' الحد الاقصى للوحدة الصغرى مطلوب',
                'sm_unit_price.required' => ' سعر الوحدة الصغرى مطلوب',
                'lg_sm_amount.required' => 'كمية الوحدة الكبرى من الصغرى مطلوبة',
                'lg_amount.required' => ' الكمية الكبرى مطلوبة',
                  'purchase_price.required' => ' سعر الشراء مطلوب ',
                ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('lg_amount','buy_lg_unit');
        $data['image']    = 'uploads/product/'.$this->saveImage($request->image,'uploads/product');
        $data['buy_lg_unit'] = $request->buy_lg_unit == 'on' ?'yes':'no';
        $product = Product::create($data);
//        return $product;

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit Product #################
    public function edit(Product $product)
    {
        $product_category = Category::where('id', $product->category_id)->with('categoryBrands.brand')->first();
        $categories = Category::all();
        $units = Unit::all();
        return view('Admin.CRUD.Product.parts.edit', compact('product','categories','units','product_category'));
    }
    ###############################################
    ################ update Product #################
    public function update(Request $request, Product $product)
    {
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
//            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sm_unit_id' => 'required',
            'min_sm_amount' => 'required',
            'max_sm_amount' => 'required',
            'sm_unit_price' => 'required',
            'lg_sm_amount' => 'required',
            'lg_amount' => 'required',
            'purchase_price' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
//                'image.required' => ' الصورة مطلوبة',
                'category_id.required' => 'القسم مطلوب',
                'brand_id.required' => ' الشركة مطلوبة',
                'sm_unit_id.required' => ' الوحدة الصغرى مطلوبة',
                'min_sm_amount.required' => ' الحد الادنى للوحدة الصغرى مطلوب',
                'max_sm_amount.required' => ' الحد الاقصى للوحدة الصغرى مطلوب',
                'sm_unit_price.required' => ' سعر الوحدة الصغرى مطلوب',
                'lg_sm_amount.required' => 'كمية الوحدة الكبرى من الصغرى مطلوبة',
                'lg_amount.required' => ' الكمية الكبرى مطلوبة',
                'purchase_price.required' => ' سعر الشراء مطلوب ',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('lg_amount','buy_lg_unit');
        $data['buy_lg_unit'] = $request->buy_lg_unit == 'on' ?'yes':'no';

        if ( $request->image && $request->image != null ){
            if (file_exists($product->getAttributes()['image'])) {
                unlink($product->getAttributes()['image']);
            }
            $data['image']    = 'uploads/product/'.$this->saveImage($request->image,'uploads/product');

        }
        $product->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################
    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Slider::where(['type'=>'product'])->whereIn('product_id',$ids)->delete();
        Cart::whereIn('product_id',$ids)->delete();
        Product::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete product #################
    public function destroy(Product $product)
    {
        Slider::where(['type'=>'product','product_id'=>$product->id])->delete();
        Cart::where('product_id',$product->id)->delete();
        $product->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################
    ################ get_category_brands #################
    public function get_category_brands(Request $request)
    {
        $category = Category::where('id', $request->id)->with('categoryBrands.brand')->first();
        if (count($category->categoryBrands) > 0){
            $html = '<option value="" selected disabled>اختر شركة  ...</option>';
            foreach ($category->categoryBrands as $brand) {
                $html .= '<option value="' . $brand->brand->id . '">' . $brand->brand->name . '</option>';
            }
        }
        else{
            $html = '<option value="" selected disabled> لا يوجد شركات </option>';
        }
//        return $category;
        return response()->json(
            [
                'success' => 'true',
                'html' => $html
            ]);
    }

    ##############################################
    public function edit_products_amount(){
        $products = Product::where('is_available','yes')->get();
        return view('Admin.CRUD.Product.parts.edit_amount',compact('products'));
    }
    ##############################################
    public function update_products_amount(Request $request){
        $products = Product::whereIn('id',$request->product_ids)->get();
        foreach ($products as $key=>$product){
            $product->amount = $request['amount'][$key] ;
            $product->save() ;
        }
        return response()->json(['messages' => ['تم تعديل كميات المنتجات بنجاح'], 'success' => 'true']);
    }
}

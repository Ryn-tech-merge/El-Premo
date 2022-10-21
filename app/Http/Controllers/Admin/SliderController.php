<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Traits\PhotoTrait;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Offer;
use App\Models\Brand;
use App\Models\Category;

class SliderController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::with('product','offer','brand')->latest()->get();
            return Datatables::of($sliders)
                ->addColumn('action', function ($slider) {
                    $action = '';
                    if(in_array(24,admin()->user()->permission_ids)) {
                        $action .= '<button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $slider->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
                    }
                    if(in_array(25,admin()->user()->permission_ids)) {
                        $action .= '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $slider->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    }
                    return $action;

                })
                ->editColumn('image',function ($slider){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$slider->image.'">';
                })
                ->editColumn('type',function ($slider){
                    if ($slider->type == 'offer') $type = 'عرض';
                    elseif($slider->type == 'brand') $type = 'شركة';
                    else $type = 'منتج';
                    return $type;
                })
                ->editColumn('product_id',function ($slider){
                    if ($slider->type == 'offer') return $slider->offer->name ?? 'عرض محذوف';
                    elseif($slider->type == 'brand') return $slider->brand->name ?? 'شركة محذوفة';
                    else return $slider->product->name ?? 'منتج محذوف';
                })->addColumn('checkbox' , function ($slider){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$slider->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Slider.index');
    }


    ################ Add Slider #################
    public function create()
    {
        $products = Product::all();
        $offers = Offer::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('Admin.Slider.parts.create',compact('products','offers','brands','categories'))->render();
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'type' => 'required',
//            'product_id' => 'required',
            'image' => 'required',
        ],
            [
                'type.required' => 'النوع مطلوب',
//                'product_id.required' => 'المنتج مطلوب',
                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('product_id','offer_id','brand_id');
        $data['image']    = 'uploads/sliders/'.$this->saveImage($request->image,'uploads/sliders');
        if ($request->type == 'product') $data['product_id'] = $request->product_id;
        elseif ($request->type == 'offer') $data['product_id'] = $request->offer_id;
        else $data['product_id'] = $request->brand_id;
        Slider::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح '
            ]);
    }
    ###############################################


    ################ Edit slider #################
    public function edit(Slider $slider)
    {
        $products = Product::all();
        $offers = Offer::all();
//        $brands = Brand::all();
        $categories = Category::all();
        $brands = Category::where('id', $slider->category_id)->with('categoryBrands.brand')->first();
        return view('Admin.Slider.parts.edit', compact('slider','products','offers','brands','categories'));
    }
    ###############################################
    ################ update slider #################
    public function update(Request $request, Slider $slider)
    {
        $valedator = Validator::make($request->all(), [
            'type' => 'required',
//            'product_id' => 'required',
        ],
            [
                'type.required' => 'النوع مطلوب',
//                'product_id.required' => 'المنتج مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('product_id','offer_id','brand_id');

        if ( $request->image && $request->image != null ){
            if (file_exists($slider->getAttributes()['image'])) {
                unlink($slider->getAttributes()['image']);
            }
            $data['image']    = 'uploads/sliders/'.$this->saveImage($request->image,'uploads/sliders');

        }
//        return $data;
        if ($request->type == 'product') $data['product_id'] = $request->product_id;
        elseif ($request->type == 'offer') $data['product_id'] = $request->offer_id;
        else $data['product_id'] = $request->brand_id;

        $slider->update($data);

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
        Slider::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete slider #################
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################
}

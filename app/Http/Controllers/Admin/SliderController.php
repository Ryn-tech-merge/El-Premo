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

class SliderController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::with('product','offer','brand')->latest()->get();
            return Datatables::of($sliders)
                ->addColumn('action', function ($slider) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $slider->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $slider->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

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
        return view('Admin.Slider.parts.create',compact('products','offers','brands'))->render();
    }

    public function store(Request $request)
    {
//        return $request;
        $valedator = Validator::make($request->all(), [
            'type' => 'required',
            'product_id' => 'required',
            'image' => 'required',
        ],
            [
                'type.required' => 'النوع مطلوب',
                'product_id.required' => 'المنتج مطلوب',
                'image.required' => ' الصورة مطلوبة',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        $data['image']    = 'uploads/sliders/'.$this->saveImage($request->image,'uploads/sliders');
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
        $brands = Brand::all();
        return view('Admin.Slider.parts.edit', compact('slider','products','offers','brands'));
    }
    ###############################################
    ################ update slider #################
    public function update(Request $request, Slider $slider)
    {
        $valedator = Validator::make($request->all(), [
            'type' => 'required',
            'product_id' => 'required',
        ],
            [
                'type.required' => 'النوع مطلوب',
                'product_id.required' => 'المنتج مطلوب',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();

        if ( $request->image && $request->image != null ){
            if (file_exists($slider->getAttributes()['image'])) {
                unlink($slider->getAttributes()['image']);
            }
            $data['image']    = 'uploads/sliders/'.$this->saveImage($request->image,'uploads/sliders');

        }
//        return $data;

        $slider->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

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

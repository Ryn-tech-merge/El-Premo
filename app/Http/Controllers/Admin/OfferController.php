<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Http\Traits\PhotoTrait;
use App\Models\Offer;
use App\Models\Product;
use App\Models\OfferProduct;

class OfferController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $offers = Offer::latest()->get();
            return Datatables::of($offers)
                ->addColumn('action', function ($offer) {
                    return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $offer->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>

                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $offer->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>

                       ';

                })
                ->editColumn('image',function ($offer){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$offer->image.'">';
                })
                ->editColumn('type',function ($offer){
                    return $offer->type=='value'?'قيمة':'نسبة';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Offer.index');
    }


    ################ Add Offer #################
    public function create()
    {
        $products = Product::all();
        return view('Admin.CRUD.Offer.parts.create',compact('products'))->render();
//        return response()->json('');
    }

    public function store(Request $request)
    {
//        return count($request->brands) > 0;
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'type' => 'required',
            'old_price' => 'required',
            'price' => 'required',
            'product_id' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
                'image.required' => ' الصورة مطلوبة',
                'old_price.required' => 'الاسم القديم مطلوب',
                'price.required' => 'الاسم الحالى مطلوب',
                'type.required' => ' النوع مطلوب',
                'product_id.required' => ' يجب اضافة منتجات ',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('product_id','amount');
        $data['image']    = 'uploads/offer/'.$this->saveImage($request->image,'uploads/offer');
        $offer = Offer::create($data);
        if (count($request->product_id) > 0){
            foreach ($request['product_id'] as $key=>$product){
//                return $brand;
                OfferProduct::create([
                    'product_id'   => $product,
                    'offer_id'     => $offer->id,
                    'amount'       => $request->amount[$key]
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


    ################ Edit offer #################
    public function edit(Offer $offer)
    {
        $offer_category = Category::where('id', $offer->category_id)->with('categoryBrands.brand')->first();
        $categories = Category::all();
        $units = Unit::all();
        return view('Admin.CRUD.Offer.parts.edit', compact('offer','categories','units','offer_category'));
    }
    ###############################################
    ################ update offer #################
    public function update(Request $request, Offer $offer)
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
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('lg_amount');

        if ( $request->image && $request->image != null ){
            if (file_exists($offer->getAttributes()['image'])) {
                unlink($offer->getAttributes()['image']);
            }
            $data['image']    = 'uploads/offer/'.$this->saveImage($request->image,'uploads/offer');

        }
        $offer->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ###############################################

    ################ Delete offer #################
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ##############################################

}

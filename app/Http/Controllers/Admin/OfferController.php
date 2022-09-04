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
use App\Models\Category;

class OfferController extends Controller
{
    use PhotoTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $offers = Offer::latest()->get();
            return Datatables::of($offers)
                ->addColumn('action', function ($offer) {
                    $action = '';
                    if(in_array(36,admin()->user()->permission_ids)) {
                        $action .= '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $offer->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>';
                    }
                    if(in_array(37,admin()->user()->permission_ids)) {
                        $action .= '
                        <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $offer->id . '" ><i class="fa fa-trash-o text-white"></i>
                        </button>';
                    }
                    return $action;

                })
                ->editColumn('image',function ($offer){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px" onclick="window.open(this.src)" src="'.$offer->image.'">';
                })
                ->editColumn('type',function ($offer){
                    return $offer->type=='value'?'قيمة':'نسبة';
                })
                ->editColumn('is_available',function ($product){
                    $status = $product->is_available=='yes' ? 'فعال' :'غير فعال' ;
                    $color = $product->is_available=='yes' ? 'badge-success' :'badge-danger' ;
                    return '<span class="badge ' . $color . ' " >'.$status.'</a>';
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

        $data = $request->except('product_id','amount','unit_id');
        $data['image']    = 'uploads/offer/'.$this->saveImage($request->image,'uploads/offer');
        $data['amount']    = $request->offer_amount;
        unset($data['offer_amount']);
        $offer = Offer::create($data);
        if (count($request->product_id) > 0){
            foreach ($request['product_id'] as $key=>$product){
//                return $brand;
                OfferProduct::create([
                    'product_id'   => $product,
                    'offer_id'     => $offer->id,
                    'amount'       => $request->amount[$key],
                    'unit_id'       => $request->unit_id[$key]
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
        $products = Product::all();
        return view('Admin.CRUD.Offer.parts.edit', compact('offer','products'));
    }
    ###############################################
    ################ update offer #################
    public function update(Request $request, Offer $offer)
    {
        $valedator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'old_price' => 'required',
            'price' => 'required',
            'product_id' => 'required',
        ],
            [
                'name.required' => 'الاسم مطلوب',
                'old_price.required' => 'الاسم القديم مطلوب',
                'price.required' => 'الاسم الحالى مطلوب',
                'type.required' => ' النوع مطلوب',
                'product_id.required' => ' يجب اضافة منتجات ',
            ]
        );
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->except('product_id','amount','unit_id');

        if ( $request->image && $request->image != null ){
            if (file_exists($offer->getAttributes()['image'])) {
                unlink($offer->getAttributes()['image']);
            }
            $data['image']    = 'uploads/offer/'.$this->saveImage($request->image,'uploads/offer');

        }
        $data['amount']    = $request->offer_amount;
        unset($data['offer_amount']);
        $offer->update($data);

        OfferProduct::where('offer_id',$offer->id)->delete();
        if (count($request->product_id) > 0){
            foreach ($request['product_id'] as $key=>$product){
                if ($product != null && $request->amount[$key] != null){
    //                return $brand;
                    OfferProduct::create([
                        'product_id'   => $product,
                        'offer_id'     => $offer->id,
                        'amount'       => $request->amount[$key],
                        'unit_id'       => $request->unit_id[$key]
                    ]);
                }
            }
        }

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
    ################ get_product_units #################
    public function get_product_units(Request $request)
    {
        $product = Product::where('id', $request->id)->with('sm_unit')->first();
        if ($product->sm_unit){
            $html = '<option value="" selected disabled>اختر وحدة  ...</option>';
            $html .= '<option value="' . $product->sm_unit->id . '">' . $product->sm_unit->name . '</option>';
            if ($product->lg_unit){
                $html .= '<option value="' . $product->lg_unit->id . '">' . $product->lg_unit->name . '</option>';
            }
        }
        else{
            $html = '<option value="" selected disabled> لا يوجد وحدات </option>';
        }
//        return $category;
        return response()->json(
            [
                'success' => 'true',
                'html' => $html
            ]);
    }

    ##############################################

}

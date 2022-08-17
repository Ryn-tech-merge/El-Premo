<!--begin::Form-->

<form enctype="multipart/form-data" method="POST" >
    @csrf
    <input type="hidden" name="id" id="order_id" value="{{$order->id}}">
    <div class="row mt-0">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title">تفاصيل الطلب</h5>
                </div>
                <div class="card-body">
                    @if($order->order_details)
                        @foreach($order->order_details as $detail)
                            <div class="clearfix row mb-4">
                                <div class="col">
                                    <div class="float-right">
                                        <h5 class="mb-0">
                                            <strong>
                                                @if($detail->type == 'product')
                                                    {{$detail->product->name ?? ''}}
                                                @else
                                                    {{$detail->offer->name ?? ''}}
                                                @endif
                                            </strong>
                                        </h5>
                                        <small class="text-muted">{{$detail->type == 'product' ? 'منتج':'عرض'}}</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="float-left">
                                        <h4 class="font-weight-bold mb-0 mt-2 text-blue">{{$detail->amount . ' ' . $detail->unit->name}}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="text-center pt-3">
        <div class="d-inline-block pt-3">
            <button type="reset" data-dismiss="modal" class="btn btn-light me-3 " style="width: 100px">غلق</button>
        </div>
    </div>
</form>
<!--end::Form-->





<!--begin::Form-->

<form enctype="multipart/form-data" method="POST" >
    @csrf
    <input type="hidden" name="id" id="order_id" value="{{$order->id}}">
    <div class="row mt-0">
        <h1>تغيير حالة الطلب </h1>
    </div>
    <div class="text-center pt-3">
        <div class="d-inline-block ">
{{--            @if($order->status == 'new')--}}
                <input  form="form" value="تحت الطلب" status="waiting" type="submit" class="btn btn-secondary status_submit" style="width: 100px">
                <input  form="form" value="جارى التحضير" status="on_going" type="submit" class="btn btn-primary status_submit" style="width: 100px">
{{--            @elseif($order->status == 'on_going')--}}
                <input  form="form" value="جارى التوصيل" status="delivery" type="submit" class="btn btn-primary status_submit" style="width: 100px">
{{--            @elseif($order->status == 'delivery')--}}
                <input  form="form" value="انهاء" status="ended" type="submit" class="btn btn-success status_submit" style="width: 100px">
{{--            @endif--}}
{{--            @if($order->status != 'ended')--}}
                <input  form="form" value="الغاء" status="canceled" type="submit" class="btn btn-warning status_submit" style="width: 100px">
{{--            @endif--}}

        </div>
{{--        <div class="d-inline-block ">--}}
{{--            <button type="reset" data-dismiss="modal" class="btn btn-light me-3 " style="width: 100px">غلق</button>--}}
{{--        </div>--}}
    </div>
</form>
<!--end::Form-->





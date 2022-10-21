@extends('layouts.admin.app')
@section('page_title') المنتجات @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل كميات المنتجات</h3>
                </div>
                <div class="card-body">
                    <form  action="{{route('update_products_amount')}}" id="Form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="media mb-5 mt-0">
                            <div class="d-flex ml-3">
                            </div>
                            <div class="media-body">
                                <a href="#" class="text-dark " style="font-weight: bold;font-size: larger">المنتج</a>
                            </div>
                            <div  class="col-4 " style="font-weight: bold;font-size: larger" > الكمية الكبرى</div>
                            <div  class="col-4 " style="font-weight: bold;font-size: larger" > الكمية الصغرى</div>
                        </div>
                        @foreach($products as $product)
                            <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                            <div class="media mb-5 mt-0">
                                <div class="d-flex ml-3">
                                    <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="{{$product->image}}"> </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="text-dark">{{$product->name}}</a>
                                    <div class="text-muted small">{{$product->brand->name??'قسم محذوف'}}</div>
                                </div>
                                <input type="text" id="lg_amount" lg_sm_amount="{{$product->lg_sm_amount}}" class="form-control col-4 numbersOnly change_amount" value="{{$product->amount / $product->lg_sm_amount}}">
                                <input type="text" id="amount" class="form-control col-4 numbersOnly amount" readonly name="amount[]" value="{{$product->amount}}">
                            </div>
                        @endforeach
                        <div class="card-footer ">
                            <input type="submit" class="btn btn-success mt-1" value="حفظ">
                            <input type="reset" class="btn btn-danger mt-1" value="الغاء">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('admin_js')
    <script>
        $(document).on('keyup',".change_amount",function (e) {
            // e.preventDefault();
            var lg_sm_amount = $(this).attr('lg_sm_amount') || 1;
            var lg_amount = $(this).val() || 1;
            $(this).next().closest('.amount').val(lg_amount * lg_sm_amount)

        });
    </script>

    <script>
        $(document).on('submit', '#Form', function (event) {
            event.preventDefault();
            var form_data = new FormData(document.getElementById("Form"));
            var url = $('#Form').attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#global-loader').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('#global-loader').hide()
                        if (data.success == 'true') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message)
                            });
                        }
                        if (data.success == 'false') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 200);
                }, error: function (data) {
                    $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $( error ).each(function(index, message ) {
                        my_toaster(message,'error')
                    });
                }
            });
        });
    </script>

@endpush

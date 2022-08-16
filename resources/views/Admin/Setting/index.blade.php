@extends('layouts.admin.app')
@section('page_title') الاعدادات @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الاعدادات</h3>
                </div>
                <div class="card-body">
                    <form  action="{{route('settings.update',$setting->id)}}" id="Form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label >وقت الطلب</label>
                                    <input name="order_time" type="time" value="{{$setting->order_time}}"  class="form-control" placeholder="وقت الطلب ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >رقم التواصل</label>
                            <input name="call_center" type="text" value="{{$setting->call_center}}" class="form-control numbersOnly" placeholder="رقم التواصل ...">
                        </div>

                        <div class="form-group">
                            <label class="form-label">عدد ايام التوصيل</label>
                            <input name="delivery_days" type="text" value="{{$setting->delivery_days}}" class="form-control numbersOnly" placeholder="رقم التواصل ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">هدية لكل</label>
                            <input name="gift_for" type="text" value="{{$setting->gift_for}}" class="form-control numbersOnly" placeholder="رقم التواصل ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">قيمة الهدية</label>
                            <input name="gift_price" type="text" value="{{$setting->gift_price}}" class="form-control numbersOnly" placeholder="قيمة الهدية ...">
                        </div>
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
        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
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
                    }, 1000);
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

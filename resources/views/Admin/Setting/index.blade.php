@extends('layouts.admin.app')
@section('page_title') الاعدادات @endsection
<!-- INTERNAL  WYSIWYG EDITOR CSS -->
<link href="{{url('admin')}}/assets/plugins/wysiwyag/richtext.css"
      rel="stylesheet"/>

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
                                    <input name="order_time" min="00:00" max="24:00" type="time" value="{{$setting->order_time}}"  class="form-control" placeholder="وقت الطلب ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >رقم التواصل</label>
                            <input name="call_center" type="text" value="{{$setting->call_center}}" class="form-control numbersOnly" placeholder="رقم التواصل ...">
                        </div>

                        <div class="form-group">
                            <label class="form-label">عدد ايام التوصيل</label>
                            <input name="delivery_days" type="text" value="{{$setting->delivery_days}}" class="form-control numbersOnly" placeholder="عدد ايام التوصيل ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label"> الرصيد الافتتاحى للمحفظة</label>
                            <input name="register_gift" type="text" value="{{$setting->register_gift}}" class="form-control numbersOnly" placeholder="الرصيد الافتتاحى للمحفظة ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">الحد الادنى للطلب</label>
                            <input name="min_order_price" type="text" value="{{$setting->min_order_price}}" class="form-control numbersOnly" placeholder="الحد الادنى للطلب ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">الحد الاقصى للطلب</label>
                            <input name="max_order_price" type="text" value="{{$setting->max_order_price}}" class="form-control numbersOnly" placeholder="الحد الاقصى للطلب ...">
                        </div>
                        <!-- ROW-2 OPEN -->
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h3 class="card-title">Summernote</h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div id="summernote"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">الشروط و الاحكام</div>
                                    </div>
                                    <div class="card-body">
                                        <textarea class="content" name="terms">{!! $setting->terms !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">السياسة والخصوصية</div>
                                    </div>
                                    <div class="card-body">
                                        <textarea class="content1" name="privacy">{!! $setting->privacy !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label >صورة اللوجو</label>

                                        <input accept="image/*" type='file' id="imgInp1" name="logo"  class="form-control form-control-solid" />
                                        <img width="100" height="100" id="blah1" src="{{get_file($setting->logo)}}" alt="your image" />
                                   </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label >الصورة فى المتصفح</label>

                                        <input accept="image/*" type='file' id="imgInp2" name="fav_icon"  class="form-control form-control-solid" />
                                        <img width="100" height="100" id="blah2" src="{{get_file($setting->fav_icon)}}" alt="your image" />
                                   </div>
                            </div>
                        </div>
                        <!-- ROW-2 CLOSED -->
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
        imgInp1.onchange = evt => {
            $('#blah1').show()
            const [file] = imgInp1.files
            if (file) {
                blah1.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            $('#blah2').show()
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
    </script>

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

    <!-- INTERNAL   WYSIWYG Editor JS -->
    <script src="{{url('admin')}}/assets/plugins/wysiwyag/jquery.richtext.js"></script>
    <script src="{{url('admin')}}/assets/plugins/wysiwyag/wysiwyag.js"></script>

@endpush

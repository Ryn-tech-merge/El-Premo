<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('products.update',$product->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم"></i>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="الإسم" name="name" value="{{$product->name}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> القسم  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" القسم "></i>
            </label>
            <select class="form-control " id="category_change" name="category_id">
                <option value="" selected disabled> القسم  ...</option>
                @foreach($categories as $category)
                    <option {{$product->category_id == $category->id ? 'selected':''}} value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> القسم الفرعى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" القسم الفرعى "></i>
            </label>
            <select class="form-control " id="brand_change" name="brand_id">
                <option value="" selected disabled>اختر قسم  ...</option>
                @foreach($product_category->categoryBrands as $brand)
                    <option {{$brand->brand->id == $product->brand_id ? 'selected':''}} value="{{$brand->brand->id}}" >{{$brand->brand->name}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الوحدة الصغرى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" الوحدة الصغرى "></i>
            </label>
            <select class="form-control " name="sm_unit_id">
                <option value="" selected disabled> الوحدة الصغرى  ...</option>
                @foreach($units as $unit)
                    <option value="{{$unit->id}}"  {{$unit->id == $product->sm_unit_id ? 'selected':''}}>{{$unit->name}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span > الوحدة الكبرى  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" الوحدة الكبرى "></i>--}}
            </label>
            <select class="form-control " name="lg_unit_id">
                <option value="" selected disabled> الوحدة الكبرى  ...</option>
                @foreach($units as $unit)
                    <option value="{{$unit->id}}"   {{$unit->id == $product->lg_unit_id ? 'selected':''}}>{{$unit->name}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الحد الادنى للوحدة الصغرى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الحد الادنى للوحدة الصغرى "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="الحد الادنى للوحدة الصغرى " name="min_sm_amount" value="{{$product->min_sm_amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الحد الاقصى للوحدة الصغرى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الحد الاقصى للوحدة الصغرى "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="الحد الاقصى للوحدة الصغرى " name="max_sm_amount"  value="{{$product->max_sm_amount}}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >الحد الادنى للوحدة الكبرى  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الحد الادنى للوحدة الكبرى "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="الحد الادنى للوحدة الكبرى " name="min_lg_amount"  value="{{$product->min_lg_amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >الحد الاقصى للوحدة الكبرى  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الحد الاقصى للوحدة الكبرى "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="الحد الاقصى للوحدة الكبرى " name="max_lg_amount"  value="{{$product->max_lg_amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">سعر الوحدة الصغرى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="سعر الوحدة الصغرى "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="سعر الوحدة الصغرى " name="sm_unit_price"   value="{{$product->sm_unit_price}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >سعر الوحدة الكبرى  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="سعر الوحدة الكبرى "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="سعر الوحدة الكبرى " name="lg_unit_price"   value="{{$product->lg_unit_price}}"/>
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->

        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required col-4"> الوحدة الكبرى = </span>
                <input type="text" class="form-control form-control-solid numbersOnly change_amount d-inline-block col-4" placeholder="الكمية " name="lg_sm_amount" id="lg_sm_amount" value="{{$product->lg_sm_amount}}"/>
                <span class="required col-4"> الوحدة الصغرى  </span>

                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="كمية الوحدة الكبرى من الصغرى  "></i>
            </label>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الكمية الكبرى</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الكمية  الكبرى"></i>
            </label>
            <input type="text" class="form-control numbersOnly change_amount" placeholder="الكمية الكبرى " name="lg_amount" id="lg_amount"   value="{{$product->amount / $product->lg_sm_amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الكمية الصغرى</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الكمية الصغرى  "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" readonly placeholder="الكمية الصغرى " id="amount" name="amount"   value="{{$product->amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">سعر الشراء ( للوحدة الصغرى )</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="سعر الشراء ( للوحدة الصغرى )  "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly"  placeholder="سعر الشراء ( للوحدة الصغرى ) " id="purchase_price" name="purchase_price" value="{{$product->purchase_price}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0 ">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الحالة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" الحالة "></i>
            </label>
            <!--end::Label-->
            <div class="d-flex align-items-center mb-3">
                <div class="form-check m-0 ">
                    <input class="form-check-input " type="radio" name="is_available" value="yes" {{$product->is_available == 'yes' ? 'checked' :'' }} >
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        فعال
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input " type="radio" name="is_available" value="no" {{$product->is_available == 'no' ? 'checked' :'' }} >
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        غير فعال
                    </label>
                </div>
            </div>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0 ">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">البيع بالوحدة الكبرى فقط </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" البيع بالوحدة الكبرى فقط "></i>
            </label>
            <!--end::Label-->
            <div class="d-flex align-items-center mb-3 mt-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary" {{$product->buy_lg_unit == 'yes' ? 'checked' : '' }} name="buy_lg_unit" type="checkbox"/>
                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                </div>
            </div>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الصورة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الصورة"></i>
            </label>
            <!--end::Label-->
            <input accept="image/*" type='file' id="imgInp" name="image"  class="form-control form-control-solid" />
            <img width="100" height="100" id="blah" src="{{$product->image}}" alt="your image" />
        </div>
        <!--end::Input group-->


    </div>

</form>
<!--end::Form-->


<script>
    imgInp.onchange = evt => {
        $('#blah').show()
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

<script>
    $(document).on('change',"#category_change",function (e) {
        e.preventDefault();
        var id = $(this).val();
        // alert(id)
        var url = "{{route('get_category_brands')}}?id="+id;
        // alert(url)
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                window.setTimeout(function () {
                    if (data.success === 'true') {
                        $('#brand_change').html(data.html);
                    }else {
                        var messages = Object.values(data.messages);
                        $( messages ).each(function(index, message ) {
                            my_toaster(message,'error')
                        });
                    }
                }, 1000);



            },
            error: function (data) {
                console.log(data)
                if (data.status === 500) {
                    my_toaster('هناك خطأ ما','error')
                }

                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                my_toaster(value,'error')
                            });

                        } else {

                        }
                    });
                }

            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<script>
    $(document).on('keyup',".change_amount",function (e) {
        e.preventDefault();
        // alert($(this).val() || 1)
        var lg_sm_amount = $('#lg_sm_amount').val() || 1;
        var lg_amount = $('#lg_amount').val() || 1;
        $('#amount').val(lg_amount * lg_sm_amount)

    });
</script>



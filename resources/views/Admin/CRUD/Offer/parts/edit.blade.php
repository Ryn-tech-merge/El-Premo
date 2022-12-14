<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('offers.update',$offer->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم"></i>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="الإسم" name="name" value="{{$offer->name}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الكمية </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الكمية"></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="الكمية" name="offer_amount" value="{{$offer->amount}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0 ">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">النوع </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" النوع "></i>
            </label>
            <!--end::Label-->
            <div class="d-flex align-items-center mb-3">
                <div class="form-check m-0 ">
                    <input class="form-check-input type price_change" type="radio" name="type" value="value" {{$offer->type == 'value' ? 'checked' :'' }} >
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        قيمة
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input type price_change" type="radio" name="type" value="percentage" {{$offer->type == 'percentage' ? 'checked' :'' }}>
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        نسبة
                    </label>
                </div>
            </div>
        </div>
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
                    <input class="form-check-input " type="radio" name="is_available" value="yes" {{$offer->is_available == 'yes' ? 'checked' :'' }} >
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        فعال
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input " type="radio" name="is_available" value="no" {{$offer->is_available == 'no' ? 'checked' :'' }} >
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        غير فعال
                    </label>
                </div>
            </div>
        </div>

        <!--begin::Input group-->
        <div class=" mb-2 fv-row col-sm-12 mt-0" id="value_div" style="{{$offer->type == 'percentage'?'display: none':''}}">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >القيمة  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="القيمة "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly price_change" id="value" placeholder="القيمة " name="value" value="{{$offer->value}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class=" mb-2 fv-row col-sm-12 mt-0" id="percentage_div" style="{{$offer->type == 'value'?'display: none':''}}">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span>النسبة  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="النسبة "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly price_change" id="percentage" placeholder="النسبة " name="percentage" value="{{$offer->percentage}}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السعر القديم  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السعر القديم "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly price_change" id="old_price" placeholder="السعر القديم  " name="old_price" value="{{$offer->old_price}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">السعر الحالى  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="السعر الحالى "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" readonly placeholder="السعر الحالى  " id="price" name="price" value="{{$offer->price}}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >تاريخ الابتداء  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="تاريخ الابتداء "></i>--}}
            </label>
            <input type="date" class="form-control form-control-solid  " placeholder="تاريخ الابتداء  " name="start_date" value="{{$offer->start_date}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >تاريخ الانتهاء  </span>
                {{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="تاريخ الانتهاء "></i>--}}
            </label>
            <input type="date" class="form-control form-control-solid  " placeholder="تاريخ الانتهاء  " name="end_date" value="{{$offer->end_date}}"/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">المنتجات  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="المنتجات "></i>
            </label>

            <div class="table-responsive-md">
                <table class="table table-striped-table-bordered table-hover table-checkable table-" id="tbl_posts">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>المنتج</th>
                        <th>الوحدة</th>
                        <th>الكمية</th>
                        <th>
                            <a class="btn btn-info add_record " data-added="0"><i class="fa fa-plus"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tbl_posts_body">
                    @foreach($offer->offerProducts as $key=>$one_product)
                    <tr id="rec-{{$key+1}}">
                        <td><span class="sn">{{$key+1}}</span>.</td>
                        <td>
                            <select name="product_id[]" class="form-control product_change">
                                <option value=""> اختر منتج  </option>
                                @foreach($products as $product)
                                    <option {{$one_product->product_id == $product->id ? 'selected' :''}} value="{{$product->id}}"> {{$product->name}}  </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="unit_id[]"  class="form-control unit_change">
                                <option value="" disabled selected> اختر وحدة  </option>
                                <option value="{{$one_product->product->sm_unit->id}}" {{$one_product->product->sm_unit_id == $one_product->unit_id ? 'selected' :''}} >{{$one_product->product->sm_unit->name}}</option>
                                @if($one_product->product->lg_unit)
                                    <option value="{{$one_product->product->lg_unit->id}}" {{$one_product->product->lg_unit->id == $one_product->unit_id ? 'selected' :''}}>{{$one_product->product->lg_unit->name}}</option>
                                @endif
                            </select>
                        </td>
                        <td>
                            <input type="text" name="amount[]" value="{{$one_product->amount}}" class="form-control numbersOnly" >
                        </td>
                        <td><a class="btn btn-xs delete-record2 " data-id="{{$key+1}}"><i style="color: #f4516c" class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> الصورة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7  text-primary" title="الصورة"></i>
            </label>
            <!--end::Label-->
            <input accept="image/*" type='file' id="imgInp" name="image"  class="form-control form-control-solid" />
            <img width="100" height="100" id="blah" src="{{$offer->image}}" alt="your image" />
        </div>
        <!--end::Input group-->


    </div>

</form>
<!--end::Form-->
<div style="display:none;">
    <table id="sample_table1">
        <tr id="">
            <td><span class="sn"></span>.</td>
            <td>
                <select name="product_id[]" class="form-control product_change">
                    <option value=""> اختر منتج  </option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}"> {{$product->name}}  </option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="unit_id[]"  class="form-control unit_change">
                    <option value="" disabled selected> اختر وحدة  </option>

                </select>
            </td>
            <td>
                <input type="text" name="amount[]" class="form-control numbersOnly" >
            </td>
            <td><a class="btn btn-xs delete-record2 " data-id="0"><i style="color: #f4516c" class="fa fa-trash"></i></a></td>
        </tr>
    </table>
</div>


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
    $(document).on('keyup change',".price_change",function (e) {
        e.preventDefault();
        // alert(1)
        var type = $('.type:checked').val() ;
        var value = $('#value').val() || 0;
        var percentage = $('#percentage').val() || 0;
        var old_price = $('#old_price').val() || 0;
        if(type == 'value'){
            $('#price').val(old_price - value)
            $('#value_div').show()
            $('#percentage_div').hide()
        }else {
            $('#price').val( ( (100-percentage) / 100 ) * old_price )
            $('#percentage_div').show()
            $('#value_div').hide()
        }

    });
</script>

<script>
    jQuery(document).delegate('a.add_record', 'click', function(e) {
        e.preventDefault();
        var content = jQuery('#sample_table1 tr');
        // var tr = $(this).parent().parent().parent().parent()
        var size = $('#tbl_posts_body>tr ').length + 1;
        // alert(size)
        var  element = content.clone();
        element.attr('id', 'rec-'+size);
        element.find('.delete-record2').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
    });
</script>
<script>
    jQuery(document).delegate('a.delete-record2', 'click', function(e) {
        e.preventDefault();
        var id = jQuery(this).attr('data-id');
        jQuery('#rec-' + id).remove();
        $('#tbl_posts_body tr').each(function (index) {
            $(this).find('span.sn').html(index + 1);
        });
        return true;
    });
</script>


<script>
    $(document).on('change',".product_change",function (e) {
        e.preventDefault();
        var id = $(this).val();
        var url = "{{route('get_product_units')}}?id="+id;
        var td = $(this)

        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                window.setTimeout(function () {
                    if (data.success === 'true') {
                        td.parent('td').next('td').children('.unit_change').html(data.html);
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


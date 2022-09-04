<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('coupons.store')}}">
    @csrf
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الكود </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="كود الكوبون"></i>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="كود الكوبون" name="code" value=""/>
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
                    <input class="form-check-input type price_change" type="radio" name="type" value="value" checked>
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        قيمة
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input type price_change" type="radio" name="type" value="percentage">
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
                    <input class="form-check-input  " type="radio" name="is_available" value="yes" checked>
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        فعال
                    </label>
                </div>
                <div class="form-check m-0  ms-3" style="margin-right: 30px!important">
                    <input class="form-check-input  " type="radio" name="is_available" value="no">
                    <label class="form-check-label ms-5" style="margin-right: 20px;">
                        غير فعال
                    </label>
                </div>
            </div>
        </div>


        <!--begin::Input group-->
        <div class=" mb-2 fv-row col-sm-12 mt-0" id="value_div">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >القيمة  </span>
{{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="القيمة "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly price_change" id="value" placeholder="القيمة " name="value" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class=" mb-2 fv-row col-sm-12 mt-0" id="percentage_div" style="display: none">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span>النسبة  </span>
{{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="النسبة "></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly price_change" id="percentage" placeholder="النسبة " name="percentage" value=""/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >تاريخ الابتداء  </span>
{{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="تاريخ الابتداء "></i>--}}
            </label>
            <input type="date" class="form-control form-control-solid  " placeholder="تاريخ الابتداء  " name="start_date" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span >تاريخ الانتهاء  </span>
{{--                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="تاريخ الانتهاء "></i>--}}
            </label>
            <input type="date" class="form-control form-control-solid  " placeholder="تاريخ الانتهاء  " name="end_date" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">اقل سعر  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="اقل سعر "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly " placeholder="اقل سعر  " name="min_price" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-6 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">اعلى سعر  </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="اعلى سعر "></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly"  placeholder="اعلى سعر  "  name="max_price" value=""/>
        </div>
        <!--end::Input group-->

        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-3">
            <div class="form-group">
                <label >المستخدمين</label>
                <div class="form-group form-elements m-0 my-2">
                    <div class="custom-controls-stacked ">
                        <label class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input"  id="checkAll" >
                            <span class="custom-control-label " style="font-weight: bold"> تحديد الكل </span>
                        </label>
                    </div>
                </div>
                <div class="form-group form-elements m-0">
                    <div class="custom-controls-stacked row">
                        @foreach($users as $user)
                            <label class="custom-control custom-checkbox " style="width: 25%">
                                <input type="checkbox" class="custom-control-input" name="users[]" value="{{$user->id}}" >
                                <span class="custom-control-label">{{$user->name ?? 'ضيف رقم '.$user->id}}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>


    </div>
</form>
<!--end::Form-->




<script>
    $(document).on('keyup change',".price_change",function (e) {
        e.preventDefault();

        var type = $('.type:checked').val() ;
        var value = $('#value').val() || 0;
        var percentage = $('#percentage').val() || 0;
        var old_price = $('#old_price').val() || 0;
        // alert(type)
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
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

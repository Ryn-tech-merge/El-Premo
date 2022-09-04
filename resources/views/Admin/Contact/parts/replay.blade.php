<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('post_replay_contact')}}">
    @csrf
    <input type="hidden" name="user_id" value="{{$id}}">
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الرد على الرسالة </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الرد على الرسالة"></i>
            </label>
            <!--end::Label-->
                <textarea placeholder="اكتب الرد هنا ..." class="form-control "  name="message"  ></textarea>

        </div>

    </div>

</form>
<!--end::Form-->


<script>
    $(".type").on("change", function (e) {
        $('.product_show').hide();
        if (this.value == 'product') {
            $('#product').show();
        } else if (this.value == 'offer') {
            $('#offer').show();
        } else {
            $('#brand').show();
        }
    });
</script>

<script>
    imgInp.onchange = evt => {
        $('#blah').show()
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

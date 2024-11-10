<form method="post" name="product-form" id="product-form"
    action="{{ route('admin.products.store') }}">
    @csrf
    <input type="hidden" name="product_id" id="product_id" value="{{ @$product->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.select', [
                'label' => 'Service',
                'name' => 'service_id',
                'required' => true,
                "options" =>  fetchServices(),
                'value' => @$product->service_id])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title English',
                'name' => 'title_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Title English',
                'value' => @$product->title_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title Arabic',
                'name' => 'title_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Title Arabic',
                'value' => @$product->title_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Detail English',
                'name' => 'detail_english',
                'required' => false,
                'placeholder' => 'Detail english',
                'value' => @$product->detail_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Detail Arabic',
                'name' => 'detail_arabic',
                'required' => false,
                'placeholder' => 'Detail Arabic',
                'value' => @$product->detail_arabic,
            ])
        </div>
        <div class="col-lg-12 text-right mt-3">
            @include('template.partials.submit-button')
            @include('template.partials.cancel-button')
        </div>
    </div>
</form>

{{-- loading tinymce plugin --}}
<script src="{{ asset('assets/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#product-form").validate({
            rules: {
                service_id: {
                    required: true
                },
                title_arabic: {
                    required: true
                },
                title_english: {
                    required: true
                },
                detail_english: {
                    required: false
                },
                detail_arabic: {
                    required: false
                }
            },
            submitHandler: function(form) {
                submitFormAjax();
            }
        });
    });

    function submitFormAjax() {
            var formData = new FormData($('#product-form')[0]);
            $.ajax({
                url: $('#product-form').attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.type == 'success') {
                        toast(res.message, "success");
                        $('#global-modal').modal('hide');
                        table.ajax.reload();
                    } else {
                        toast(res.message, "error");
                    }
                },
                error: function(xhr, error, thrown) {
                    if (xhr.status === 401) {
                        toast("The session has been expired", "error");
                        setTimeout(function() {
                            window.location.href = "{{route('login')}}";
                        }, 3000);
                    } else {
                        toast('Server error loading dialog', 'error');
                    }
                }
            });
        }

    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor charmap image link lists media searchreplace table visualblocks',
        toolbar: 'undo redo | fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | charmap',
        forced_root_block: 'p',
    });
</script>

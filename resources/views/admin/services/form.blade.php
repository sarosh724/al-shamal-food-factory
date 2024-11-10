<form method="post" name="service-form" id="service-form"
    action="{{ route('admin.services.store') }}">
    @csrf
    <input type="hidden" name="service_id" id="service_id" value="{{ @$service->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title English',
                'name' => 'title_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Title English',
                'value' => @$service->title_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title Arabic',
                'name' => 'title_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Title Arabic',
                'value' => @$service->title_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Detail English',
                'name' => 'detail_english',
                'required' => false,
                'placeholder' => 'Detail english',
                'value' => @$service->detail_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Detail Arabic',
                'name' => 'detail_arabic',
                'required' => false,
                'placeholder' => 'Detail Arabic',
                'value' => @$service->detail_arabic,
            ])
        </div>

        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Seo Title',
                'name' => 'seo_title',
                'required' => false,
                'type' => 'text',
                'placeholder' => 'Seo Title',
                'value' => @$service->seo_title,
            ])
        </div>

        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Seo Keywords',
                'name' => 'seo_keywords',
                'required' => false,
                'type' => 'text',
                'placeholder' => 'Seo Keywords',
                'value' => @$service->seo_keywords,
            ])
        </div>

        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Seo Description',
                'name' => 'seo_description',
                'required' => false,
                'type' => 'text',
                'placeholder' => 'Seo Description',
                'value' => @$service->seo_description,
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
        $("#service-form").validate({
            rules: {
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
            var formData = new FormData($('#service-form')[0]);
            $.ajax({
                url: $('#service-form').attr('action'),
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

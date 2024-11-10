<form method="post" name="page-form" id="page-form" enctype="multipart/form-data"
    action="{{ route('admin.pages.store') }}">
    @csrf
    <input type="hidden" name="page_id" id="page_id" value="{{ @$page->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title English',
                'name' => 'title_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Title English',
                'value' => @$page->title_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title Arabic',
                'name' => 'title_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Title Arabic',
                'value' => @$page->title_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Description English',
                'name' => 'description_english',
                'required' => false,
                'placeholder' => 'Description English',
                'value' => @$page->description_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Description Arabic',
                'name' => 'description_arabic',
                'required' => false,
                'placeholder' => 'Description Arabic',
                'value' => @$page->description_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Image',
                'name' => 'image',
                'required' => false,
                'type' => 'file',
                'placeholder' => 'Image'
            ])
        </div>
        @if(@$page->image)
        <div class="col-lg-12 mt-2">
        <label>Current Image</label>
        <div>
            <img src="{{@$page->image}}" height="300" width="300" alt="current image"/>
        </div>
        </div>
        @endif
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
        $("#page-form").validate({
            rules: {
                title_arabic: {
                    required: true
                },
                title_english: {
                    required: true
                },
                description_english: {
                    required: false
                },
                description_arabic: {
                    required: false
                },
                image: {
                    required: false
                }
            },
            submitHandler: function(form) {
                submitFormAjax();
            }
        });
    });

    function submitFormAjax() {
            var formData = new FormData($('#page-form')[0]);
            $.ajax({
                url: $('#page-form').attr('action'),
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
        setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
    });
</script>

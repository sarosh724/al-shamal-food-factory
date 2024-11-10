<form method="post" name="breadcrumb-form" id="breadcrumb-form" enctype="multipart/form-data"
    action="{{ route('admin.breadcrumbs.store') }}">
    @csrf
    <input type="hidden" name="breadcrumb_id" id="breadcrumb_id" value="{{ @$breadCrumb->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Subtitle English',
                'name' => 'subtitle_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Subtitle English',
                'value' => @$breadCrumb->subtitle_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Subtitle Arabic',
                'name' => 'subtitle_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Subtitle Arabic',
                'value' => @$breadCrumb->subtitle_arabic,
            ])
        </div>
        <div class="col-lg-12 text-right mt-3">
            @include('template.partials.submit-button')
            @include('template.partials.cancel-button')
        </div>
    </div>
</form>

<script>

    $(document).ready(function() {
        $("#breadcrumb-form").validate({
            rules: {
                subtitle_arabic: {
                    required: true,
                    maxlength: 255
                },
                subtitle_english: {
                    required: true,
                    maxlength: 255
                }
            },
            submitHandler: function(form) {
                submitFormAjax();
            }
        });
    });

    function submitFormAjax() {
            var formData = new FormData($('#breadcrumb-form')[0]);
            $.ajax({
                url: $('#breadcrumb-form').attr('action'),
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
</script>

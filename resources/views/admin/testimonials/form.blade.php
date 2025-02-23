<form method="post" name="testimonial-form" id="testimonial-form"
    action="{{ route('admin.testimonials.store') }}">
    @csrf
    <input type="hidden" name="testimonial_id" id="testimonial_id" value="{{ @$testimonial->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Name',
                'value' => @$testimonial->name,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Comment',
                'name' => 'comment',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Comment',
                'value' => @$testimonial->comment,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Name Arabic',
                'name' => 'name_arabic',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Name Arabic',
                'value' => @$testimonial->name_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Comment Arabic',
                'name' => 'comment_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Comment Arabic',
                'value' => @$testimonial->comment_arabic,
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
        $("#testimonial-form").validate({
            rules: {
                name: {
                    required: true
                },
                comment: {
                    required: true
                },
                name_arabic: {
                    required: true
                },
                comment_arabic: {
                    required: true
                }
            },
            submitHandler: function(form) {
                submitFormAjax();
            }
        });
    });

    function submitFormAjax() {
            var formData = new FormData($('#testimonial-form')[0]);
            $.ajax({
                url: $('#testimonial-form').attr('action'),
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

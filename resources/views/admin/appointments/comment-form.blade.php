<form method="post" name="comment-form" id="comment-form"
    action="{{ route('admin.appointment.store-comment') }}">
    @csrf
    <input type="hidden" name="appointment_id" id="appointment_id" value="{{ @$appointment->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.textarea', [
                'label' => 'Comment',
                'name' => 'comment',
                'required' => false,
                'placeholder' => '',
                'value' => @$appointment->comment,
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
        $("#comment-form").on('submit', function(e) {
            e.preventDefault();
            submitFormAjax();
        });
        });

    function submitFormAjax() {
            var formData = new FormData($('#comment-form')[0]);
            $.ajax({
                url: $('#comment-form').attr('action'),
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

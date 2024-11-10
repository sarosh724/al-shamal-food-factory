<form method="post" name="our-team-form" id="our-team-form" enctype="multipart/form-data"
    action="{{ route('admin.our-team.store') }}">
    @csrf
    <input type="hidden" name="our_team_id" id="our_team_id" value="{{ @$ourTeam->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Name',
                'value' => @$ourTeam->name,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Designation',
                'name' => 'designation',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Designation',
                'value' => @$ourTeam->designation,
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
        @if(@$ourTeam->image)
        <div class="col-lg-12 mt-2">
        <label>Current Image</label>
        <div>
            <img src="{{@$ourTeam->image}}" height="300" width="300" alt="current image"/>
        </div>
        </div>
        @endif
        <div class="col-lg-12 text-right mt-3">
            @include('template.partials.submit-button')
            @include('template.partials.cancel-button')
        </div>
    </div>
</form>

<script>

    $(document).ready(function() {
        $("#our-team-form").validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
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
            var formData = new FormData($('#our-team-form')[0]);
            $.ajax({
                url: $('#our-team-form').attr('action'),
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

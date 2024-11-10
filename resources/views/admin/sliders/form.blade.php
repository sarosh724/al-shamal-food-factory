<form method="post" name="slider-form" id="slider-form" enctype="multipart/form-data"
    action="{{ route('admin.sliders.store') }}">
    @csrf
    <input type="hidden" name="slider_id" id="slider_id" value="{{ @$slider->id }}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.select', [
                'label' => 'Service',
                'name' => 'service_id',
                'required' => false,
                "options" =>  fetchServices(),
                'changeHandler' => 'getProducts()',
                'value' => @$slider->service_id])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.select', [
                'label' => 'Product',
                'name' => 'product_id',
                'required' => false,
                "options" =>  fetchProducts(),
                'value' => @$slider->product_id])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'URL',
                'name' => 'url',
                'type' => 'text',
                'required' => false,
                'placeholder' => 'URL',
                'value' => @$slider->url,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title English',
                'name' => 'title_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Title English',
                'value' => @$slider->title_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Title Arabic',
                'name' => 'title_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Title Arabic',
                'value' => @$slider->title_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Subtitle English',
                'name' => 'subtitle_english',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Subtitle English',
                'value' => @$slider->subtitle_english,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Subtitle Arabic',
                'name' => 'subtitle_arabic',
                'required' => true,
                'type' => 'text',
                'placeholder' => 'Subtitle Arabic',
                'value' => @$slider->subtitle_arabic,
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Image Arabic',
                'name' => 'image_arabic',
                'required' => false,
                'type' => 'file',
                'placeholder' => 'Image'
            ])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', [
                'label' => 'Image English',
                'name' => 'image_english',
                'required' => false,
                'type' => 'file',
                'placeholder' => 'Image'
            ])
        </div>
        @if(@$slider->image_arabic)
        <div class="col-lg-12 mt-2">
        <label>Current Image Arabic</label>
        <div>
            <img src="{{@$slider->image_arabic}}" height="300" width="300" alt="current image arabic"/>
        </div>
        </div>
        @endif
        @if(@$slider->image_english)
        <div class="col-lg-12 mt-2">
        <label>Current Image English</label>
        <div>
            <img src="{{@$slider->image_english}}" height="300" width="300" alt="current image english"/>
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
        $("#slider-form").validate({
            rules: {
                title_arabic: {
                    required: true
                },
                title_english: {
                    required: true
                },
                subtitle_english: {
                    required: true
                },
                subtitle_arabic: {
                    required: true
                },
                image_arabic: {
                    required: false
                },
                image_english: {
                    required: false
                }
            },
            submitHandler: function(form) {
                submitFormAjax();
            }
        });
    });

    function submitFormAjax() {
            var formData = new FormData($('#slider-form')[0]);
            $.ajax({
                url: $('#slider-form').attr('action'),
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

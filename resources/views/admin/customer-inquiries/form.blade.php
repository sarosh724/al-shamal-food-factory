<form method="post" name="category-form" id="category-form" action="{{route("payment-categories.store", ['id' => @$category->id])}}">
    @csrf
    <input type="hidden" name="client_id" id="client_id" value="{{@$client_id}}">
    <div class="row">
        <div class="col-lg-12">
            @include('template.partials.form.input', ['type' => 'text', 'label' => 'Payment Category', 'name' => 'name', 'required' => true, 'placeholder' => 'Category Name', 'value' => @$category->name])
        </div>
        <div class="col-lg-12">
            @include('template.partials.form.input', ['type' => 'text', 'label' => 'Description', 'name' => 'description', 'required' => false, 'placeholder' => 'Description', 'value' => @$category->description])
        </div>
        <div class="col-lg-12 text-right mt-3">
            @include('template.partials.submit-button')
            @include('template.partials.cancel-button')
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#category-form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: "Maximum length is 255 characters"
                }
            },
            submitHandler: function(form) {
                return true;
            }
        });
    });
</script>

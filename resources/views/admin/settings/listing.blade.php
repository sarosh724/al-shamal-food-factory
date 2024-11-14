@extends('template.index')

@section('title')
    Settings
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Settings</a>
@stop

@section('content')
    <form id="fields-form">
        @foreach ($settings as $setting)
            <div class="row mb-3">
                <div class="col-md-2">
                    <label id="label-{{ $setting->slug }}" class="field-label" data-id="{{ $setting->id }}">
                        {{ $setting->name }}:
                    </label>
                </div>
                <div class="col-md-6">
                    <span id="span-{{ $setting->id }}">
                        {{ $setting->value }}
                    </span>
                </div>
                <div class="col-md-4">
                    @if($setting->is_arabic_value)
                    <span id="span-arabic-{{ $setting->id }}">
                        {{ $setting->value_arabic }}
                    </span>
                    @endif
                </div>

                <div class="col-md-6" id="input-container-{{ $setting->id }}" style="display:none;">
                    @include('template.partials.form.input', [
                        'name' => 'input-' . $setting->id,
                        'type' => 'text',
                        'required' => false,
                        'placeholder' => $setting->name . ' (English)',
                        'value' => @$setting->value
                    ])
                    @if($setting->is_arabic_value)
                    @include('template.partials.form.input', [
                        'name' => 'input-arabic-' . $setting->id,
                        'type' => 'text',
                        'required' => false,
                        'placeholder' => $setting->name . ' (Arabic)',
                        'value' => @$setting->value_arabic
                    ])
                    @endif

                    <button class="btn btn-success btn-save mt-1" data-id="{{ $setting->id }}" type="button">Save</button>
                    <button class="btn btn-secondary btn-undo mt-1" data-id="{{ $setting->id }}" type="button">Close</button>
                </div>
            </div>
        @endforeach
    </form>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.field-label').on('click', function() {
                var id = $(this).data('id');
                $('#span-' + id).hide(); // Hide the value
                $('#span-arabic-' + id).hide();
                $('#input-container-' + id).show(); // Show the input and buttons
            });

            $('.btn-undo').on('click', function() {
                var id = $(this).data('id');
                $('#input-container-' + id).hide(); // Hide input and buttons
                $('#span-' + id).show();
                $('#span-arabic' + id).show(); // Show the value
            });

            $('.btn-save').on('click', function() {
                var id = $(this).data('id');
                var newValue = $('#input-' + id).val();
                var newArabicValue = {{isset($setting->is_arabic_value)}} ? $('#input-arabic-' + id).val() : '';

                $.ajax({
                    url: '{{ route('admin.settings.store') }}',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                        value: newValue,
                        arabic_value: newArabicValue
                    },
                    success: function(res) {
                        if (res.type == 'success') {
                            // Update the displayed value and hide the input
                            $('#span-' + id).text(newValue).show();
                            $('#input-container-' + id).hide();
                            toast(res.message, "success");
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
            });
        });
    </script>
@stop

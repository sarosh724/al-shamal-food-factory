<div class="fv-row">
    <div class="field mt-3">
        @if(isset($label))
            <label for="{{$name}}" class="form-label m-0">
                <span class="{{isset($required) && $required ? "required" : ""}}">{{$label}}</span>
            </label>
        @endif
        <select class="form-control select2 {{isset($small) && $small ? "form-select-sm" : ""}}" id="{{$name}}" name="{{$name}}" onchange="{{@$changeHandler}}">
            <option value="">-- Select --</option>
            @if(isset($allOption) && $allOption)
                <option value="all" selected>All</option>
            @endif
            @if(isset($options) && count($options) > 0)
                @foreach($options as $option)
                    <option value="{{$option->id}}" {{$option->id == @$value ? "selected" : ""}}>
                        {{@$option->concatenation ?: ucfirst($option->name)}}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <label id="{{$name}}-error" class="error" for="{{$name}}" style="display: none;"></label>
</div>

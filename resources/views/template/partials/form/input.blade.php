<div class="fv-row">
    <div class="field mt-3">
        @if(isset($label))
            <label for="{{$name}}" class="form-label m-0">
                <span class="{{isset($required) && $required ? "required" : ""}}">{{$label}}</span>
            </label>
        @endif
        <input type="{{$type}}" class="form-control {{isset($small) && $small ? "form-control-sm" : ""}}"
               {{isset($step) && ($step) ? "step='0.01'" : ''}} {{isset($readonly) && $readonly ? "readonly" : ""}} id="{{$name}}" name="{{$name}}" value="{{@$value}}"
               placeholder="{{@$placeholder}}" oninput="{{@$changeHandler}}" {{isset($min) && $min ? "min=0" : ""}}>
    </div>
</div>

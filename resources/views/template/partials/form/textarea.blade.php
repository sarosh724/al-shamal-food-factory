<div class="fv-row">
    <div class="field mt-3">
        @if(isset($label))
            <label for="{{$name}}" class="form-label m-0">
                <span class="{{isset($required) && $required ? "required" : ""}}">{{$label}}</span>
            </label>
        @endif
        <textarea rows="2" id="{{$name}}" name="{{$name}}" class="form-control" placeholder="{{@$placeholder}}">{{@$value}}</textarea>
    </div>
</div>

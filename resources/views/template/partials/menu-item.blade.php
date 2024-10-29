@if(isset($dropdown) && $dropdown)
    <li class="{{is_parent_menu($urlList)}}">
        <a href="javascript:void(0);">
            <i data-feather="{{$icon}}"></i><span>{{$label}}</span><i class="accordion-icon fa fa-angle-left"></i>
        </a>
        {!! $dropdownHtml !!}
    </li>
@else
    <li class="{{is_active_menu($url)}}">
        <a href="{{url($url)}}">
            <i data-feather="{{$icon}}"></i><span>{{$label}}</span>
        </a>
    </li>
@endif

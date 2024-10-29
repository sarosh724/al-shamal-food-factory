<div class="vendor-card bg-{{ @$class }} p-4 mg-b-20">
    <a href={{{route($url)}}}>
        <div>
            <span class="bg-white shape"><i class="{{ $icon }} text-{{ @$class }}"></i></span>
        </div>
        <p class="text-white">{{ $label }}</p>
        <h4 class="m-0 text-white"><span id="{{ @$id }}"></span></h4>
    </a>
</div>

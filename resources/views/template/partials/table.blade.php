@php
    $width = 100 / count($columns);
@endphp
<div class="table-responsive-sm pb-3">
    <table id="{{$id}}" class="table table-grid table-sm border-light">
        <thead class="bg-soft-secondary">
        <tr>
            @foreach($columns as $column)
                <th width="{{$width}}%" class="border-0">{{$column}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

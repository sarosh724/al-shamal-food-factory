@extends('template.index')

@section('title')
    Sliders
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Sliders</a>
@stop

{{-- @section('page-action')
    <a href="javascript:void(0);" class="btn btn-sm btn-add btn-primary ">
        <i class="fa fa-plus-square mr-1"></i>Add Slider
    </a>
@stop --}}

@section('content')
    {{-- <div class="shadow-sm p-2 mb-2 bg-white">
        <div class="col-md-3 p-0">
            @include('template.partials.form.select', [
                'label' => 'Status',
                'name' => 'status',
                'options' => collect([
                    (object) ['id' => 'all', 'name' => 'All'],
                    (object) ['id' => 'active', 'name' => 'Active'],
                    (object) ['id' => 'inactive', 'name' => 'Inactive'],
                    (object) ['id' => 'deleted', 'name' => 'Deleted'],
                ]),
                'changeHandler' => 'statusChange()',
                'value' => 'all',
            ])
        </div>
    </div> --}}
    <div class="table-responsive">
        @include('template.partials.table', [
            'id' => 'data-table',
            'columns' => [
                'Sr.',
                'Title English',
                'Title Arabic',
                'Subtitle English',
                'Subtitle Arabic',
                'Image Arabic',
                'Image English',
                'Actions',
            ],
        ])
    </div>
@stop

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        var table;
        $(document).ready(function() {
            loadTable();
        });

        function statusChange() {
            loadTable();
        }

        function loadTable() {
            if ($.fn.DataTable.isDataTable('#data-table')) {
                $('#data-table').DataTable().destroy();
            }
            table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                aaSorting: [],
                lengthChange: false,
                searching: true,
                info: false,
                ordering: false,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{ route('admin.sliders.list') }}",
                    data: function(d) {
                        d.status = $("#status").val();
                    },
                    error: function(xhr, error, thrown) {
                        if (xhr.status === 401) {
                            toast("The session has been expired", "error");
                            setTimeout(function() {
                                window.location.href = "{{route('login')}}";
                            }, 3000);
                        }
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title_english',
                        name: 'title_english'
                    },
                    {
                        data: 'title_arabic',
                        name: 'title_arabic'
                    },
                    {
                        data: 'subtitle_english',
                        name: 'subtitle_english'
                    },
                    {
                        data: 'subtitle_arabic',
                        name: 'subtitle_arabic'
                    },
                    {
                        data: 'image_arabic',
                        name: 'image_arabic'
                    },
                    {
                        data: 'image_english',
                        name: 'image_english'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }

        // $(".btn-add").click(function() {
        //     open_modal("{{ route('admin.sliders.modal') }}");
        // });

        $("#data-table").on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.sliders.modal', '') }}?id=" + id;
            open_modal(url);
        });

        $("#data-table").on('click', '.btn-status', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.sliders.update-status') }}";
            let status = $(this).data('status');
            var formData = {
                id: id,
                status: status
            };
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                cache: false,
                data: formData,
                success: function(res) {
                    if (res.type == 'success') {
                        toast(res.message, "success");
                        loadTable();
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

        $("#data-table").on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.sliders.delete', '') }}/" + id;
            deleteRequest(url, id, "slider");
        });
    </script>
@stop

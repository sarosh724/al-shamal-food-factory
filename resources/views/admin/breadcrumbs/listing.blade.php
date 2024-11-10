@extends('template.index')

@section('title')
    Breadcrumbs
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Breadcrumbs</a>
@stop

@section('content')
    <div class="table-responsive">
        @include('template.partials.table', [
            'id' => 'data-table',
            'columns' => [
                'Sr.',
                'Slug',
                'Subtitle English',
                'Subtitle Arabic',
                'Actions',
            ],
        ])
    </div>
@stop

@section('scripts')
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
                lengthChange: true,
                searching: true,
                info: true,
                ordering: true,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{ route('admin.breadcrumbs.list') }}",
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
                        data: 'slug',
                        name: 'slug'
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
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }

        $("#data-table").on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.breadcrumbs.modal', '') }}?id=" + id;
            open_modal(url);
        });
    </script>
@stop

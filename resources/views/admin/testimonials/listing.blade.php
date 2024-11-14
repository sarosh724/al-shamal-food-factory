@extends('template.index')

@section('title')
    Testimonials
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Testimonials</a>
@stop

@section('page-action')
    <a href="javascript:void(0);" class="btn btn-sm btn-add btn-primary ">
        <i class="fa fa-plus-square mr-1"></i>Add Testimonial
    </a>
@stop

@section('content')
    <div class="table-responsive">
        @include('template.partials.table', [
            'id' => 'data-table',
            'columns' => [
                'Sr.',
                'Name',
                'Comment',
                'Name Arabic',
                'Comment Arabic',
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
                info: false,
                ordering: true,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{ route('admin.testimonials.list') }}",
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'comment',
                        name: 'comment'
                    },
                    {
                        data: 'name_arabic',
                        name: 'name_arabic'
                    },
                    {
                        data: 'comment_arabic',
                        name: 'comment_arabic'
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

        $(".btn-add").click(function() {
            open_modal("{{ route('admin.testimonials.modal') }}");
        });

        $("#data-table").on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.testimonials.modal', '') }}?id=" + id;
            open_modal(url);
        });

        $("#data-table").on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.testimonials.delete', '') }}/" + id;
            deleteRequest(url, id, "testimonial");
        });
    </script>
@stop

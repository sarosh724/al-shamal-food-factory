@extends('template.index')

@section('title')
    Pages
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Pages</a>
@stop

@section('content')
    <div class="shadow-sm p-2 mb-2 bg-white">
        <div class="col-md-3 p-0">
            @include('template.partials.form.select', [
                'label' => 'Status',
                'name' => 'status',
                'options' => collect([
                    (object) ['id' => 'all', 'name' => 'All'],
                    (object) ['id' => 'active', 'name' => 'Active'],
                    (object) ['id' => 'inactive', 'name' => 'Inactive']
                ]),
                'changeHandler' => 'statusChange()',
                'value' => 'all',
            ])
        </div>
    </div>
    <div class="table-responsive">
        @include('template.partials.table', [
            'id' => 'data-table',
            'columns' => [
                'Sr.',
                'Slug',
                'Title English',
                'Title Arabic',
                'Description English',
                'Description Arabic',
                'Image',
                'Status',
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
                lengthChange: true,
                searching: true,
                info: true,
                ordering: true,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{ route('admin.pages.list') }}",
                    data: function(d) {
                        d.status = $("#status").val();
                    },
                    error: function(xhr, error, thrown) {
                        if (xhr.status === 401) {
                            toast("The session has been expired", "error");
                            setTimeout(function() {
                                window.location.href = "/";
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
                        data: 'title_english',
                        name: 'title_english'
                    },
                    {
                        data: 'title_arabic',
                        name: 'title_arabic'
                    },
                    {
                        data: 'description_english',
                        name: 'description_english'
                    },
                    {
                        data: 'description_arabic',
                        name: 'description_arabic'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
            open_modal("{{ route('admin.pages.modal') }}");
        });

        $("#data-table").on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.pages.modal', '') }}?id=" + id;
            open_modal(url);
        });

        $("#data-table").on('click', '.btn-status', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.pages.update-status') }}";
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
                            window.location.href = "/";
                        }, 3000);
                    } else {
                        toast('Server error loading dialog', 'error');
                    }
                }
            });
        });

        $("#data-table").on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.pages.delete', '') }}/" + id;
            deleteRequest(url, id, "page");
        });
    </script>
@stop

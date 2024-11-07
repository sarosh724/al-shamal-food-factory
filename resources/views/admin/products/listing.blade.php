@extends('template.index')

@section('title')
    Products
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Products</a>
@stop

@section('page-action')
    <a href="javascript:void(0);" class="btn btn-sm btn-add btn-primary ">
        <i class="fa fa-plus-square mr-1"></i>Add Product
    </a>
@stop

@section('content')
            <div class="row row-xs clearfix">
        <div class="col-md-3">
            @include('template.partials.form.select', [
                'label' => 'Status',
                'name' => 'status',
                'options' => collect([
                    (object) ['id' => 'all', 'name' => 'All'],
                    (object) ['id' => 'active', 'name' => 'Active'],
                    (object) ['id' => 'inactive', 'name' => 'Inactive'],
                    (object) ['id' => 'deleted', 'name' => 'Deleted'],
                ]),
                'changeHandler' => 'loadTable()',
                'value' => 'all',
            ])
        </div>
        <div class="col-md-3">
            @include('template.partials.form.select', [
                'label' => 'Service',
                'name' => 'service',
                'options' => fetchServices(),
                'changeHandler' => 'loadTable()',
                'value' => 'all',
            ])
        </div>
    </div>
    <div class="table-responsive">
        @include('template.partials.table', [
            'id' => 'data-table',
            'columns' => ['Sr.', 'Service', 'Title English', 'Title Arabic', 'Status', 'Actions'],
        ])
    </div>
@stop

@section('scripts')
    <script>
        var table;
        $(document).ready(function() {
            loadTable();
        });

        function loadTable() {
            table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                aaSorting: [],
                "lengthChange": true,
                searching: true,
                info: false,
                ordering: true,
                columnsDefs: [{
                    orderable: true
                }],
                ajax: {
                    url: "{{ route('admin.products.list') }}",
                    data: function (d) {
                        d.status = $("#status").val();
                        d.service = $("#service").val();
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
                        data: 'service',
                        name: 'service',
                    },
                    {
                        data: 'title_english',
                        name: 'title_english',
                    },
                    {
                        data: 'title_arabic',
                        name: 'title_arabic',
                    },
                    {
                        data: 'status',
                        name: 'status',
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
            open_modal("{{ route('admin.products.modal') }}");
        });

        $("#data-table").on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.products.modal', '') }}?id=" + id;
            open_modal(url);
        });

        $("#data-table").on('click', '.btn-status', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');
            var formData = {
                id: id,
                status: status
            };
            let url = "{{ route('admin.products.update-status')}}";
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

        $("#data-table").on('click', '.btn-images', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.products.image-modal', '') }}/" + id;
            open_modal(url);
        });


        $("#data-table").on('click', '.btn-delete', function() {
            let id = $(this).data('id');
            let url = "{{ route('admin.products.delete', '') }}/" + id;
            deleteRequest(url, id, "product");
        });
    </script>
@stop

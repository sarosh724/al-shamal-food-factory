@extends('template.index')

@section('title')
    Customer Inquiries
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Customer Inquiries</a>
@stop

@section('content')
    <div class="table-responsive">
        @include('template.partials.table',  ['id' => 'data-table', 'columns' => ['Sr.', 'Name', 'Email', 'Phone Number', 'Message']])
    </div>
@stop

@section('scripts')
    <script>
        var table;
        $(document).ready(function() {
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
                    url: "{{route('admin.customer-inquiries.list')}}",
                    error: function(xhr, error, thrown) {
                        if (xhr.status === 401) {
                            toast("The session has been expired", "error");
                            setTimeout(function () {
                                window.location.href = "{{route('login')}}";
                            }, 3000);
                        }
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                         name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                    },
                    {
                        data: 'message',
                        name: 'message',
                    }
                ]
            });
        });
    </script>
@stop

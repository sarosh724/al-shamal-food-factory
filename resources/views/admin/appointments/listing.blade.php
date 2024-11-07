@extends('template.index')

@section('title')
    Appointments
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Appointments</a>
@stop

@section('content')
    <div class="table-responsive">
        @include('template.partials.table',  ['id' => 'data-table', 'columns' => ['Sr.', 'First Name', 'Last Name', 'Email', 'Reason', 'First Choice Date', 'First Choice Time', 'Second Choice Date', 'Second Choice Time']])
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
                                window.location.href = "/";
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
                        data: 'first_name',
                        name: 'first_name',
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'reason',
                        name: 'reason',
                    },
                    {
                        data: 'first_choice_date',
                        name: 'first_choice_date',
                    },
                    {
                        data: 'first_choice_time',
                        name: 'first_choice_time',
                    },
                    {
                        data: 'second_choice_date',
                        name: 'second_choice_date',
                    },
                    {
                        data: 'second_choice_time',
                        name: 'second_choice_time',
                    }
                ]
            });
        });
    </script>
@stop

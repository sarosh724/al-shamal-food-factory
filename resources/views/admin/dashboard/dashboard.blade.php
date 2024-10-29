@extends('template.index')

@section('title')
    Dashboard
@stop

@section('breadcrumb')
    <a class="breadcrumb-item active">Dashboard</a>
@stop

@section('content')
    <!--================================-->
    <!-- Count Card Start -->
    <!--================================-->
    <div class="row row-xs clearfix">
        <div class="col-sm-6 col-xl-3">
            @include('template.partials.stat-card', [
                'label' => 'Total Sliders',
                'id' => 'totalSliders',
                'icon' => '',
                'class' => 'danger',
                'url' => 'admin.sliders.list'
            ])
        </div>
        <div class="col-sm-6 col-xl-3">
            @include('template.partials.stat-card', [
                'label' => 'Total Services',
                'id' => 'totalServices',
                'icon' => '',
                'class' => 'success',
                'url' => 'admin.services.list'
            ])
        </div>
        <div class="col-sm-6 col-xl-3">
            @include('template.partials.stat-card', [
                'label' => 'Total Products',
                'id' => 'totalProducts',
                'icon' => '',
                'class' => 'primary',
                'url' => 'admin.products.list'
            ])
        </div>
        <div class="col-sm-6 col-xl-3">
            @include('template.partials.stat-card', [
                'label' => 'Total Inquiries',
                'id' => 'totalInquiries',
                'icon' => '',
                'class' => 'warning',
                'url' => 'admin.customer-inquiries.list'
            ])
        </div>
    </div>
    <!--/ Count Card End -->

@stop

@section('styles')
    <style>
        .btn-account-filter {
            cursor: pointer !important;
        }
    </style>
@stop

@section('scripts')
    <script>
        var table;
        $(document).ready(function() {

            loadDashboardStats();
        });

        function loadDashboardStats() {
            $.ajax({
                url: '{{ route('admin.dashboard.stats') }}',
                type: 'GET',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: async function(res) {
                    if (res.status) {
                        let data = await res.data;
                        $("#totalSliders").text(data.total_sliders);
                        $("#totalServices").text(data.total_services);
                        $("#totalProducts").text(data.total_products);
                        $("#totalInquiries").text(data.total_inquiries);
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
        }
    </script>
@stop

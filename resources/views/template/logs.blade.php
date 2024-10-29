@extends('template.index')

@section('title')
    Logs
@stop

@section('breadcrumb')
    {{--    <a class="breadcrumb-item" href="/"><i class="icon ion-ios-home-outline"></i> Home</a>--}}
    <a class="breadcrumb-item active">Logs</a>
@stop

@section('content')
    @if(isset($msg))
        {{$msg}}
    @endif

    {{$logs}}
@stop

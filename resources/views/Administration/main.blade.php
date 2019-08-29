@extends('admin')

@section('favicon')
    <link rel="icon" type="image/png" href="https://merchant.cloudpayments.ru/content/img/favicon.png">
@endsection

@section('title')
    CloudKassir
@endsection

@section('css')
    <link href="{{$srcLaravelCss}}" rel="stylesheet" type="text/css">
    <link href="{{$srcCssAdminPanel}}" rel="stylesheet" type="text/css" >
@endsection

@section('js')
    <script src="{{$urlJQuerry}}"></script>
    {{--<script src="url Bootstrap" crossorigin="anonymous"></script>--}}
    <script src="{{$srcJsSettings}}"></script>
    <script src="{{$urlLibPopUpJs}}"></script>
@endsection

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    @yield('content-body')
@endsection
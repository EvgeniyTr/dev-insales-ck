@extends('admin')

@section('favicon')
    <link rel="icon" type="image/png" href="https://merchant.cloudpayments.ru/content/img/favicon.png">
@endsection

@section('title')
    CloudKassir
@endsection

@section('css')
    <link href="{{$path}}{{$srcLaravelCss}}" rel="stylesheet" type="text/css">
    <link href="{{$path}}{{$srcCssAdminPanel}}" rel="stylesheet" type="text/css" >
@endsection

@section('js')
    <script src="{{$urlJQuerry}}"></script>
    {{--<script src="url Bootstrap" crossorigin="anonymous"></script>--}}
    <script src="{{$path}}{{$srcJsSettings}}"></script>
    <script src="{{$path}}{{$urlLibPopUpJs}}"></script>
@endsection

@section('sidebar')
    @include('sidebar')
@endsection

@section('content')
    @include('Settings.body')
@endsection
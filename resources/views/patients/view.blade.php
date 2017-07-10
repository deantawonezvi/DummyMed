@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('lib/sweetalert/dist/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('lib/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{asset('lib/pickadate/lib/themes/classic.css')}}">
    <link rel="stylesheet" href="{{asset('lib/pickadate/lib/themes/classic.date.css')}}">

@endsection

@section('content')
    @include('patients.view_content')
@endsection
@section('scripts')
    <script src="{{asset('lib/angular/angular.min.js')}}"></script>
    <script src="{{asset('lib/angularUtils-pagination/dirPagination.js')}}"></script>
    <script src="{{asset('js/controllers/patients.js')}}"></script>
    <script src="{{asset('lib/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('lib/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('lib/pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('lib/pickadate/lib/compressed/picker.date.js')}}"></script>
    <script>
        $('.search-select').select2();
        $('.date-picker').pickadate({
            selectMonths: true,
            selectYears: 100,
            formatSubmit:'Y-m-d',
            max: new Date()
        });
    </script>

@endsection
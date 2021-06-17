@extends('layout.app')
@section('titolo','Affitti')
@section('css')
<link rel='stylesheet' href='{{ url("css/affitti.css") }}'>
@endsection
@section('js')
<script src='{{ url("js/affitti.js") }}' defer ></script>
@endsection
@section('pagina','affitti')
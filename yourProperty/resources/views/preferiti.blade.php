@extends('layout.app')
@section('titolo','Preferiti')
@section('css')
<link rel='stylesheet' href='{{ url("css/preferiti.css") }}'>
@endsection
@section('js')
<script src='{{ url("js/preferiti.js") }}' defer ></script>
@endsection
@section('pagina','preferiti')
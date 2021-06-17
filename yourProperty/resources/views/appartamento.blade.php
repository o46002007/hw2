@extends('layout.app')
@section('titolo','Appartamenti')
@section('css')
<link rel='stylesheet' href='{{ url("css/immobili.css") }}'>
@endsection
@section('js')
<script src='{{ url("js/script.js") }}' defer ></script>
@endsection
@section('search')
<div id="search">
    <input id="searchbar" type="text">
    <img id="shearch-icon" src="immagini/search-icon.jpg">
</div>
@endsection
@section('pagina','appartamenti')
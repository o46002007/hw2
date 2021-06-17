@extends('layout.app')
@section('titolo','Index')
@section('font')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@endsection
@section('css')
<link rel='stylesheet' href='{{ url("css/index.css") }}'>
@endsection
@section('pagina','home')
@section('overlay')
<div id="overlay"></div>
@endsection
@section('intestazione')
<strong>Trova la casa che desideri!</strong>
@endsection
@section('article')
<section class="flex-container">
	<div class="flex-item">
		<img src="immagini/casa.jpg">
		<h1>Casa</h1>
		<a class="button" href="casa">View more</a>
	</div>
	<div class="flex-item">
		<img src="immagini/appartamento.jpg">
		<h1>Appartamento</h1>
		<a class="button" href="appartamento">View more</a>
	</div>
	<div class="flex-item">
		<img src="immagini/cottage.jpg">
		<h1>Cottage</h1>
		<a class="button" href="cottage">View more</a>
	</div>
</section>
@endsection
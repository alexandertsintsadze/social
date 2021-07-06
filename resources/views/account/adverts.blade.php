@extends('layouts/layout')
@section ('data')
	@foreach ($adverts as $advert)
		<div class="advert row">
			<div class="col-3"> {{$advert->name}} </div>
			<div class="col-3"> <a href="{{route('advert', ['id' => $advert->id])}}">{{$advert->title}} </a></div>
			<div class="col-3"> {{$advert->description}} </div>
			<div class="col-3"> {{$advert->type}} </div>
		</div>
	@endforeach
@endsection
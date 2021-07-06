@extends('layouts/layout')
@section ('data')
	<div class="title">სარეკლამო კამპანიები</div>
	<table class="table table-bordered">
		<tr>
			<td>კომპანია</td>
			<td>სათაური</td>
			<td>ტიპი</td>
		</tr>
	@foreach ($adverts as $advert)
	<tr>
		<td>
			{{$advert->name}}
		</td>
		<td>
			<a href="{{route('advert', ['id' => $advert->id])}}">{{$advert->title}} </a>
		</td>
		<td>
			{{$advert->type}}
		</td>
	</tr>
		{{-- <div class="advert row">
			<div class="col-3"> {{$advert->name}} </div>
			<div class="col-3"> <a href="{{route('advert', ['id' => $advert->id])}}">{{$advert->title}} </a></div>
			<div class="col-3">  </div>
			<div class="col-3"> {{$advert->type}} </div>
		</div> --}}
	@endforeach
	</table>
@endsection
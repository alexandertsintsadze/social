@extends('layouts.layout')

@section ('data')
	<div class="title">კამპანიის დეტალები</div>

	<div class="mini-title">დამკვეთი კომპანია</div>
	{{$advert->name}}
	<div class="mini-title">სათაური</div>
	{{$advert->title}}
	<div class="mini-title">აღწერა</div>
	{{$advert->description}}
	@if (Auth::user()->type === 1 && $advert->type === 2)
	<div class="mini-title">შეთავაზება</div>
		<form method="POST" action="{{route('advert', ['id' => $advert->id])}}">
			თქვენი შეთავაზება (ლარი)
			<input type="text" class="form-control" name="price" />
			<input type="submit" class="btn btn-primary" value="შეთავაზება" />
		</form>
	@elseif (Auth::user()->type === 1 && $advert->type === 1)
		<div class="mini-title">რეკლამის საფასური არის {{$advert->price}} ლარი</div>
		<form method="POST" action="{{route('advert', ['id' => $advert->id])}}">
			<input type="submit" class="btn btn-primary" value="დათანხმება" />
		</form>
	@endif
@endsection
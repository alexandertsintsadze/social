@extends('layouts.layout')

@section ('data')
	<div class="title">კამპანიის დეტალები</div>

	<div class="mini-title">დამკვეთი კომპანია</div>
	{{$advert->name}}
	<div class="mini-title">სათაური</div>
	{{$advert->title}}
	<div class="mini-title">აღწერა</div>
	{{$advert->description}}
	@if ($offers)
	<div class="mini-title">შეთავაზებები</div>
	<table class="table table-bordered">
		@foreach ($offers as $item)
		<tr>
				<td>
					{{$item->name}}
				</td>
				<td>
					{{$item->status}}
				</td>
				<td>
					{{$item->price}}
				</td>
			</tr>
		@endforeach
	</table>
	@endif
	@if (!$activeOffer && Auth::user()->type === 1)
	<div class="mini-title">შეთავაზება</div>
		@if ($advert->type === 2)
			<form method="POST" action="{{route('advert', ['id' => $advert->id])}}">
				@csrf
				თქვენი შეთავაზება (ლარი)
				<input name="type" type="hidden" value="2" />
				<input type="text" class="form-control" name="price" />
				<input type="submit" class="btn btn-primary" value="შეთავაზება" />
			</form>
		@elseif ($advert->type === 1)
			<div class="mini-title">რეკლამის საფასური არის {{$advert->price}} ლარი</div>
			<form method="POST" action="{{route('advert', ['id' => $advert->id])}}">
				@csrf
				<input name="type" type="hidden" value="1" />
				<input type="hidden" class="form-control" name="price" value="{{$advert->price}}" />
				<input type="submit" class="btn btn-primary" value="დათანხმება" />
			</form>
		@endif
	@endif

@endsection
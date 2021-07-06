@extends('layouts/layout')

@section ('data')
	<form method="POST" action="{{route('createadverts')}}">
		@csrf
		<label for="">რეკლამის სათაური</label>
		<input name="title" class="form-control" type="text" />
		
		<label for="">რეკლამის აღწერა</label>
		<input name="description" class="form-control" type="text" />

		
		<label for="">ტიპი</label>
		{{-- <input class="form-control" type="text" /> --}}
		<select name="type" class="form-control">
			<option>
				კონკრეტულ ინფლუენსერს
			</option>
			<option>
				შემომთავაზეთ ფასები
			</option>
			<option>
				კრიტერიუმების მიხედვით
			</option>
		</select>
		<input type="submit" class="btn btn-primary" value="შენახვა" />
	</form>
@endsection
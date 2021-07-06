@extends('layouts.layout')

@section ('data')
	ფასები<br>
	<form method="POST" action="{{route('prices')}}">
		@csrf
		<div class="row">
			@foreach ($fields as $index=>$item)
				<div class="col-4">
					<div>{{$index}}</div>
					@foreach ($item as $index=>$field)
						{{-- <div class="col-md-2"> --}}
						<div>{{$field['name']}}</div>
							<input type="text" name="{{$index}}" class="form-control" value="{{$prices[$index]}}" />
						{{-- </div> --}}
					@endforeach
				</div>
			@endforeach
			<br><input type="submit" class="btn btn-primary" value="შენახვა" />
		</div>
	</form>
@endsection
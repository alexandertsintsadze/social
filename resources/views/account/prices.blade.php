@extends('layouts.layout')

@section ('data')
	<div class="title"> ფასები</div>
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
			<div class="col-2">
				<input type="submit" class="btn btn-primary" value="შენახვა" />
			</div>
		</div>
	</form>
@endsection
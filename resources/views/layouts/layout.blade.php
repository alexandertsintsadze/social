<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-3">
				მენიუ
				@if (Auth::user()->type === 1)
					<a href="{{route('adverts')}}">შეკვეთების მოძებნა</a>
					<a href="{{route('prices')}}">ფასების რედაქტიურება</a>
				@elseif (Auth::user()->type === 2)
					<a href="{{route('createadverts')}}">შეკვეთის შექმნა</a>
				@endif
			</div>
			<div class="col-9">
				@yield('data')
			</div>
		</div>
	</div>
</body>
</html>

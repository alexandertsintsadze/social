<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/alk-rounded-mtav-med/css/alk-rounded-mtav-med.min.css">
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/dejavu-sans-condensed/css/dejavu-sans-condensed.min.css">
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="col-3 menu">
				<div class="menu-title"> {{Auth::user()->name}}</div>
				<div class="menu2">მენიუ</div>
				<a href="/">მთავარი</a><br>
				@if (Auth::user()->type === 1)
					<a href="{{route('adverts')}}">შეკვეთების მოძებნა</a><br>
					<a href="{{route('prices')}}">ფასების რედაქტიურება</a>
				@elseif (Auth::user()->type === 2)
					<a href="{{route('createadverts')}}">შეკვეთის შექმნა</a>
				@endif
				<br><br>
				<form method="POST" action="{{route('logout')}}">
					@csrf
					<button class="main-btn">ექაუნთის დატოვება</button>
				</form>

				<div class="footer">
					2021 ინფლუენსერი
				</div>
			</div>
			<div class="col-9">
				@yield('data')
			</div>
		</div>
	</div>
</body>
</html>

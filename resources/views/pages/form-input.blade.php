<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>

<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<h2>Sign Up</h2>

				@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $err) {{$err}}
					<br> @endforeach
				</div>

				@endif

				<form method="post" action="{{route('form2')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Birthdate</label>
						<input type="text" class="form-control" name="birthdate" placeholder="dd/mm/yyyy" value="{{old('birthdate')}}">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Address</label>
						<input type="text" class="form-control" placeholder="Enter address" name="address">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Age</label>
						<input type="text" class="form-control" name="age" placeholder="Enter your age">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Confirm Password</label>
						<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<input type="file" name="hinhanh">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>

	</div>

</body>

</html>
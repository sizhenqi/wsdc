<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Forms - Ready Bootstrap Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
	<link rel="stylesheet" href="/admins/config/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/admins/config/assets/css/ready.css">
	<link rel="stylesheet" href="/admins/config/assets/css/demo.css">
</head>
<body>
	@foreach($res as $k => $v)
<form action="/admin/adminuser/adminupdate/{{$v -> id}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<div class="card-title">管理员修改</div>
		</div>
		<div class="card-body">

			<div class="form-group">
				<label for="squareInput">管理员用户名</label>
				<input type="text" class="form-control input-square" id="squareInput" placeholder="管理员用户名" name="username" value="{{$v ->username}}">
			</div>

			<div class="form-group">
				<label for="pillInput">管理员密码</label>
				<input type="text" class="form-control input-pill" id="pillInput" placeholder="管理员密码" name="password" value ="{{$v -> password}}">
			</div>

			@endforeach
		</div>
		<div class="card-action">
			<button class="btn btn-success">Submit</button>

		</div>
	</div>

</div>
</form>
</body>
</html>
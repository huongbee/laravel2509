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

			<h1><?php echo e($data); ?></h1>

			<div class="col-6">
				<h2>Sign Up</h2>

				

				<form method="post" action="<?php echo e(route('form2')); ?>" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo e(old('email')); ?>"> <?php if($errors->has('email')): ?>
						<div class="alert alert-danger">
							<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($err); ?>

							<br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						<?php endif; ?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Birthdate</label>
						<input type="text" class="form-control" name="birthdate" placeholder="dd/mm/yyyy" value="<?php echo e(old('birthdate')); ?>"> <?php if($errors->has('birthdate')): ?>
						<div class="alert alert-danger">
							<?php $__currentLoopData = $errors->get('birthdate'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($err); ?>

							<br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						<?php endif; ?>
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
						<br> <?php if($errors->has('confirm_password')): ?>
						<div class="alert alert-danger">
							<?php $__currentLoopData = $errors->get('confirm_password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($err); ?>

							<br> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						<?php endif; ?>
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
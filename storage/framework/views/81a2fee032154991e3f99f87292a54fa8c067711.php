<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Upload file</title>
</head>

<body>


	<h1><?php echo e($data); ?></h1>

	<?php if(Session::has('error')): ?> <?php echo e(Session::get('error')); ?> <?php endif; ?>
	<form action="<?php echo e(route('form')); ?>" method="post" enctype="multipart/form-data">
		<!-- <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> -->
		<?php echo e(csrf_field()); ?>

		<input type="file" name="hinh">
		<button type="submit">Upload</button>
	</form>
</body>

</html>
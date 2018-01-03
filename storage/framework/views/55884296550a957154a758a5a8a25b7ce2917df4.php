<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <h1>Header</h1>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('content-2'); ?>

<?php 

if(1<2) echo 'Dung';
else echo "sai";
?>

<?php if(1<2): ?> 
    <h3>dung</h3>
<?php else: ?> 
    sai 
<?php endif; ?>

<?php
$arr = ['php', 'html', 'css'];
?>

<?php if(!empty($arr)): ?>
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($mang); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?> 
    Mang rong
<?php endif; ?>

<?php $__empty_1 = true; $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php echo e($mang); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> Mảng rỗng
<?php endif; ?>

<h1>Footer</h1>
</body>
</html>
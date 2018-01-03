 

<?php $__env->startSection('title','Trang chi tiet'); ?>

<?php $__env->startSection('content-2'); ?>

    <h3>Noi dung trang chi tiet 2</h3>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <h3>Noi dung trang chi tiet</h3>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 

<?php $__env->startSection('title','Trang chu'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Noi dung trang chu</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
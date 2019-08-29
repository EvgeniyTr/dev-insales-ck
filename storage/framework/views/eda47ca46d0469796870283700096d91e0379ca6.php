<?php $__env->startSection('favicon'); ?>
    <link rel="icon" type="image/png" href="https://merchant.cloudpayments.ru/content/img/favicon.png">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    CloudKassir
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e($path); ?><?php echo e($srcLaravelCss); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e($path); ?><?php echo e($srcCssAdminPanel); ?>" rel="stylesheet" type="text/css" >
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e($urlJQuerry); ?>"></script>
    
    <script src="<?php echo e($path); ?><?php echo e($srcJsSettings); ?>"></script>
    <script src="<?php echo e($path); ?><?php echo e($urlLibPopUpJs); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Settings.body', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
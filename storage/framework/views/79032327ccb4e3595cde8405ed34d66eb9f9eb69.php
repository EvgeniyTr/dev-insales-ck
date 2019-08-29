<html>
    <head>
        <?php echo $__env->yieldContent('favicon'); ?>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <?php echo $__env->yieldContent('css'); ?>
        <?php echo $__env->yieldContent('js'); ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="sidebar">
            <?php echo $__env->yieldContent('sidebar'); ?>
        </div>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>
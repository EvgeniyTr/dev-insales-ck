<?php echo $__env->make('FirstTimeSetup.ckSecret', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('FirstTimeSetup.ckSett', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('FirstTimeSetup.ckVAT', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('FirstTimeSetup.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '<?php echo e($messInsatallCompleate); ?>',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
        	//update firsttime init
	        document.location.replace('<?php echo e($usrAllSettings); ?>?insales_id='+getUrlParameter('insales_id'));
        });
    }

    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '<?php echo e($messInsatallCompleate); ?>',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            $.get(
                '<?php echo e($urlUpdateFirstTimeInit); ?>',
                {
                   'insales_id': getUrlParameter('insales_id')
                },
                function(){
                    document.location.replace('<?php echo e($usrAllSettings); ?>?insales_id='+getUrlParameter('insales_id'));
                }
            );
        });
    }

    function goToInsales(par=""){
        window.open('https://<?php echo e($backOfficeUrl); ?>/'+par, '_blank');
    }
</script>
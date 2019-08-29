<?php echo $__env->make('Settings.ckSettings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    function goToInsales(par=""){
        window.open('https://<?php echo e($backOfficeUrl); ?>/'+par, '_blank');
    }

    function getVATmess() {
    	VAT = <?php echo $vatId==NULL?"null":$vatId?>;
		var mess = '';
		switch (VAT) {
		  	case null:
		    	mess = "<?php echo e($titleNDSNull); ?>";
		    	break;
		  	case 0:
		    	mess = "<?php echo e($titleNDS0); ?>";
		    	break;
		  	case 10:
		    	mess = "<?php echo e($titleNDS10); ?>";
		    	break;
		  	case 18:
		    	mess = "<?php echo e($titleNDS18); ?>";
		    	break;
		}
		return mess;
    }

    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '<?php echo e($messUpdateCompleate); ?>',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
	        document.location.replace('<?php echo e($usrAllSettings); ?>?insales_id='+getUrlParameter('insales_id'));
        });
    }

    idTaxationSystem = "<?php echo e($userTaxationSystem); ?>";

</script>
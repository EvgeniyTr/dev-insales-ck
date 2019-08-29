@include('Settings.ckSettings')
<script>
    function goToInsales(par=""){
        window.open('https://{{$backOfficeUrl}}/'+par, '_blank');
    }

    function getVATmess() {
    	VAT = <?php echo $vatId==NULL?"null":$vatId?>;
		var mess = '';
		switch (VAT) {
		  	case null:
		    	mess = "{{$titleNDSNull}}";
		    	break;
		  	case 0:
		    	mess = "{{$titleNDS0}}";
		    	break;
		  	case 10:
		    	mess = "{{$titleNDS10}}";
		    	break;
		  	case 18:
		    	mess = "{{$titleNDS18}}";
		    	break;
		}
		return mess;
    }

    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '{{$messUpdateCompleate}}',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
	        document.location.replace('{{$usrAllSettings}}?insales_id='+getUrlParameter('insales_id'));
        });
    }

    idTaxationSystem = "{{$userTaxationSystem}}";

</script>
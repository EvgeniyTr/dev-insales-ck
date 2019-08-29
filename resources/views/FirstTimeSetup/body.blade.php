@include('FirstTimeSetup.ckSecret')
@include('FirstTimeSetup.ckSett')
@include('FirstTimeSetup.ckVAT')
@include('FirstTimeSetup.modal')
<script>
    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '{{$messInsatallCompleate}}',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
        	//update firsttime init
	        document.location.replace('{{$usrAllSettings}}?insales_id='+getUrlParameter('insales_id'));
        });
    }

    function popUpSave() {
        swal({
            position: 'center',
            type: 'success',
            title: '{{$messInsatallCompleate}}',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            $.get(
                '{{$urlUpdateFirstTimeInit}}',
                {
                   'insales_id': getUrlParameter('insales_id')
                },
                function(){
                    document.location.replace('{{$usrAllSettings}}?insales_id='+getUrlParameter('insales_id'));
                }
            );
        });
    }

    function goToInsales(par=""){
        window.open('https://{{$backOfficeUrl}}/'+par, '_blank');
    }
</script>
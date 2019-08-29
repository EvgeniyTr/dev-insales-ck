window.addEventListener("load", function(){  
	switch (getUrlParameter("form")) {
	  	case "vat":
	    	showVAT();
	    	break;
	   	case "set-secret":
	    	$("main.ck-secret").show();
	    	break;
	    case "set-sett":
	    	$("main.ck-sett").show();
	    	break;
	  	default:
			$("main.ck-secret").show();
	    	break;
	}
	addListnerOnCkSecret();
	addListnerOnCkSett();
	addListnerOnCkVAT();
	setListnerModal();
	init();
});

function init() {

	$.get(
		"<?php echo e($path); ?><?php echo e($urlInit); ?>",
		  {
	  		insales_id : getUrlParameter('insales_id')
		  },
		  function(res){
		}
	);
}

function addListnerOnCkVAT(){
	$("input.ckVAT").click(function(){get(
		"<?php echo e($path); ?><?php echo e($urlSaveCkVAT); ?>",
		[
			{
				key : "vat",
	  			val : $("select.set-vat option:selected").attr('id')
			}
		],
		function(res){
			invalidId(res, function(res){
				if(res){	
					$("main.ck-vat").hide();
					popUpSave();
				}
				else {
					$("div#err").show();
					$("label.err.unknownErr").show();
				}
			});
		},
		function(){
			$("label.err").hide();
			var fields = ["select.set-vat"];
			if(!filledFields(fields)){
				showErrEmptyField();
				return false;
			}
			else return true;
		},
		function() {
			$("div#err").show();
			$("label.err.unknownErr").show();	
		}
	)});
}

function addListnerOnCkSett(){
	//addListNds();
	$("select.taxation-system").val(undefined);

	$("input.ckSett").click(function(){get(
		"<?php echo e($path); ?><?php echo e($urlSaveCkSett); ?>",
		[
			{
				key : "inn",
	  			val : $("input.inn-val").val()
			},
			{
				key : "taxation-system",
	  			val : $("select.taxation-system option:selected").attr('id')
			}
		],
		function(res){
			invalidId(res, function(res){
				if(res){
					$("main.ck-sett").hide();
					showVAT();
					//popUpSave();
				}
				else {
					$("div#err").show();
					$("label.err.unknownErr").show();
				}
			});
		},
		function(){
			$("label.err").hide();
			var fields = ["input.inn-val", "select.taxation-system"];
			if(!filledFields(fields)){
				showErrEmptyField();
				return false;
			}
			else return true;
		},
		function() {
			$("div#err").show();
			$("label.err.unknownErr").show();	
		}
	)});
}

function addListNds() {
	//$("select.form-control.nds").append("<option>10%</option>")
}

function addListnerOnCkSecret(){
	$("input.ckSecret").click(function(){get(
		"<?php echo e($path); ?><?php echo e($urlSaveCkSecret); ?>",
		[
			{
				key : "public_id",
	  			val : $("input#keyFormPublicId").val()
			},
			{
				key : "api_secret",
	  			val : $("input#keyFormApiSecret").val()
			}
		],
		function(res){
			invalidId(res, function(res){
				if(res.status){
					$("main.ck-secret").hide();
					$("main.ck-sett").show();
				}
				else {
					$("div#err").show();
					if(res.messerr == "invalidPar")
						$("label.err.invalidPar").show();
					else
						$("label.err.unknownErr").show();
				}
			});
		},
		function(){
			$("label.err").hide();
			if(!filledFields(["input#keyFormApiSecret", "input#keyFormPublicId"])){
				showErrEmptyField();
				return false;
			}
			else return true;
		},
		function() {
			$("div#err").show();
			$("label.err.unknownErr").show();	
		}
	)});
}

function get(url, par, onSucess, valid, onFail){
	if(valid()) 
		$.get(
		  url,
		  joinObj([
		  	[{
		  		key : "insales_id",
		  		val : getUrlParameter('insales_id')
		  	}],
		  	par
		  ]),
		  onSucess
		).fail(function() {
	    	onFail();
	  	});
}

function filledFields(fields){
	filled = true;
	for (var i = 0; i < fields.length; i++) {
		if($(fields[i]).val() == "" || $(fields[i]).val() === null)
			filled = false;
	}
	return filled; 
}

function joinObj(dataRow){
	var obj = {};
	$(dataRow).each(function(i, elem){
		$(elem).each(function(i, elem){
			obj[elem.key] = elem.val;
		});
	});
	return obj;
}

function showErrEmptyField(){
	$("label.err").hide();
	$("div#err").show();
	$("label.emptyField").show();
}

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function invalidId(res, valid){
	$("label.err").hide();
	if(res.messerr == "invalidId"){
		$("div#err").show();
		$("label.err.invalidId").show();
	}
	else
		valid(res);
}

function setListnerModal(){  
  	$('a.thumbnail').click(function(e) {
    	e.preventDefault();
    	$('#image-modal .modal-body img').attr('src', $(this).find('img').attr('src'));
    	$("#image-modal").modal('show');
  	});
  	$('#image-modal .modal-body img').on('click', function() {
    	$("#image-modal").modal('hide')
  	});
}

function showVAT(){
	//setLocation("set-vat");
	$("main.ck-vat").show();
	$("select.set-vat").val(undefined);
}

function goTo(par){
	var insalesId = getUrlParameter("insales_id");
	if(insalesId !== undefined){
		var path = "<?php echo e($path); ?><?php echo e($srcFirstTimeSetup); ?>" + "?insales_id=" + insalesId;
		document.location.replace(path + "&" + par);
	}
}
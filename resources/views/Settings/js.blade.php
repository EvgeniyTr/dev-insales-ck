window.addEventListener("load", function(){  
	$.get(
	  	"{{$path}}{{$urlGetFirstTimeInit}}?insales_id=" + getUrlParameter('insales_id'),
	  	{
  			insales_id : getUrlParameter('insales_id')
  		},
		function(res) {	
			if(res.FirstTimeSetup){
				$("main.ck-settings").show();
				setVAT();
				setTaxationSystem();
				setListnerChangeSecret();
				setListnerSaveSecret();
				setListnerChangeTaxes();
				setListnerSaveTaxes();
				setListnerChangeVAT();
                setListenerChangeGatewayExceptions();
                setListenerSaveExceptions();
			} else {
				goTo("");
			}
		}
	);
});

function setListnerSaveTaxes() {
	$("span.button-change.inn-taxation-system.button-save").click(function(){
        get("{{$path}}{{$urlSaveCkSett}}",
            [
                {
                    key : "inn",
                    val : $("input.inn-taxation-system").val()
                },
                {
                    key : "taxation-system",
                    val : $("select.set-taxationSystem option:selected").attr('id')
                }
            ],
            function(res) {
                if(res){
                    /*$("input.user-email").prop('disabled', true);
                    $("div.button-change.user-email").show();
                    $("div.button-save.user-email").hide();
                    $("label.err").hide();*/
                    popUpSave();
                } else {
                    $("div.row.inn-taxation-system").show();
                    $("label.err.unknownErr").show();
                }
            },
            function() {
                $("label.err").hide();
                if(!filledFields(["input.inn-taxation-system", "select.set-taxationSystem option:selected"])){
                    $("div.row.inn-taxation-system").show();
                    showErrEmptyField();
                    return false;
                }
                else return true;
            }
	    );
    });
}

function setListenerSaveExceptions() {
    $("span.button-change.gateway-exceptions.button-save").click(function(){
        get("https://insales.cloudkassir.ru/saveCKGatewayExceptions",
            [
                {
                    key : "gateway-exception-1",
                    val : $("select.set-gateway-exception-1 option:selected").attr('id')
                },
                {
                    key : "gateway-exception-2",
                    val : $("select.set-gateway-exception-2 option:selected").attr('id')
                },
                {
                    key : "gateway-exception-3",
                    val : $("select.set-gateway-exception-3 option:selected").attr('id')
                }
            ],
            function(res) {
                if(res){
                    popUpSave();
                } else {
                    $("div.row.gateway-exceptions").show();
                    $("label.err.unknownErr").show();
                }
            },
            function() {
                $("label.err").hide();
                if(!filledFields(["input.gateway-exceptions", "set-gateway-exception-1 option:selected"])) {
                    $("div.row.gateway-exceptions").show();
                    showErrEmptyField();
                    return false;
                } else {
                    return true;
                }
            }
        );
    });
}

function setListnerChangeVAT() {
  	$("span.button-change.user-vat").click(function(e) {
    	goTo("form=vat");
  	});	
}

function setVAT() {
	$("select.set-VAT").append("<option>" + getVATmess() +"</option>");
}

function setTaxationSystem() {
	$('.set-taxationSystem option#'+idTaxationSystem).attr('selected','selected');
}

function setListnerChangeTaxes() {
  	$("span.button-change.inn-taxation-system").click(function(e) {
    	$("input.inn-taxation-system").prop('disabled', false);
    	$("select.set-taxationSystem").prop('disabled', false);
    	$("div.button-change.inn-taxation-system").hide();
    	$("div.button-save.inn-taxation-system").show();
  	});	
}

function setListnerChangeSecret(){  
  	$("span.button-change.public-id-and-api-secret").click(function(e) {
    	$("input.public-id-and-api-secret").prop('disabled', false);
    	$("div.button-change.public-id-and-api-secret").hide();
    	$("div.button-save.public-id-and-api-secret").show();
  	});
}

function setListenerChangeGatewayExceptions() {
        $("span.button-change.gateway-exceptions").click(function(e) {
            $("select.set-gateway-exception-1").prop('disabled', false);
            $("select.set-gateway-exception-2").prop('disabled', false);
            $("select.set-gateway-exception-3").prop('disabled', false);
            $("div.button-change.gateway-exceptions").hide();
            $("div.button-save.gateway-exception").show();
    });
}

function setListnerSaveSecret(){
	$("span.button-save.public-id-and-api-secret").click(function(){
		$("div#err.public-id-and-api-secret").hide();
            get("{{$urlSaveCkSecret}}",
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
                        $("input#keyFormApiSecret").prop('disabled', true);
                        $("input#keyFormPublicId").prop('disabled', true);
                        $("div.button-change.public-id-and-api-secret").show();
                        $("div.button-save.public-id-and-api-secret").hide();
                        $("label.err").hide();
                        popUpSave();
                    }
                    else {
                        $("div.row.public-id-and-api-secret").show();
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
                    $("div.row.public-id-and-api-secret").show();
                    showErrEmptyField();
                    return false;
                }
                else return true;
            }
	    )}
    );
}

function get(url, par, onSucess, valid){
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
	);
}

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split("&"),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split("=");

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

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

function invalidId(res, valid){
	$("label.err").hide();
	if(res.messerr == "invalidId"){
		$("div#err").show();
		$("label.err.invalidId").show();
	}
	else
		valid(res);
}

function showErrEmptyField(cssClass){
	$("label.err").hide();
	$("div#err." + cssClass).show();
	$("label.emptyField").show();
}

function goTo(par){
	var insalesId = getUrlParameter("insales_id");
	if(insalesId !== undefined){
		var path = "{{$path}}{{$srcFirstTimeSetup}}" + "?insales_id=" + insalesId;
		document.location.replace(path + "&" + par + "&inactive_back=true");
	}
}
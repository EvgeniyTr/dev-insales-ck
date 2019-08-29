<script src="{{$JQuerry}}"></script>
<script>
	window.addEventListener('load', function() {
		var handleFieldBillStatus = '{{$handleFieldBillStatus}}';
		var listBillStatuses = JSON.parse('{{$listBillStatuses}}'.replace(/&quot;/g,'"'));
		var billStatus = getValue(handleFieldBillStatus);
		genListItems();
		setListenerGenBill();
		setListenerApply();
		setListenerRefund();
		if(JSON.parse('{{$listNDSVal}}'.replace(/&quot;/g,'"')).indexOf({{ $oneNDS === null ? 'null' : $oneNDS }}) !== -1) {
		    genBill();
        } else {
		    $('.ck-list-items').show();
        }
	});

	function setListenerGenBill() {
		$('button.gen-bill').click(function(){genBill();});
	}

	function genBill() {
		addNds();
		hideLoadPicture();
		hideListItems();
		hideErr();
		hideSatuses();
		hideButtons();
		showLabel();
		showButtons()
	}

	function hideListItems() {
		$("div.ck-list-items").hide();
	}

	function hideErr() {
		$("div.unknown-err").hide();
	}

	function showErr() {
		$("div.unknown-err").show();
	}

	function hideButtons() {
		$("div.ck-buttons").hide();
		$("button.ck-apply-bill").hide();
		$("button.ck-apply-again-bill").hide();
		$("button.ck-refund-bill").hide();
		$("button.ck-refund-again-bill").hide();
	}

	function showLabel() {
		$("div.ck-buttons").show();
		switch(getStatus()) {
			case 'try_apply' :  
				$("span.ck-bill-success-send-apply").show();
			    break;
			case 'try_refund' :  
				$("span.ck-bill-success-send-refunded").show();
			    break;
			case 'applyed' :  
				$("span.ck-bill-success-applied").show();
			    break;
			case 'refund' :  
				$("span.ck-bill-success-refunded").show();
			    break;
		}
	}

	function showButtons() {
		$("div.ck-bill-status").show();
		showApplyButton();
		showRefundButton();
	}

	function getStatus() {
		var handleFieldBillStatus = '{{$handleFieldBillStatus}}';
		var billStatus = getValue(handleFieldBillStatus);
		return billStatus;
	} 

	function genListItems() {
		window.order_info.order_lines.forEach(function(item, i){
			$("tbody.ck-body-list-items").append(`
				<tr class="ck-order-item">
					<td>` + (i+1) + `  `+ item.title +`</td>
					<td class="ck-select-nds-box">
						`+ getSelectNDS()+`
					</td>
				</tr>
			`);
		});
		$("tbody.ck-body-list-items").append(`
			<tr class="ck-order-item">
				<td>
					{{$labelSendBillOnEmail}} ` + window.order_info.client.email +`
				</td>
				<td class="check-box">
					<input class="check-box-email" type="checkbox">
				</td>
			</tr>
			<tr class="ck-order-item">
				<td>
					{{$labelSendBillOnSMS}} ` + window.order_info.client.phone +`
				</td>
				<td class="check-box">
					<input class="check-box-sms" type="checkbox">
				</td>
			</tr>
			<tr class="ck-order-item">
				<td colspan="2" class="button-gen-bill">
					<button class="gen-bill">{{$buttonGenBill}}</button>
				</td>
			</tr>
		`);
	}

	function getSelectNDS() {
		var select = '<select>';
		var listNDS = JSON.parse('{{$listNDSVal}}'.replace(/&quot;/g,'"'));
		listNDS.forEach(function(item){
			var name = getNameNDS(item)
			select += '<option>' + name + '</option>';
		});
		select += '</select>';
		return select;
	}

	function getNameNDS(key) {
		var title = ""; 
		switch(key) {
		  case null:  
		  	title = '{{$titleNDSNull}}';
		    break;
		  case 0:  
		  	title = '{{$titleNDS0}}';
		    break;
		  case 10:  
		  	title = '{{$titleNDS10}}';
		    break;
		  case 18:  
		  	title = '{{$titleNDS18}}';
		    break;
		  case 110:  
		  	title = '{{$titleNDS110}}';
		    break;
		  case 118:  
		  	title = '{{$titleNDS118}}';
		    break;
		}
		return title;
	}

	function getIdDNS(str) {
		var id; 
		switch(str) {
		  case '{{$titleNDSNull}}':  
		  	id = null;
		    break;
		  case '{{$titleNDS0}}':  
		  	id = 0;
		    break;
		  case '{{$titleNDS10}}':  
		  	id = 10;
		    break;
		  case '{{$titleNDS18}}':  
		  	id = 18;
		    break;
		  case '{{$titleNDS110}}':  
		  	id = 110;
		    break;
		  case '{{$titleNDS118}}':  
		  	id = 118;
		    break;
		}
		return id;
	}

	function showDefault() {
		showDefaultButtons();
	}

	function showTryApplyed() {
		$(".ck-buttons").show();
		$(".ck-apply-again-bill").show();
		$(".ck-refund-bill").show();
		$(".ck-bill-success-send-apply").show();
		$(".ck-bill-status").show();
	}

	function showDefaultButtons() {
		$(".ck-buttons").show();
		$(".ck-apply-bill").show();
		$(".ck-refund-bill").show();
	}

	function getValue(handle){
		for (var i = 0; i < window.order_info.fields_values.length; i++) {
			if(window.order_info.fields_values[i].handle == handle)
				return window.order_info.fields_values[i].value;
		}
	}

	function validField(handle){
		for (var i = 0; i < window.order_info.fields_values.length; i++) {
			if(window.order_info.fields_values[i].handle == handle)
				return true;
		}
		return false;
	}

	function showLoadPicture()
	{
		hideListItems();
		hideErr();
		hideSatuses();
		hideButtons();
		$("div.ck-load-images").show();
		$("div.ck-load-images").append('<img class="ck-load-images" src="{{$loadImage}}">');
	}

	function hideLoadPicture()
	{
		$("div.ck-load-images").hide();
		$("div.ck-load-images").empty();
	}

	function setListenerApply() {
		$('button.ck-apply-bill').click(function(){applyBill();});
		$('button.ck-apply-again-bill').click(function(){applyBill();});
	}

	function showApplyButton() {
		var statusBill = getValue('{{$handleFieldBillStatus}}');
		$("button.ck-apply-bill").hide();
		$("button.ck-apply-again-bill").hide();
		if(statusBill == 'try_apply' || statusBill == 'applyed')
			$("button.ck-apply-again-bill").show();
		else
			$("button.ck-apply-bill").show();
	}

	function showRefundButton() {
		var statusBill = getValue('{{$handleFieldBillStatus}}');
		$("button.ck-refund-bill").hide();
		$("button.ck-refund-again-bill").hide();
		if(statusBill == 'try_refund' || statusBill == 'refund')
			$("button.ck-refund-again-bill").show();
		else
			$("button.ck-refund-bill").show();
	}

	function hideSatuses() {
		$("div.ck-bill-status").hide();
		$("span.ck-bill-success-applied").hide();
		$("span.ck-bill-success-refunded").hide();
		$("span.ck-bill-success-send-apply").hide();
		$("span.ck-bill-success-send-refunded").hide();
	}

	function prettyItems() {
		var items = window.order_info.order_lines.map(function(originItem){
			return {
				label : originItem.title,
				price : originItem.sale_price,
				quantity : originItem.quantity,
				amount : originItem.full_total_price,
				vat : originItem.nds
			};
		});
		items.push({
			label : window.order_info.delivery_title,
			price : window.order_info.delivery_price,
			quantity : 1,
			amount : window.order_info.delivery_price,
			vat : window.order_info.order_lines[0].nds
		});
		return items;
	}

	function addNds() {
		window.order_info.order_lines.forEach(function(item, i){
			if(i >= 0 && i <= window.order_info.order_lines.length-1) {
				if(false/*JSON.parse('{{$listNDSVal}}'.replace(/&quot;/g,'"')).indexOf({{$oneNDS}}) == -1*/)
					item.nds = getIdDNS($('select:eq(' + i + ')').val()); 
				else
					item.nds = <?php echo $oneNDS===NULL?"null":$oneNDS?>;
			}
		});
	}

	function applyBill() {
		showLoadPicture();
		$.ajax({
		    type: 'GET',
		    url: '{{$applyBill}}',
		    crossDomain: true,
		    data: {
		    	insales_id: window.order_info.account_id,
		    	order_id: window.order_info.id,
		    	status : 'try_apply',
		    	items: prettyItems(),
		    	phone : window.order_info.client.email,
		    	email : window.order_info.client.phone,
		  	},
		    dataType: 'jsonp',
		    success: function(responseData, textStatus, jqXHR) {
		    	hideLoadPicture();
				$("div.ck-bill-status").show();
				$("span.ck-bill-success-applied").show();
		    },
		    error: function (responseData, textStatus, errorThrown) {
		    	hideLoadPicture();
		    	showErr();
		    }
		});
	}

	function setListenerRefund() {
		$('button.ck-refund-bill').click(function(){refundBill();});
		$('button.ck-refund-again-bill').click(function(){refundBill();});
	}

	function refundBill() {
		showLoadPicture();
		$.ajax({
		    type: 'GET',
		    url: '{{$refundBill}}',
		    crossDomain: true,
		    data: {
		    	insales_id: window.order_info.account_id,
		    	order_id: window.order_info.id,
		    	status : 'try_refund',
		    	items: prettyItems(),
		    	phone : window.order_info.client.email,
		    	email : window.order_info.client.phone,
		  	},
		    dataType: 'jsonp',
		    success: function(responseData, textStatus, jqXHR) {
		    	hideLoadPicture();
				$("div.ck-bill-status").show();
				$("span.ck-bill-success-refunded ").show();
		    },
		    error: function (responseData, textStatus, errorThrown) {
		    	hideLoadPicture();
		    	showErr();
		    }
		});
	}
</script>
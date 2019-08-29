<div class="cloudkassir-office-widget" >
	<div class="ck-load-images hidden"></div>
	<div class="ck-bill-status hidden">
		<span class="ck-bill-success-applied hidden">{{$labelBillSuccessApplied}}</span>
		<span class="ck-bill-success-refunded hidden">{{$labelBillSuccessRefunded}}</span>
		<span class="ck-bill-success-send-apply hidden">{{$labelSendBillApplied}}</span>
		<span class="ck-bill-success-send-refunded hidden">{{$labelSendBillRefunded}}</span>
	</div>
	<div class="ck-buttons hidden">
		<button class="ck-apply-bill hidden">{{$buttonApplyBill}}</button>
		<button class="ck-apply-again-bill hidden">{{$buttonApplyAgainBill}}</button>
		<button class="ck-refund-bill hidden">{{$buttonRefundBill}}</button>
		<button class="ck-refund-again-bill hidden">{{$buttonRefundAgainBill}}</button>
	</div>
	<div class="ck-list-items hidden">
		<table class="ck-list-items">
			<tbody class="ck-body-list-items">
			<tr class="ck-order-item">
				<th>{{$titleItemsColomn}}</th>
				<th class="ck-select-nds-box">{{$titleNDSColomn}}</th>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="unknown-err hidden">
		<span>{{$unknownErr}}</span>
	</div>
</div>
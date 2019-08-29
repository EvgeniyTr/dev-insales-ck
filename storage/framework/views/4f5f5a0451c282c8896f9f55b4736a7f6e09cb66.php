<div class="cloudkassir-office-widget" >
	<div class="ck-load-images hidden"></div>
	<div class="ck-bill-status hidden">
		<span class="ck-bill-success-applied hidden"><?php echo e($labelBillSuccessApplied); ?></span>
		<span class="ck-bill-success-refunded hidden"><?php echo e($labelBillSuccessRefunded); ?></span>
		<span class="ck-bill-success-send-apply hidden"><?php echo e($labelSendBillApplied); ?></span>
		<span class="ck-bill-success-send-refunded hidden"><?php echo e($labelSendBillRefunded); ?></span>
	</div>
	<div class="ck-buttons hidden">
		<button class="ck-apply-bill hidden"><?php echo e($buttonApplyBill); ?></button>
		<button class="ck-apply-again-bill hidden"><?php echo e($buttonApplyAgainBill); ?></button>
		<button class="ck-refund-bill hidden"><?php echo e($buttonRefundBill); ?></button>
		<button class="ck-refund-again-bill hidden"><?php echo e($buttonRefundAgainBill); ?></button>
	</div>
	<div class="ck-list-items hidden">
		<table class="ck-list-items">
			<tbody class="ck-body-list-items">
				<tr class="ck-order-item">
					<th><?php echo e($titleItemsColomn); ?></th>
					<th class="ck-select-nds-box"><?php echo e($titleNDSColomn); ?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="unknown-err hidden">
		<span><?php echo e($unknownErr); ?></span>
	</div>
</div>
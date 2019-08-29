<?php $__env->startComponent('FirstTimeSetup.form'); ?>
    <?php $__env->slot('title'); ?>
        <?php echo e($ckVATTitle); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('main'); ?>
        <main class="ck-vat">
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('form'); ?>
    	<ul for="email" class="col-md-10 offset-md-1 col-form-label text-md-left">
			<li id="fieldTitle"><?php echo e($messVatSet); ?></li>
		</ul>	
		<div class="row col-md-10 offset-md-1">
			<a href="" class="addWidget thumbnail col-md-12">
				<img src="<?php echo e($path); ?>images/vat-set.png">
			</a>
		</div>
		<ul for="email" class="col-md-10 offset-md-1 col-form-label text-md-left">
			<li id="fieldTitle"><?php echo e($messVatSetField); ?></li>
		</ul>
		<div class="form-group row col-md-10 offset-md-1" >
			<div class="col-md-12">
				<div class="nds-fields">
					<label class="col-sm-4 col-form-label text-md-right">
						<span id="fieldTitle"><?php echo e($titleFieldSetVat); ?></span>
					</label>
					<div class="col-md-6">
						<select class="form-control set-vat">
							<option id="-1"><?php echo e($titleNDSNull); ?></option>
							<option id="0"><?php echo e($titleNDS0); ?></option>
							<option id="10"><?php echo e($titleNDS10); ?></option>
							<option id="18"><?php echo e($titleNDS18); ?></option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div id="err" class="form-group row">
			<div class="col-md-6 offset-md-4">
				<label class="err invalidPar">
					<?php echo e($errInvalidPar); ?>

				</label>
				<?php echo $__env->make('FirstTimeSetup.err', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="button-group">
				<input class="btn btn-primary" type="button" value="<?php echo e($buttonBackToInsalesSetVAL); ?>" onclick="goToInsales('admin2/account_tax')">
				<input class="btn btn-primary ckVAT" type="button" value="<?php echo e($butOkCpKeyForm); ?>" style="margin-left: 16px;">
				<a href="#!"  onclick="goTo('form=set-sett')" class="btn btn-link text-md-right back">
			        	<?php echo e($labelButtonBack); ?>

			    	</a>
		    </div>
		</div>
    <?php $__env->endSlot(); ?>
    
<?php echo $__env->renderComponent(); ?>
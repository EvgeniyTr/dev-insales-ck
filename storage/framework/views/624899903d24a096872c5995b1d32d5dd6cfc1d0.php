<?php $__env->startComponent('FirstTimeSetup.form'); ?>
    <?php $__env->slot('title'); ?>
        <?php echo e($ckSettTitle); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('main'); ?>
        <main class="ck-sett">
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('form'); ?>
	    <div class="settings-block">
			<div class="form-group row">
				<label for="email" class="col-sm-5 col-form-label text-md-right">
					<span id="fieldTitle"><?php echo e($titleFieldInn); ?></span>
				</label>
				<div class="col-md-5">
					<input value="" required="required" autofocus="autofocus" class="form-control inn-val">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-md-5 col-form-label text-md-right">
					<span id="fieldTitle"><?php echo e($titleFieldTaxationSystem); ?></span>
				</label>
				<div class="col-md-5">
					<select required="required" class="form-control taxation-system">
						<option id="0"><?php echo e($titleTaxation0); ?></option>
						<option id="1"><?php echo e($titleTaxation1); ?></option>
						<option id="2"><?php echo e($titleTaxation2); ?></option>
						<option id="3"><?php echo e($titleTaxation3); ?></option>
						<option id="4"><?php echo e($titleTaxation4); ?></option>
						<option id="5"><?php echo e($titleTaxation5); ?></option>
					</select>
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
		<div class="form-group row mb-0">
			<div class="col-md-8 offset-md-4">
				<input class="btn btn-primary ckSett" type="button" value="<?php echo e($butOkCpKeyForm); ?>">
				<a href="#!"  onclick="goTo('form=set-secret')" class="btn btn-link text-md-right back">
			        	<?php echo e($labelButtonBack); ?>

			    	</a>
		    </div>
		</div>
    <?php $__env->endSlot(); ?>
    
<?php echo $__env->renderComponent(); ?>
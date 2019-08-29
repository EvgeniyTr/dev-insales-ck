<?php $__env->startComponent('FirstTimeSetup.form'); ?>
    <?php $__env->slot('title'); ?>
        <?php echo e($ckSecretTitle); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('main'); ?>
        <main class="ck-secret">
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('form'); ?>
		<div class="form-group row">
			<label for="email" class="col-sm-4 col-form-label text-md-right">
				<span id="fieldTitle"><?php echo e($titleFieldAppId); ?></span>
			</label>
			<div class="col-md-6">
				<input id="keyFormPublicId" name="email" value="" required="required" autofocus="autofocus" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-md-4 col-form-label text-md-right">
				<span id="fieldTitle"><?php echo e($titleFieldApiSecret); ?></span>
			</label>
			<div class="col-md-6">
				<input id="keyFormApiSecret" name="password" required="required" class="form-control">
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
				<input class="btn btn-primary ckSecret" type="button" value="<?php echo e($butOkCpKeyForm); ?>">
		    </div>
		</div>
    <?php $__env->endSlot(); ?>
    
<?php echo $__env->renderComponent(); ?>
<?php echo e($main); ?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<div style="display:flex;justify-content: space-between;">
							<div class="title-form">
								<p class="title"><?php echo e($title); ?></p>
							</div>						
							
                            <div class="button-back-to-insales text-md-right">
                                <a href="<?php echo e(route('custom.logout')); ?>" class="btn btn-outline-secondary" type="button"><?php echo e($buttonBackToInsales); ?></a>
                            </div>
						</div>	
					</div>
					<div class="card-body">
						<form>
							<?php echo e($form); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
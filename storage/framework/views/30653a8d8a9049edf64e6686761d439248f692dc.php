<div class="logoCp offset-md-1"></div>
<nav class="navbar-expand-md navbar-light navbar-laravel">
	<div class="container">
        <button type="button" data-toggle="collapseг data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
        	<span class="navbar-toggler-icon"></span>
        </button> 
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
        	<ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->check()): ?>
                    <?php if((int) auth()->user()->insalesId === 360290 || (int) auth()->user()->insalesId === 524589): ?>
                        <li>
                            <a href="<?php echo e(route('users')); ?>" class="nav-link">Пользователи</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
        		<li>
        			<a href="https://cloudkassir.ru/" class="nav-link"><?php echo e($titleLinkOnCPSite); ?></a>
        		</li>
        		<li>
        			<a href="mailto:<?php echo e($supportEmail); ?>" class="nav-link"><?php echo e($titleLinkSupportEmail); ?></a>
        		</li>
                <li>
                    <span class="nav-link"><?php echo e($insalesPhone); ?></span>
                </li>
                <li>
                    <a href="mailto:<?php echo e($insalesEmail); ?>" class="nav-link"><?php echo e($insalesEmail); ?></a>
                </li>
        	</ul>
        </div>
    </div>
</nav>
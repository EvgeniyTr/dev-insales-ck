<?php $__env->startComponent('Settings.form'); ?>
    <?php $__env->slot('title'); ?>
        <?php echo e($ckSettingsTitle); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('main'); ?>
        <main class="ck-settings">
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('buttonBackToInsales'); ?>
        <?php echo e($buttonBackToInsales); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('backOfficeUrl'); ?>
        <?php echo e($backOfficeUrl); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('form'); ?>
        <div class="settings-block">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle"><?php echo e($titleFieldAppId); ?></span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormPublicId" name="email" value="<?php echo e(str_repeat('*', iconv_strlen($publicId))); ?>" required="required" autofocus="autofocus" class="form-control public-id-and-api-secret" disabled="true">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle"><?php echo e($titleFieldApiSecret); ?></span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormApiSecret" name="email" value="<?php echo e(str_repeat('*', iconv_strlen($apiSecret))); ?>" required="required" autofocus="autofocus" class="form-control public-id-and-api-secret" disabled="true">
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change public-id-and-api-secret">
                    <span id="fieldTitle" class="button-change public-id-and-api-secret"><?php echo e($buttonChange); ?></span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save public-id-and-api-secret">
                    <span id="fieldTitle" class="button-change public-id-and-api-secret button-save"><?php echo e($buttonSave); ?></span>
                </div>
            </div>
            <div id="err" class="form-group row public-id-and-api-secret" style="display: none;">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        <?php echo e($errInvalidPar); ?>

                    </label>
                    <label class="err err-settings emptyField">
                        <?php echo e($errEmpty); ?>

                    </label>
                    <label class="err err-settings unknownErr">
                        <?php echo e($errUnknownErr); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="settings-block">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle"><?php echo e($titleFieldInn); ?></span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormPublicId" name="email" value="<?php echo e(str_repeat('*', iconv_strlen($userInn))); ?>" required="required" autofocus="autofocus" class="form-control inn-taxation-system" disabled="true">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle"><?php echo e($titleFieldTaxationSystem); ?></span>
                </label>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <select class="form-control set-taxationSystem" disabled="true">
                        <option id="0"><?php echo e($titleTaxation0); ?></option>
                        <option id="1"><?php echo e($titleTaxation1); ?></option>
                        <option id="2"><?php echo e($titleTaxation2); ?></option>
                        <option id="3"><?php echo e($titleTaxation3); ?></option>
                        <option id="4"><?php echo e($titleTaxation4); ?></option>
                        <option id="5"><?php echo e($titleTaxation5); ?></option>
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change inn-taxation-system">
                    <span id="fieldTitle" class="button-change inn-taxation-system"><?php echo e($buttonChange); ?></span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save inn-taxation-system" style="display: none;">
                    <span id="fieldTitle" class="button-change inn-taxation-system button-save"><?php echo e($buttonSave); ?></span>
                </div>
            </div>
            <div id="err" class="form-group row inn-taxation-system">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        <?php echo e($errInvalidPar); ?>

                    </label>
                    <label class="err err-settings emptyField">
                        <?php echo e($errEmpty); ?>

                    </label>
                    <label class="err err-settings unknownErr">
                        <?php echo e($errUnknownErr); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="settings-block">
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle"><?php echo e($titleFieldVAT); ?></span>
                </label>
                <div class="col-md-6">
                    <select class="form-control set-VAT" disabled="true">
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change user-email">
                    <span id="fieldTitle" class="button-change user-vat"><?php echo e($buttonChange); ?></span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save user-email">
                    <span id="fieldTitle" class="button-change user-email button-save"><?php echo e($buttonSave); ?></span>
                </div>
            </div>
            <div id="err" class="form-group row user-vat">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        <?php echo e($errInvalidPar); ?>

                    </label>
                    <label class="err err-settings emptyField">
                        <?php echo e($errEmpty); ?>

                    </label>
                    <label class="err err-settings unknownErr">
                        <?php echo e($errUnknownErr); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="settings-block">
            <div class="text-md-center mb-3">Выберите варианты оплаты, для которых не требуются онлайн-чеки <br/>
                (например, при приеме наличных или оплате курьеру на месте).</div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="firstException">Исключение №1</span>
                </label>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <select class="form-control set-gateway-exception-1" disabled="true">
                        <option disabled>Выберите значение по умолчанию</option>
                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($gateway['id']); ?>" <?php echo e($gateway['id'] == $gatewayException1 ? 'selected' : ''); ?>><?php echo e($gateway['title']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option id="0" <?php echo e($gatewayException1 == 0 ? 'selected' : ''); ?>>Не использовать исключение</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="firstException">Исключение №2</span>
                </label>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <select class="form-control set-gateway-exception-2" disabled="true">
                        <option disabled>Выберите значение по умолчанию</option>
                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($gateway['id']); ?>" <?php echo e($gateway['id'] == $gatewayException2 ? 'selected' : ''); ?>><?php echo e($gateway['title']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option id="0" <?php echo e($gatewayException2 == 0 ? 'selected' : ''); ?>>Не использовать исключение</option>
                    </select>
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="secondException">Исключение №3</span>
                </label>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <select class="form-control set-gateway-exception-3" disabled="true">
                        <option disabled>Выберите значение по умолчанию</option>
                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="<?php echo e($gateway['id']); ?>" <?php echo e($gateway['id'] == $gatewayException3 ? 'selected' : ''); ?>><?php echo e($gateway['title']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option id="0" <?php echo e($gatewayException3 == 0 ? 'selected' : ''); ?>>Не использовать исключение</option>
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change gateway-exceptions">
                    <span id="fieldTitle" class="button-change gateway-exceptions"><?php echo e($buttonChange); ?></span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save gateway-exception" style="display: none;">
                    <span id="fieldTitle" class="button-change gateway-exceptions button-save"><?php echo e($buttonSave); ?></span>
                </div>
            </div>
            <div id="err" class="form-group row gateway-exceptions">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        <?php echo e($errInvalidPar); ?>

                    </label>
                    <label class="err err-settings emptyField">
                        <?php echo e($errEmpty); ?>

                    </label>
                    <label class="err err-settings unknownErr">
                        <?php echo e($errUnknownErr); ?>

                    </label>
                </div>
            </div>
        </div>
    <?php $__env->endSlot(); ?>
    
<?php echo $__env->renderComponent(); ?>
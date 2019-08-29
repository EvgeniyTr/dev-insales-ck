<?php $__env->startSection('content-body'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header card-title text-md-center">Список пользователей модуля CloudKassir</h5>

                <div class="card-body">

                    
                    <?php
                        $inactive = [];
                        $errors = [];
                        $deleted = [];
                        $correct = [];

                        foreach ($users as $user) {
                            if (!empty($user['deleted_at'])) {
                                $deleted[] = $user['insales_id'];
                                $user['status'] = 'dark';
                            } elseif (!isset($user['fieldIncomeId'], $user['fieldIncomeReturnId'], $user['widgetId'])) {
                                $errors[] = $user['insales_id'];
                                $user['status'] = 'danger';
                            } elseif (!$user['apiSecret'] || !$user['publicId']) {
                                $inactive[] = $user['insales_id'];
                                $user['status'] = 'secondary';
                            } else {
                                $correct[] = $user['insales_id'];
                                $user['status'] = 'primary';
                            }
                        }
                    ?>

                    <div class="alert alert-info mb-0">
                        <div class="text-md-center">
                            <strong>InSales ID</strong> пользователя <span class="badge badge-primary">синий</span>,
                            если все установлено и настроено правильно.
                            <br/>
                            <span class="badge badge-secondary">Серый</span> цвет используется для обозначения неактивных
                            пользователей (без подключенных API Secret и Public ID),
                            <span class="badge badge-danger">красный</span> для учетных записей, при установке которых произошла ошибка
                            (отсутствует одно из дополнительных полей или виджет), и
                            <span class="badge badge-dark">темно-серый</span> для магазинов, удаливших приложение.
                        </div>
                    </div>

                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-md-center">InSales ID</th>
                                <th class="text-md-center">URI магазина</th>
                                <th class="text-md-center">ИНН</th>
                                <th class="text-md-center">Система налогообложения</th>
                                <th class="text-md-center">НДС</th>
                                <th class="text-md-center">Поле чеков прихода</th>
                                <th class="text-md-center">Поле чеков возврата</th>
                                
                                <th class="text-md-center">Виджет</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-md-center">
                                        <span class="badge badge-<?php echo e($user['status']); ?>"><?php echo e($user['insalesId'] ?? 'N/A'); ?></span>
                                    </td>

                                    <td class="text-md-center">
                                        <a href="http://<?php echo e($user['urlShop']); ?>" class="card-link"
                                           target="_blank"><?php echo e($user['urlShop'] ?? 'N/A'); ?></a>
                                    </td>

                                    <td class="text-md-center">
                                        <?php echo e($user['inn'] ?? '---'); ?>

                                    </td>

                                    <td class="text-md-center">
                                        <?php echo e($user['taxationSystem'] ?? '---'); ?>

                                    </td>

                                    <td class="text-md-center">
                                        <?php echo e($user['nds'] ?? '---'); ?>

                                    </td>

                                    <td class="text-md-center">
                                        <?php echo e($user['fieldIncomeId'] ?? '---'); ?>

                                    </td>

                                    <td class="text-md-center">
                                        <?php echo e($user['fieldIncomeReturnId'] ?? '---'); ?>

                                    </td>

                                    

                                    <td class="text-md-center">
                                        <?php echo e($user['widgetId'] ?? '---'); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-center mb-0">
                        <?php echo e($users->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administration.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
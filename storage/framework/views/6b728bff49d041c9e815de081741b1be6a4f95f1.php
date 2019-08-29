<?php $__env->startSection('content-body'); ?>
    <main class="py-4" style="display: block; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <h4 class="card-header card-title">Основной функционал приложения CloudKassir</h4>
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item">Онлайн-чеки создаются только для безналичных
                                            платежей, поэтому если у Вас есть варианты оплаты, в которых расчет
                                            производится наличными деньгами, добавьте их в исключения
                                            (см.&nbsp;раздел "Работа с Приложением CloudKassir").
                                        </li>
                                        <li class="list-group-item">Чек прихода автоматически создается сменой статуса
                                            оплаты на "Оплачен".
                                        </li>
                                        <li class="list-group-item">Чек возврата можно сгенерировать с помощью
                                            нажатия кнопки "Оформить возврат" в виджете, находящемся на экране
                                            заказа. Создание чека возврата не означает возврат денег на счет
                                            Покупателя, для этого требуется отдельная операция, осуществляемая
                                            по правилам платежной системы, которая была использована для перевода.
                                        </li>
                                        <li class="list-group-item">Приложение направлено на российский рынок и
                                            взаимодействует корректно только с рублевой валютой магазина,
                                            остальные валюты не поддерживаются.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <h4 class="card-header card-title">Инструкция по установке приложения CloudKassir</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Установка приложения в маркетплейсе InSales</h5>
                                            <div class="card-text">Для начала работы с онлайн-кассой CloudKassir необходимо перейти в маркетплейс InSales и установить приложение «CloudKassir».</div>
                                            <div class="card-text">Далее Вам потребуется зайти в раздел "Приложения" бэк-офиса InSales, перейти в подраздел "Установленные" и нажать на название «CloudKassir».</div>
                                            <div class="card-text">Чтобы Приложение функционировало, Вам понадобится ввести Public ID и пароль для API.</div>
                                        </div>
                                        <img class="card-img-bottom" src="<?php echo e(asset('images/instruction/ck-account-apps.png')); ?>" alt="Личный кабинет пользователя сервиса CloudPayments">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Получение Public ID и пароля для API в личном кабинете CloudKassir</h5>

                                            <div class="card-text mb-3">Требуемые данные необходимо получить в личном кабинете CloudKassir.</div>
                                            <div class="alert alert-info" role="alert">Если у Вас нет учетной записи, оформить запрос на подключение можно на <a class="alert-link" href="https://cloudkassir.ru/#subscribe">официальном сайте сервиса CloudKassir</a>.</div>
                                            <div class="card-text">В разделе "Сайты" личного кабинета CloudKassir необходимо создать запись для Вашего магазина на платформе InSales. Здесь требутся получить Public ID и пароль для API, которые будут использоваться далее.</div>
                                        </div>
                                        <img class="card-img-bottom" src="<?php echo e(asset('images/instruction/cp-api.png')); ?>" alt="Личный кабинет пользователя сервиса CloudPayments">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Ввод данных в Приложение</h5>

                                            <div class="card-text mb-3">Для начала работы с системой CloudKassir необходимо пройти все шаги мастера начальной настройки.</div>
                                            <div class="card-text alert alert-info" role="alert">
                                                Поменять настройки можно будет в любой момент после завершения работы мастера.
                                            </div>
                                        </div>
                                        <img class="card-img-bottom" src="<?php echo e(asset('images/instruction/ck-initial-master.png')); ?>" alt="Раздел с установленными приложениями Пользователя InSales">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Работа с Приложением CloudKassir</h5>

                                            <div class="card-text alert alert-warning" role="alert">
                                                <strong>Внимание!</strong> Для корректной работы Приложения необходимо пройти все этапы настроек и заполнить все доступные поля.
                                            </div>

                                            <div class="card-text mb-3">По завершению работы мастера, Вы увидите главное
                                                меню Приложения. В качестве последнего этапа настройки нажмите кнопку
                                                "Изменить" в разделе с исключениями и выберите варианты оплаты, для
                                                которых не требуются онлайн-чеки (например, при приеме
                                                наличных или оплате курьеру на месте).
                                            </div>

                                            <div class="card-text alert alert-danger" role="alert">
                                                Обязательно нажмите кнопку "Сохранить", иначе настройки
                                                <strong>не будут применены</strong>, и онлайн-чеки будут выбиваться
                                                некорректно!
                                            </div>

                                            <div class="card-text mb-3">Будучи полностью настроенным и сконфигурированным, главное меню Приложения будет выглядеть аналогично примеру на скриншоте ниже.</div>
                                        </div>
                                        <img class="card-img-bottom" src="<?php echo e(asset('images/instruction/ck-final-state.png')); ?>" alt="Главное меню приложения">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Завершение настроек</h5>

                                            <div class="cart-text">Поздравляем, Вы успешно подключили себе онлайн-кассу и теперь можете создавать чеки для своих Покупателей, полностью соответствуя требованиям закона 54-ФЗ!</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Administration.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
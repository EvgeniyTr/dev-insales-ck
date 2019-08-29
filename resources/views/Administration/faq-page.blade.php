<div class="modal fade" id="faq-page" tabindex="-1" role="dialog" aria-labelledby="faq-page-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faq-page-title">Список часто задаваемых вопросов</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="accordion" id="accordion-faq">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#initial-requirements" aria-expanded="false" aria-controls="initial-requirements">
                                    Что требуется для начала работы?
                                </h5>
                            </div>

                            <div id="initial-requirements" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    Для начала работы необходимо иметь существующую учетную запись на сервисе CloudPayments. Также требуется подключить ваш интернет магазин в разделе "Сайты", чтобы получить Public_ID и api_password.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#change-account" aria-expanded="false" aria-controls="change-account">
                                    Как подключить или сменить учетную запись CloudPayments в Приложении?
                                </h5>
                            </div>
                            <div id="change-account" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    Пройдите начальную пошаговую настройку, если Вы только установили Приложение, или нажмите кнопку "Изменить" в напротив пары Public ID/Пароль для API, если Приложение уже настроено.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#common-info" aria-expanded="false" aria-controls="common-info">
                                    Где можно ознакомиться с возможностями сервиса?
                                </h5>
                            </div>
                            <div id="common-info" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    С последней и наиболее полной версией описания возможностей работы сервиса можно ознакомиться <a href="https://cloudpayments.ru/Docs/Integration">на официальном сайте CloudPayments</a>.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#dual-message-scheme" aria-expanded="false" aria-controls="dual-message-scheme">
                                    Как реализован режим двухстадийной оплаты в данном Приложении?
                                </h5>
                            </div>
                            <div id="dual-message-scheme" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    Для работы с режимом двухстадийной оплаты Приложение добавляет в раздел "Заказы" виджет, позволяющий подтвердить или отклонить платеж. Также заказы, поступившие по двухстадийной схеме, имеют начальный статус "Платеж авторизован", сигнализирующий о корректном прохождении первого этапа оплаты - удержании средств на счете Покупателя.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#change-properties" aria-expanded="false" aria-controls="change-properties">
                                    Можно ли изменить схему оплаты и ставку НДС?
                                </h5>
                            </div>
                            <div id="change-properties" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    После прохождения первоначальной настройки изменить введенные параметры можно в любой момент, нажав кнопку "Изменить" у интересующего пункта.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="card-title mb-0" data-toggle="collapse" data-target="#retry-receipt-message" aria-expanded="false" aria-controls="retry-receipt-message">
                                    Возможно ли совершить повторную отправку чека/квитанции Покупателю?
                                </h5>
                            </div>
                            <div id="retry-receipt-message" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-faq">
                                <div class="card-body mb-3">
                                    Повторная отправка чека или квитанции Покупателю доступна в личном кабинете CloudPayments
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
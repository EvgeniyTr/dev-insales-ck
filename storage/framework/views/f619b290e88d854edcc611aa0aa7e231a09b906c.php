<div id="widget" class="cloudkassir-office-widget">
    <div id="error-wrong-response" style="display: none; " align="center">
        <div>На сервере произошла ошибка! Пожалуйста, повторите попытку позже или обратитесь в службу технической
            поддержки CloudKassir.</div>
    </div>
    <div id="error-no-data" style="display: none; " align="center">
        <div>Отсутствуют данные по заказу. Пожалуйста, повторите запрос позднее или обратитесь в службу технической
            поддержки модуля CloudKassir.</div>
    </div>
    <div id="error-incorrect-financial-status" style="display: none; " align="center">
        <div>В заказе используется некорректный финансовый статус. Возможные значения: "Не оплачен" и "Оплачен".
            Попробуйте изменить его или обратитесь в службу технической поддержки модуля CloudKassir.</div>
    </div>
    <div id="widget-menu" style="display: none; ">
        <div id="descriptive-message" align="center">
            <div id="income-condition" style="display: none; ">
                Для формирования чека после поступления оплаты переведите статус заказа в состояние "Оплачен".
                
            </div>
            <div id="income-receipt-already-generated" style="display: none; ">
                Чек прихода уже сформирован и отправлен клиенту.
            </div>


            <div id="income-return-receipt-already-generated" style="display: none; ">
                Чек возврата уже сформирован и отправлен клиенту.
            </div>


            <div id="refund-condition" style="display: none; ">
                Для создания чека возврата нажмите кнопку <br/> "Оформить возврат"
            </div>
            <div id="successful-receipt-generation" style="display: none; ">
                Задача на формирование чека успешно поставлена в очередь на сервисе CloudKassir.
            </div>
        </div>
        <br/>
        <div id="refund-button" align="center">
            <button id="request-income-button" class="ck-apply-bill" style="display: none; ">Создать чек прихода</button>
            <button id="request-refund-button" class="ck-refund-bill" style="display: none; ">Оформить возврат</button>
        </div>
        <div class="ck-load-images hidden"></div>
    </div>
</div>
<style type="text/css">
    .cloudkassir-office-widget {
        display: flex;
        justify-content: center;
        align-items: center;
        Font-family: "MuseoSans";
        font-size: 12px;
        text-transform: uppercase;
        color: #737373;
        text-align: center;
        flex-direction: column;
    }

    .unknown-err {
        color: #DC5F59;
        margin-top: 5px;
    }

    img.ck-load-images {
        height: 50px;
    }

    button{
        color: #fff;
        background-color: #7094C0;
        border-color: #5e87b8;
        margin-bottom: 0;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        padding: 4px 10px;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 1px;
        font-weight: 300;
    }

    button:active, button:hover{
        background-color: #547fb4;
        border-color: #426897;
    }

    button:focus{
        background-color: #547fb4;
        border-color: #426897;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    button.ck-apply-bill, button.ck-refund-bill {
        width:100%;
        max-width: 200px;
        margin-top: 5px;
        padding-bottom: 6px;
    }

    
</style>

<script type="text/javascript">
    document.body.style.background = '#f6f6f6';

//    window.order_info = {'some': 'value', 'financial_status': 'paid'};

    window.addEventListener('load', function() {
        if (window.order_info) {
            var financialStatus = window.order_info.financial_status;

            switch (financialStatus) {
                case 'pending':
                    document.getElementById('widget-menu').style.display = 'block';
                    document.getElementById('income-condition').style.display = 'block';
//                    document.getElementById('request-income-button').addEventListener('click', sendIncomeReceiptGenerationRequest);
//                    document.getElementById('request-income-button').style.display = 'block';
                    break;
                case 'paid':
                    document.getElementById('widget-menu').style.display = 'block';
                    document.getElementById('refund-condition').style.display = 'block';
                    document.getElementById('request-refund-button').addEventListener('click', sendRefundRequest);
                    document.getElementById('request-refund-button').style.display = 'block';
                    break;
                default:
                    document.getElementById('error-incorrect-financial-status').style.display = 'block';
                    console.error('Incorrect value of financial status field:', financialStatus);
            }
        } else {
            document.getElementById('error-no-data').style.display = 'block';
            console.error('No order data provided', window.order_info);
        }
    });

    function sendIncomeReceiptGenerationRequest() {
        document.getElementById('request-income-button').setAttribute('disabled','disabled');
        document.getElementById('request-income-button').style.display = 'none';
        document.getElementById('income-condition').style.display = 'none';

        var field = findField(window.order_info);

        if (typeof field === 'object' && field.value === 'income_receipt_generated') {
            document.getElementById('income-receipt-already-generated').style.display = 'block'
        } else {
            post('<?php echo e(route('receipt.income', ['user' => $user['id']])); ?>', JSON.stringify(window.order_info)).then(
                function(response) {
                    console.log('Successful print', response);
                    document.getElementById('successful-receipt-generation').style.display = 'block';
                },
                function(error) {
                    document.getElementById('widget-menu').style.display = 'none';
                    document.getElementById('error-wrong-response').style.display = 'block';
                    console.error('Printing error', error);
                }
            );
        }
    }

    function sendRefundRequest() {
        document.getElementById('request-refund-button').setAttribute('disabled','disabled');
        document.getElementById('request-refund-button').style.display = 'none';
        document.getElementById('refund-condition').style.display = 'none';

        var field = findField(window.order_info);

        if (typeof field === 'object' && field.value === 'income_return_receipt_generated') {
            document.getElementById('income-return-receipt-already-generated').style.display = 'block'
        } else {
            post('<?php echo e(route('receipt.income-return', ['user' => $user['id']])); ?>', JSON.stringify(window.order_info)).then(
                function(response) {
                    console.log('Successful print', response);
                    document.getElementById('successful-receipt-generation').style.display = 'block';
                },
                function(error) {
                    document.getElementById('widget-menu').style.display = 'none';
                    document.getElementById('error-wrong-response').style.display = 'block';
                    console.error('Printing error', error);
                }
            );
        }
    }

    function post(url, json) {
        return new Promise(function(resolve, reject) {

            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    resolve(JSON.parse(xhr.response));
                } else {
                    reject(Error(xhr.statusText));
                }
            };

            xhr.onerror = function() {
                reject(Error("Network Error"));
            };

            xhr.send(json);
        });
    }

    function findField(order_info) {
        var ckStatusField = order_info.fields_values.find(function(item) {
            return item.handle === 'CloudKassirStatus';
        });

        if (typeof ckStatusField !== 'undefined' && ckStatusField !== null) {
            return ckStatusField;
        }
    }
</script>


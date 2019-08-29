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
                {{--Для создания чека прихода нажмите кнопку <br/> "Создать чек прихода"--}}
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

    {{--div.ck-list-items {
        width: 100%;
        color: #555555;
        font-size: 100%;
        text-transform: none;
        font-family: sans-serif;
        text-align: left;
    }--}}
</style>
{{--<style type="text/css">
    .widget-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 130px
    }

    #widget {
        display: -webkit-box;   /* OLD: Safari,  iOS, Android browser, older WebKit browsers.  */
        display: -moz-box;      /* OLD: Firefox (buggy) */
        display: -ms-flexbox;   /* MID: IE 10 */
        display: -webkit-flex;  /* NEW, Chrome 21–28, Safari 6.1+ */
        display: flex;          /* NEW: IE11, Chrome 29+, Opera 12.1+, Firefox 22+ */

        -webkit-box-align: center; -moz-box-align: center; /* OLD… */
        -ms-flex-align: center; /* You know the drill now… */
        -webkit-align-items: center;
        align-items: center;

        -webkit-box-pack: center; -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;

        margin: 0;
        height: 100%;
        width: 100% /* needed for Firefox */
    }
    .submit {
        width: 180px;
        height: 32px;
        padding: 0 0 2px;
        font: 16px "Trebuchet MS", Tahoma, Arial, sans-serif;
        outline: none;
        position: relative;
        cursor: pointer;
        border-radius: 3px;
        color: #000000;
        text-shadow: 1px 1px #B6E6F9;
        border: 1px solid #60A7C1;
        border-top: 1px solid #8CC5D9;
        border-bottom: 1px solid #4191B0;
        box-shadow:
                inset 0 1px #CDEFFB,
                inset 1px 0 #A8E2F8,
                inset -1px 0 #A8E2F8,
                inset 0 -1px #8DD9F5,
                0 2px #589CB6,
                0 3px #4E8AA1,
                0 4px 2px rgba(0,0,0,0.4)
    ;
        background: -moz-linear-gradient(top,  #abe4f8 0%, #74d0f4 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#abe4f8), color-stop(100%,#74d0f4)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #abe4f8 0%,#74d0f4 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #abe4f8 0%,#74d0f4 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #abe4f8 0%,#74d0f4 100%); /* IE10+ */
        background: linear-gradient(top,  #abe4f8 0%,#74d0f4 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#abe4f8', endColorstr='#74d0f4',GradientType=0 ); /* IE6-9 */
        background-color: #8CD8F6;
    }
    .submit::-moz-focus-inner{border:0}
    .submit:hover {
        border-top: 1px solid #79ACBE;
        box-shadow:
                inset 0 1px #B2E6F8,
                inset 1px 0 #A8E2F8,
                inset -1px 0 #A8E2F8,
                inset 0 -1px #A8E2F8,
                0 2px #589CB6,
                0 3px #4E8AA1,
                0 4px 2px rgba(0,0,0,0.4)
    ;
        background: -moz-linear-gradient(top,  #80d4f5 0%, #92dbf6 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#80d4f5), color-stop(100%,#92dbf6)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #80d4f5 0%,#92dbf6 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #80d4f5 0%,#92dbf6 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #80d4f5 0%,#92dbf6 100%); /* IE10+ */
        background: linear-gradient(top,  #80d4f5 0%,#92dbf6 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80d4f5', endColorstr='#92dbf6',GradientType=0 ); /* IE6-9 */
        background-color: #8CD8F6;
    }
    .submit:active {
        top: 3px;
        border: 1px solid #72AFC5;
        border-top: 1px solid #5C8D9F;
        border-bottom: 1px solid #7DBFD8;
        background: #8CD6F3;
        box-shadow: inset 0 1px 2px #50A5C5;
    }
</style>--}}
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
            post('{{ route('receipt.income', ['user' => $user['id']]) }}', JSON.stringify(window.order_info)).then(
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
            post('{{ route('receipt.income-return', ['user' => $user['id']]) }}', JSON.stringify(window.order_info)).then(
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

{{--<script type="text/javascript">

    console.clear();

    // =============
    // jQuery
    var londonURL = 'http://api.openweathermap.org/data/2.5/weather?q=London&units=metric&APPID=93b0b9be965a11f0f099c8c7f74afa63'

    // jQuery Javascript Ajac call
    function getCurrentWeather(url) {
        return $.ajax(url);
    }

    // Use the jQuery promises chain
    getCurrentWeather(londonURL).then(function(response) {
        console.log('jQuery success!', response.name);
    }, function(error) {
        console.error('jQuery failed!', error);
    });



    // =============
    // Vanilla JavaScript
    var parisURL = 'http://api.openweathermap.org/data/2.5/weather?q=Paris&units=metric&APPID=93b0b9be965a11f0f099c8c7f74afa63'

    // Vanilla Javascript Ajax call
    function get(url) {
        return new Promise(function(resolve, reject) {

            var xhr = new XMLHttpRequest();
            xhr.open('GET', url);

            xhr.onload = function() {
                // This is called even on 404 etc
                // so check the status
                if (xhr.status == 200) {
                    // Resolve the promise with the response text
                    resolve(JSON.parse(xhr.response));
                } else {
                    // Otherwise reject with the status text
                    // which will hopefully be a meaningful error
                    reject(Error(xhr.statusText));
                }
            };

            // Handle network errors
            xhr.onerror = function() {
                reject(Error("Network Error"));
            };

            // Make the request
            xhr.send();
        });
    }

    // Use vanilla js promises chain
    get(parisURL).then(function(response) {
        console.log('Vanilla Javascript success!', response.name);
    }, function(error) {
        console.error('Vanilla Javascript failed!', error);
    });

</script>






<style type="text/css">
    @import url("https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css");
</style>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.18.0/index.min.js"></script>
<script type="text/javascript">
    new Vue({
        el: '#widget',
        data() {
            return {
                error: null,
                widget: 'This is widget',
                choosen_delivery_point: 'ПВЗ по умолчанию',
                delivery_points: ['ПВЗ по умолчанию', 'Пункт выдачи заказов на проспекте Станислава Горчичного', 'Самовывоз у памятника пшеничному напитку'],
                currentPrice: 4933.23,
                recalculatedPrice: 5212.11,
                choosen_tariff: 'Стандартный тариф, недорогая доставка',
                tariff_pickup: 1,
                choosen_pickup_point: 'PickPoint - самовывоз на проспекте триумфа',
                pickup_points: ['СДЭК, точка у угла дома напротив столба рядом со зданием', 'PickPoint - самовывоз на проспекте триумфа'],
                commentary:'',
            };
        },

        computed: {
            loadingState: function() {
                /*return setTimeout(() => {return true}, 3000);*/
                return this.widget === null;
            },
            order_number: function() {
                return window.order_info.number;
            },
            recipient_contact_name: function() {
                return window.order_info.client.name;
            },
            recipient_contact_phone: function() {
                return window.order_info.client.phone;
            },
            recipient_contact_email: function() {
                return window.order_info.client.email;
            },
        },

        methods: {
            updatePrice() {
                this.currentPrice = this.recalculatedPrice;
            },

            placeDeliveryRequest() {
                console.log('Заказ на доставку размещен');
            },
        },
    })
</script>
--}}
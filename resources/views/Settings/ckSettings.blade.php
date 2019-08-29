@component('Settings.form')
    @slot('title')
        {{$ckSettingsTitle}}
    @endslot

    @slot('main')
        <main class="ck-settings">
    @endslot

    @slot('buttonBackToInsales')
        {{$buttonBackToInsales}}
    @endslot

    @slot('backOfficeUrl')
        {{$backOfficeUrl}}
    @endslot

    @slot('form')
        <div class="settings-block">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle">{{$titleFieldAppId}}</span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormPublicId" name="email" value="{{ str_repeat('*', iconv_strlen($publicId)) }}" required="required" autofocus="autofocus" class="form-control public-id-and-api-secret" disabled="true">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle">{{$titleFieldApiSecret}}</span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormApiSecret" name="email" value="{{ str_repeat('*', iconv_strlen($apiSecret)) }}" required="required" autofocus="autofocus" class="form-control public-id-and-api-secret" disabled="true">
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change public-id-and-api-secret">
                    <span id="fieldTitle" class="button-change public-id-and-api-secret">{{$buttonChange}}</span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save public-id-and-api-secret">
                    <span id="fieldTitle" class="button-change public-id-and-api-secret button-save">{{$buttonSave}}</span>
                </div>
            </div>
            <div id="err" class="form-group row public-id-and-api-secret" style="display: none;">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        {{$errInvalidPar}}
                    </label>
                    <label class="err err-settings emptyField">
                        {{$errEmpty}}
                    </label>
                    <label class="err err-settings unknownErr">
                        {{$errUnknownErr}}
                    </label>
                </div>
            </div>
        </div>

        <div class="settings-block">
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle">{{$titleFieldInn}}</span>
                </label>
                <div class="col-md-6">
                    <input id="keyFormPublicId" name="email" value="{{ str_repeat('*', iconv_strlen($userInn)) }}" required="required" autofocus="autofocus" class="form-control inn-taxation-system" disabled="true">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle">{{$titleFieldTaxationSystem}}</span>
                </label>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <select class="form-control set-taxationSystem" disabled="true">
                        <option id="0">{{$titleTaxation0}}</option>
                        <option id="1">{{$titleTaxation1}}</option>
                        <option id="2">{{$titleTaxation2}}</option>
                        <option id="3">{{$titleTaxation3}}</option>
                        <option id="4">{{$titleTaxation4}}</option>
                        <option id="5">{{$titleTaxation5}}</option>
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change inn-taxation-system">
                    <span id="fieldTitle" class="button-change inn-taxation-system">{{$buttonChange}}</span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save inn-taxation-system" style="display: none;">
                    <span id="fieldTitle" class="button-change inn-taxation-system button-save">{{$buttonSave}}</span>
                </div>
            </div>
            <div id="err" class="form-group row inn-taxation-system">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        {{$errInvalidPar}}
                    </label>
                    <label class="err err-settings emptyField">
                        {{$errEmpty}}
                    </label>
                    <label class="err err-settings unknownErr">
                        {{$errUnknownErr}}
                    </label>
                </div>
            </div>
        </div>

        <div class="settings-block">
            <div class="form-group row" style="margin-bottom: 0px;">
                <label for="email" class="col-sm-3 col-form-label text-md-right">
                    <span id="fieldTitle">{{$titleFieldVAT}}</span>
                </label>
                <div class="col-md-6">
                    <select class="form-control set-VAT" disabled="true">
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change user-email">
                    <span id="fieldTitle" class="button-change user-vat">{{$buttonChange}}</span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save user-email">
                    <span id="fieldTitle" class="button-change user-email button-save">{{$buttonSave}}</span>
                </div>
            </div>
            <div id="err" class="form-group row user-vat">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        {{$errInvalidPar}}
                    </label>
                    <label class="err err-settings emptyField">
                        {{$errEmpty}}
                    </label>
                    <label class="err err-settings unknownErr">
                        {{$errUnknownErr}}
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
                        @foreach ($gateways as $gateway)
                            <option id="{{ $gateway['id'] }}" {{ $gateway['id'] == $gatewayException1 ? 'selected' : '' }}>{{ $gateway['title'] }}</option>
                        @endforeach
                        <option id="0" {{ $gatewayException1 == 0 ? 'selected' : '' }}>Не использовать исключение</option>
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
                        @foreach ($gateways as $gateway)
                            <option id="{{ $gateway['id'] }}" {{ $gateway['id'] == $gatewayException2 ? 'selected' : '' }}>{{ $gateway['title'] }}</option>
                        @endforeach
                        <option id="0" {{ $gatewayException2 == 0 ? 'selected' : '' }}>Не использовать исключение</option>
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
                        @foreach ($gateways as $gateway)
                            <option id="{{ $gateway['id'] }}" {{ $gateway['id'] == $gatewayException3 ? 'selected' : '' }}>{{ $gateway['title'] }}</option>
                        @endforeach
                        <option id="0" {{ $gatewayException3 == 0 ? 'selected' : '' }}>Не использовать исключение</option>
                    </select>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change gateway-exceptions">
                    <span id="fieldTitle" class="button-change gateway-exceptions">{{$buttonChange}}</span>
                </div>
                <div class="col-sm-3 col-form-label text-md-right button-change button-save gateway-exception" style="display: none;">
                    <span id="fieldTitle" class="button-change gateway-exceptions button-save">{{$buttonSave}}</span>
                </div>
            </div>
            <div id="err" class="form-group row gateway-exceptions">
                <div class="col-md-6 offset-md-3">
                    <label class="err err-settings invalidPar">
                        {{$errInvalidPar}}
                    </label>
                    <label class="err err-settings emptyField">
                        {{$errEmpty}}
                    </label>
                    <label class="err err-settings unknownErr">
                        {{$errUnknownErr}}
                    </label>
                </div>
            </div>
        </div>
    @endslot
    
@endcomponent
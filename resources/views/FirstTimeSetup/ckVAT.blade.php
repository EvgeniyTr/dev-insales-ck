@component('FirstTimeSetup.form')
    @slot('title')
        {{$ckVATTitle}}
    @endslot

    @slot('main')
        <main class="ck-vat">
    @endslot

    @slot('form')
    	<ul for="email" class="col-md-10 offset-md-1 col-form-label text-md-left">
			<li id="fieldTitle">{{$messVatSet}}</li>
		</ul>	
		<div class="row col-md-10 offset-md-1">
			<a href="" class="addWidget thumbnail col-md-12">
				<img src="{{$path}}images/vat-set.png">
			</a>
		</div>
		<ul for="email" class="col-md-10 offset-md-1 col-form-label text-md-left">
			<li id="fieldTitle">{{$messVatSetField}}</li>
		</ul>
		<div class="form-group row col-md-10 offset-md-1" >
			<div class="col-md-12">
				<div class="nds-fields">
					<label class="col-sm-4 col-form-label text-md-right">
						<span id="fieldTitle">{{$titleFieldSetVat}}</span>
					</label>
					<div class="col-md-6">
						<select class="form-control set-vat">
							<option id="-1">{{$titleNDSNull}}</option>
							<option id="0">{{$titleNDS0}}</option>
							<option id="10">{{$titleNDS10}}</option>
							<option id="18">{{$titleNDS18}}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div id="err" class="form-group row">
			<div class="col-md-6 offset-md-4">
				<label class="err invalidPar">
					{{$errInvalidPar}}
				</label>
				@include('FirstTimeSetup.err')
			</div>
		</div>
		<div class="col-md-12">
			<div class="button-group">
				<input class="btn btn-primary" type="button" value="{{$buttonBackToInsalesSetVAL}}" onclick="goToInsales('admin2/account_tax')">
				<input class="btn btn-primary ckVAT" type="button" value="{{$butOkCpKeyForm}}" style="margin-left: 16px;">
				<a href="#!"  onclick="goTo('form=set-sett')" class="btn btn-link text-md-right back">
			        	{{$labelButtonBack}}
			    	</a>
		    </div>
		</div>
    @endslot
    
@endcomponent
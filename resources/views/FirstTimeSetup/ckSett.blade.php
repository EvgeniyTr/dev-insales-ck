@component('FirstTimeSetup.form')
    @slot('title')
        {{$ckSettTitle}}
    @endslot

    @slot('main')
        <main class="ck-sett">
    @endslot

    @slot('form')
	    <div class="settings-block">
			<div class="form-group row">
				<label for="email" class="col-sm-5 col-form-label text-md-right">
					<span id="fieldTitle">{{$titleFieldInn}}</span>
				</label>
				<div class="col-md-5">
					<input value="" required="required" autofocus="autofocus" class="form-control inn-val">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-md-5 col-form-label text-md-right">
					<span id="fieldTitle">{{$titleFieldTaxationSystem}}</span>
				</label>
				<div class="col-md-5">
					<select required="required" class="form-control taxation-system">
						<option id="0">{{$titleTaxation0}}</option>
						<option id="1">{{$titleTaxation1}}</option>
						<option id="2">{{$titleTaxation2}}</option>
						<option id="3">{{$titleTaxation3}}</option>
						<option id="4">{{$titleTaxation4}}</option>
						<option id="5">{{$titleTaxation5}}</option>
					</select>
				</div>
			</div>
		</div>
{{--
		<div class="form-group row">
			<label for="password" class="col-md-5 col-form-label text-md-right">
				<span id="fieldTitle">{{$titleFieldAllNDS}}</span>
			</label>
			<div class="col-md-5 all-nds-checkbox">
				<input type="checkbox" required="required" class="form-control all-nds-checkbox">
			</div>
		</div>
		<div class="form-group row " >
			<label for="password" class="col-md-5 col-form-label text-md-right">
				<span id="fieldTitle">{{$titleFieldNDS}}</span>
			</label>
			<div class="col-md-5">
				<select class="form-control nds" disabled>
					<option id="-1">{{$titleNDSNull}}</option>
					<option id="0">{{$titleNDS0}}</option>
					<option id="10">{{$titleNDS10}}</option>
					<option id="18">{{$titleNDS18}}</option>
					<option id="110">{{$titleNDS110}}</option>
					<option id="118">{{$titleNDS118}}</option>
				</select>
			</div>
		</div>
--}}
		<div id="err" class="form-group row">
			<div class="col-md-6 offset-md-4">
				<label class="err invalidPar">
					{{$errInvalidPar}}
				</label>
				@include('FirstTimeSetup.err')
			</div>
		</div>
		<div class="form-group row mb-0">
			<div class="col-md-8 offset-md-4">
				<input class="btn btn-primary ckSett" type="button" value="{{$butOkCpKeyForm}}">
				<a href="#!"  onclick="goTo('form=set-secret')" class="btn btn-link text-md-right back">
			        	{{$labelButtonBack}}
			    	</a>
		    </div>
		</div>
    @endslot
    
@endcomponent
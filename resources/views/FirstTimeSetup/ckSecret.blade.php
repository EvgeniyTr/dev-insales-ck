@component('FirstTimeSetup.form')
    @slot('title')
        {{$ckSecretTitle}}
    @endslot

    @slot('main')
        <main class="ck-secret">
    @endslot

    @slot('form')
		<div class="form-group row">
			<label for="email" class="col-sm-4 col-form-label text-md-right">
				<span id="fieldTitle">{{$titleFieldAppId}}</span>
			</label>
			<div class="col-md-6">
				<input id="keyFormPublicId" name="email" value="" required="required" autofocus="autofocus" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-md-4 col-form-label text-md-right">
				<span id="fieldTitle">{{$titleFieldApiSecret}}</span>
			</label>
			<div class="col-md-6">
				<input id="keyFormApiSecret" name="password" required="required" class="form-control">
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
		<div class="form-group row mb-0">
			<div class="col-md-8 offset-md-4">
				<input class="btn btn-primary ckSecret" type="button" value="{{$butOkCpKeyForm}}">
		    </div>
		</div>
    @endslot
    
@endcomponent
{{$main}}
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<div style="display:flex;justify-content: space-between;">
							<div class="title-form">
								<p class="title">{{$title}}</p>
							</div>						
							{{--<div class="button-back-to-insales text-md-right">
								<input class="button-back-to-insales col-md-12 btn" type="button" value="{{$buttonBackToInsales}}" onclick='window.open("https://{{$backOfficeUrl}}/admin2/invoices", "_blank");'>
							</div>--}}
                            <div class="button-back-to-insales text-md-right">
                                <a href="{{ route('custom.logout') }}" class="btn btn-outline-secondary" type="button">{{$buttonBackToInsales}}</a>
                            </div>
						</div>	
					</div>
					<div class="card-body">
						<form>
							{{$form}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
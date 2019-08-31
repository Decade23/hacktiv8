@if (Session::has('success'))
	<div class="card-alert card green lighten-5">
	    <div class="card-content green-text">
	      <p>Well Done : {!! Session::get('success') !!}</p>
	    </div>
	    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">×</span>
	    </button>
  	</div>
@endif

@if (Session::has('failed'))
	<div class="card-alert card red">
	    <div class="card-content white-text">
	      <p>Warning : {!! Session::get('failed') !!}</p>
	    </div>
	    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">×</span>
	    </button>
  	</div>
@endif

@if ($errors->all())
	<div class="card-alert card red">
	    <div class="card-content white-text">
	      <p>Warning : Tolong periksa kembali form inputan anda</p>
	    </div>
	    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">×</span>
	    </button>
  	</div>
@endif
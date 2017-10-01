@extends('layouts.app')

@section('page-title')
    > <a class="navbar-text" href="/educations/{{ $education->id }}">{{ $education->title }}</a> > <a class="navbar-text" href="/terms/{{ $term->id }}">{{ $term->title }}</a> > Nieuwe lesvorm
@endsection

@section('content')

    <form method="post" action="/lesson_types">

    	@include('layouts/errors')

	  	<div class="form-group row">
		    <label class="col-sm-2 col-form-label">Opleiding</label>
		    <div class="col-sm-10">
				<input type="text" readonly class="form-control-plaintext" value="{{ $education->title }}">
			</div>
	  	</div>
	  	<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Periode</label>
    		<div class="col-sm-10">
	    		<input type="text" readonly class="form-control-plaintext" value="{{ $term->title }}">
	    		<input type="hidden" name="term" value="{{ $term->id }}">
	    	</div>
  		</div>
  		<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Volgorde</label>
    		<div class="col-sm-10">
	    		<input type="text" class="form-control" name="order">
	    	</div>
  		</div>
  		<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Titel</label>
    		<div class="col-sm-10">
	    		<input type="text" class="form-control" name="title">
	    	</div>
  		</div>
  		<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Sub-titel</label>
    		<div class="col-sm-10">
	    		<input type="text" class="form-control" name="sub_title">
	    	</div>
  		</div>

  		{{ csrf_field() }}

  		<button type="submit" class="btn btn-success">Opslaan</button>
	</form>
    
@endsection
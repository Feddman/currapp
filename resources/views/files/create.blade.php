@extends('layouts.app')

@section('page-title')
    > <a class="navbar-text" href="/educations/{{ $education->id }}">{{ $education->title }}</a>
    > <a class="navbar-text" href="/cohorts/{{ $cohort->id }}">{{ $cohort->start_year }} - {{ $cohort->exam_year }}</a>
    > <a class="navbar-text" href="/terms/{{ $term->id }}">{{ $term->title }}</a>
    > <a class="navbar-text" href="/lessons/{{ $lesson->id }}">{{ $lesson_type->title }}: {{ $lesson->title }}</a>
    > Los bestand uploaden
@endsection

@section('buttons-right')
    <a class="btn btn-outline-secondary navbar-text" href="/lessons/{{ $lesson->id }}">
        <i class="fa fa-times" aria-hidden="true"></i> Annuleren
    </a>
@endsection

@section('content')
  
    <form method="POST" action="/files" enctype="multipart/form-data">

    	@include('layouts/errors')

	  	<div class="form-group row">
		    <label class="col-sm-2 col-form-label">Opleiding</label>
  		  <div class="col-sm-10">
  				<input type="text" readonly class="form-control-plaintext" value="{{ $education->title }}">
  			</div>
	  	</div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Cohort</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" value="{{ $cohort->start_year }} - {{ $cohort->exam_year }}">
        </div>
      </div>
	  	<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Periode</label>
    		<div class="col-sm-10">
	    		<input type="text" readonly class="form-control-plaintext" value="{{ $term->title }}">
	    	</div>
  		</div>
	  	<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Les</label>
    		<div class="col-sm-10">
	    		<input type="text" readonly class="form-control-plaintext" value="{{ $lesson_type->title }}: {{ $lesson->title }}">
	    		<input type="hidden" name="lesson" value="{{ $lesson->id }}">
	    	</div>
  		</div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bestand:</label>
        <div class="col-sm-10">
          <input type="file" class="form-control-file" name="file">
        </div>
      </div>

  		{{ csrf_field() }}

  		<button type="submit" class="btn btn-success">
        <i class="fa fa-floppy-o" aria-hidden="true"></i> Opslaan
      </button>

	</form>

@endsection
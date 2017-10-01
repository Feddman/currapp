@extends('layouts.app')

@section('page-title')
    > <a class="navbar-text" href="/educations/{{ $education->id }}">{{ $education->title }}</a>
    > <a class="navbar-text" href="/cohorts/{{ $cohort->id }}">{{ $cohort->start_year }} - {{ $cohort->exam_year }}</a>
    > <a class="navbar-text" href="/terms/{{ $term->id }}">{{ $term->title }}</a>
    > {{ $lesson->exists ? 'Les aanpassen' : 'Nieuwe les' }}
@endsection

@section('buttons-right')
    <a class="btn btn-outline-secondary navbar-text" href="/lessons/{{ $lesson->id }}">
        <i class="fa fa-times" aria-hidden="true"></i> Annuleren
    </a>
@endsection

@section('content')

    @if($lesson->exists)
      <form method="POST" action="/lessons/{{ $lesson->id }}">
      {{ method_field('PATCH') }}
    @else
      <form method="POST" action="/lessons">
    @endif

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
          <input type="hidden" name="cohort" value="{{ $cohort->id }}">
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
    		<label class="col-sm-2 col-form-label">Lesvorm</label>
    		<div class="col-sm-10">
    			<?php
    			if(!empty($lesson_type->sub_title)){
    				$lesson_type->title .= " (" . $lesson_type->sub_title . ")";
    			}
    			?>
	    		<input type="text" readonly class="form-control-plaintext" value="{{ $lesson_type->title }}">
	    		<input type="hidden" name="lesson_type" value="{{ $lesson_type->id }}">
	    	</div>
  		</div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Titel</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="title" value="{{ old('title', $lesson->title) }}">
        </div>
      </div>
	  	<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Start in week</label>
    		<div class="col-sm-10">
	    		<input type="text" class="form-control" name="week_start" value="{{ old('week_start', $lesson->week_start) }}">
	    	</div>
  		</div>
  		<div class="form-group row">
    		<label class="col-sm-2 col-form-label">Duurt (weken)</label>
    		<div class="col-sm-10">
	    		<input type="text" class="form-control" name="duration" value="{{ old('duration', $lesson->duration) }}">
	    	</div>
  		</div>

  		{{ csrf_field() }}

  		<button type="submit" class="btn btn-success">
        <i class="fa fa-floppy-o" aria-hidden="true"></i> Opslaan
      </button>
      

      @if($lesson->exists)
        <a class="btn btn-danger" href="/lessons/{{ $lesson->id }}/delete">
          <i class="fa fa-trash-o" aria-hidden="true"></i> Verwijderen
        </a>
      @endif
	</form>

@endsection
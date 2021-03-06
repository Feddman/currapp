@extends('layouts.app')

@section('page-title')
    > <a class="navbar-text" href="/educations/{{ $cohort->education->id }}">{{ $cohort->education->title }}</a>
    > <a class="navbar-text" href="/cohorts/{{ $cohort->id }}">{{ $cohort->start_year }} - {{ $cohort->exam_year }}</a>
    > {{ $term->exists ? 'Periode aanpassen' : 'Nieuwe periode' }}
@endsection

@section('buttons-right')
    <?php $href = $term->exists ? '/terms/' . $term->id : '/cohorts/' . $cohort->id; ?>
    <a class="btn btn-outline-secondary navbar-text" href="{{ $href }}">
        <i class="fa fa-times" aria-hidden="true"></i> Annuleren
    </a>
@endsection

@section('content')
  
  @if($term->exists)
    <form method="POST" action="/terms/{{ $term->id }}">
    {{ method_field('PATCH') }}
  @else
    <form method="POST" action="/terms">
  @endif

  @include('layouts/errors')

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Opleiding</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" value="{{ $cohort->education->title }}">
      <input type="hidden" name="education" value="{{ $cohort->education->id }}">
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
    <label class="col-sm-2 col-form-label">Periode-nummer</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="order" value="{{ old('order', $term->order) }}">
      <small class="form-text text-muted">Dit nummer loopt door over de jaren (bijv. periode 1 t/m 12).</small>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Sub-titel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $term->sub_title) }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Duur</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="duration" value="{{ old('duration', $term->duration) }}">
      <small class="form-text text-muted">Voor het overspannen van meerdere periodes (bijv. BPV).</small>
    </div>
  </div>

  {{ csrf_field() }}

  <button type="submit" class="btn btn-success">
    <i class="fa fa-floppy-o" aria-hidden="true"></i> Opslaan
  </button>
	

  @if($term->exists)
    <a class="btn btn-danger" href="/terms/{{ $term->id }}/delete">
      <i class="fa fa-trash-o" aria-hidden="true"></i> Verwijderen
    </a>
  @endif

  </form>
    
@endsection
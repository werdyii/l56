@extends('layouts.master')
@section('main')
<div class="row justify-content-center">
  <div class="col-md-12">

    <form class="card border-warning" action="{{ route('season.update', $season ) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('patch') }}
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Update a Season: {{ $season->name }} </h1>
      </div>
      <div class="card-body">
        @include('seasons.form')

      <div class="card-footer">
        <button type="submit" class="btn btn-secondary">
          Update
        </button>
        <a href="{{ url()->previous() }}"
        class="btn btn-outline-secondary"
        role="button"
        ><span class="fa fa-undo" aria-hidden="true"></span> Back</a>
      </div>
    </form>
  </div>
</div>
@endsection
@push('style')
  <link rel="stylesheet" href="{{ asset('css/datapicker/bootstrap-datepicker.min.css') }}">
@endpush
@push('scripts')
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/locales/bootstrap-datepicker.sk.min.js') }}"></script>
  <script src="{{ asset('js/season.js') }}"></script>
@endpush
@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-6">

    <form class="card border-warning" action="{{ route('farms.store') }}" method="post">
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Create a Farm</h1>
      </div>

      <div class="card-body">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Farm Name</label>
          <input type="text" class="form-control" name="name" placeholder="Your Farm's Name">
        </div>
        <div class="form-group">
          <label for="city">Farm City</label>
          <input type="text" class="form-control" name="city" placeholder="Farm Location City">
        </div>
        <div class="form-group">
          <label for="website">Farm Website</label>
          <input type="text" class="form-control" name="website" placeholder="Farm Website">
        </div>
        <button type="submit" class="btn btn-secondary">
          Create
        </button>
        <a href="{{ route('farms.index') }}"
        class="btn btn-outline-secondary"
        role="button"
        ><span class="fa fa-undo" aria-hidden="true"></span> Back farms</a>
      </div>
    </form>
  </div>
</div>
@endsection
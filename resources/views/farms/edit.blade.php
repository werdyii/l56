@extends('layouts.master')
@section('title', "Edit $farm->name" )
@section('main')
<div class="row justify-content-center">
  <form action="{{ url('farms', $farm) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('patch') }}

    <div class="col-md-12">
      <h1 class="h4 text-uppercase">Edit detail</h1>

      <div class="card flex-md-row mb-6 box-shadow h-md-250 ">
        <div class="card-body d-flex flex-column align-items-start">
          <h3 class="mb-0">
            {{ $farm->name }}
          </h3>
          <div class="card-text mb-0 col">
            <div class="form-group">
              <label for="name">Farm Name</label>
              <input type="text" class="form-control" name="name" value="{{ $farm->name }}">
            </div>
            <div class="form-group">
              <label for="city">Farm City</label>
              <input type="text" class="form-control" name="city" value="{{ $farm->city }}" >
            </div>
            <div class="form-group">
              <label for="website">Farm Website</label>
              <input type="text" class="form-control" name="website" value="{{ $farm->website }}">
            </div>
          </div>
        </div>
        <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/farm.png') }}" alt="Card image cap">
      </div>

      <div class="card flex-md-row mb-6 box-shadow h-md-250">
        <div class="card-body">
          <div class="card-text">
            <h3 class="h5 pb-2">Markets</h3>
            <div class="row form-group">
              @foreach( $markets as $market => $id )
              <div class="form-check col-md-6">
                <label for="{{ $market }}" class="form-chech-label">
                  <input id="{{ $market }}" type="checkbox" value="{{ $id }}" name="markets[]"
                  {{ $farm->markets()->allRelatedIds()->contains($id) ? "checked" : "" }}
                  >
                  {{ $market }}
                </label>
              </div>
              @endforeach
            </div>
          </div>
          <div class="card-text">
            <button type="submit" class="btn btn-primary">
              Update
            </button>

            <a href="{{ url()->previous() }}"
            class="btn btn-outline-primary"
            role="button"
            ><span class="fa fa-undo" aria-hidden="true"></span> Back</a>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
@endsection
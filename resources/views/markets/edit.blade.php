@extends('layouts.master')
@section('title', "Edit $market->name" )
@section('main')
<div class="row justify-content-center">
  <form action="{{ url('markets', $market) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('patch') }}

    <div class="col-md-12">
      <h1 class="h4 text-uppercase">Edit detail</h1>

      <div class="card flex-md-row mb-6 box-shadow h-md-250 ">
        <div class="card-body d-flex flex-column align-items-start">
          <h3 class="mb-0">
            {{ $market->name }}
          </h3>
          <div class="card-text mb-0 col">
            <div class="form-group">
              <label for="name">Market Name</label>
              <input type="text" class="form-control" name="name" value="{{ $market->name }}">
            </div>
            <div class="form-group">
              <label for="city">Market City</label>
              <input type="text" class="form-control" name="city" value="{{ $market->city }}" >
            </div>
            <div class="form-group">
              <label for="website">Market Website</label>
              <input type="text" class="form-control" name="website" value="{{ $market->website }}">
            </div>
          </div>
        </div>
        <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/market.png') }}" alt="Card image cap">
      </div>

      <div class="card flex-md-row mb-6 box-shadow h-md-250">
        <div class="card-body">
          <div class="card-text">
            <h3 class="h5 pb-2">Farms</h3>
            <div class="row form-group">
              @foreach( $farms as $farm => $id )
              <div class="form-check col-md-6">
                <label for="{{ $farm }}" class="form-chech-label">
                  <input id="{{ $farm }}" type="checkbox" value="{{ $id }}" name="farms[]"
                  {{ $market->farms()->allRelatedIds()->contains($id) ? "checked" : "" }}
                  >
                  {{ $farm }}
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
@extends('layouts.master')
@section('title', "$market->name" )
@section('main')
<div class="row justify-content-center">
  <div class="col-md-12">
    <h1 class="h4 text-uppercase">Show detail</h1>

    <div class="card flex-md-row mb-6 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          {{ $market->name }}
        </h3>
        <!-- div class="mb-1 text-muted">Nov 11</div -->

        <form class="card-text mb-0 col">
          <div class="form-group">
            <label for="name">Market Name</label>
            <input type="text" class="form-control" name="name" placeholder="{{ $market->name }}" readonly="true">
          </div>
          <div class="form-group">
            <label for="city">Market City</label>
            <input type="text" class="form-control" name="city" placeholder="{{ $market->city }}" readonly="true">
          </div>
          <div class="form-group">
            <label for="website">Market Website</label>
            <input type="text" class="form-control" name="website" placeholder="{{ $market->website }}" readonly="true">
          </div>
        </form>

        <div class="card-text">
            <a href="{{ route('markets.index') }}"
            class="btn btn-outline-primary"
            role="button"
            ><span class="fa fa-undo" aria-hidden="true"></span> Back</a>

            <a href="{{ route('markets.edit', $market) }}"
            class="btn btn-outline-secondary"
            role="button"
            ><span class="fa fa-pencil" aria-hidden="true"></span> Edit</a>
            <form action="{{ route('markets.destroy', $market) }}" method="post"
                class="d-inline-block">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button class="btn btn-outline-danger" type="submit"
                ><span class="fa fa-trash" aria-hidden="true"></span> Delete</button>
            </form>
        </div>
      </div>
      <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('img/market.png') }}" alt="Card image cap">
    </div>
  </div>
</div>
@endsection
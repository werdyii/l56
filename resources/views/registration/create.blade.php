@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-5">

    <form class="card border-warning" action="{{ route('register.store') }}" method="post">
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Registration new user</h1>
      </div>

      <div class="card-body">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
          @if ($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" required>
          @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="password_confirmation">Password Confirmation</label>
          <input type="password" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation" required>
          @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
              {{ $errors->first('password_confirmation') }}
            </div>
          @endif
        </div>

        <button type="submit" class="btn btn-success btn-block my-2">
          Create an account.
        </button>


      </div>
    </form>
    <div class="card border-warning my-3">
      <p class="p-3 text-center">
        or
        <a href="{{ route('login') }}"> Log In </a>
      </p>
    </div>
  </div>
</div>
@endsection
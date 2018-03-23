@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-4">

    <form class="card border-warning my-3" action="{{ route('login.store') }}" method="post">
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Login</h1>
      </div>

      <div class="card-body">
        {{ csrf_field() }}

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
          <label for="password">Password          <a href="#"> Forgot password </a></label>
          <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" required>
          @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>

        <button type="submit" class="btn btn-success btn-block">
          Login
        </button>

      </div>
    </form>
    <div class="card border-warning my-3">
      <p class="p-3 text-center">
        New to LARAVEL BloG
        <a href="{{ route('register') }}" > Create an account. </a>
      </p>
    </div>
  </div>
</div>
@endsection
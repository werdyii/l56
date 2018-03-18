@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-6">

    <form class="card border-warning" action="{{ route('login.store') }}" method="post">
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
          <label for="password">Password</label>
          <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" required>
          @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>

        <button type="submit" class="btn btn-secondary">
          Login
        </button>
        <a href="{{ route('register') }}"   class="btn btn-outline-secondary" role="button"> Registration </a>
        <a href="#"   class="btn btn-outline-secondary" role="button"> Forgot password </a>
        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary" role="button"
        ><span class="fa fa-undo" aria-hidden="true"></span> Back </a>
      </div>
    </form>
  </div>
</div>
@endsection
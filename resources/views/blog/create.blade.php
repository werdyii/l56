@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-12">

    <form class="card border-warning" action="{{ route('blog.store') }}" method="post">
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Create new blog post</h1>
      </div>

      <div class="card-body">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
          @if ($errors->has('title'))
            <div class="invalid-feedback">
              {{ $errors->first('title') }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="content">Content:</label>
          <textarea name="content" id="content"  rows="10" class="form-control @if ($errors->has('content')) is-invalid @endif" required>{{ old('content') }}</textarea>
          @if ($errors->has('content'))
            <div class="invalid-feedback">
              {{ $errors->first('content') }}
            </div>
          @endif
        </div>

        <button type="submit" class="btn btn-secondary">
          Save
        </button>
        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary" role="button"
        ><span class="fa fa-undo" aria-hidden="true"></span> Back </a>

      </div>
    </form>
  </div>
</div>
@endsection
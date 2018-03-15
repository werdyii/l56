@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-10">
    <h1 class="h4 text-uppercase">Link-Shortener</h1>

    <form class="card border-0" action="{{ route('links.store') }}" method="post">
    	{{ csrf_field() }}
      	<div class="card-body">

			<div class="form-group">
	          <label for="link">Input url</label>
	          <input type="text"
	          	class="form-control"
	          	name="link"
	          	value = "{{ old('link') }}"
	          	placeholder="Insert your URL here and press enter!">
	        </div>

	    </div>
	</form>
	<div class="card border-0">
		<div class="card-header bg-white">
			<ul class="nav nav-tabs card-header-tabs ">
			  <li class="nav-item">
			    <a class="nav-link active" href="#last" role="tab" data-toggle="tab">Last add</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#top" role="tab" data-toggle="tab">Top used</a>
			  </li>
			</ul>
		</div>
		<div class="card-body tab-content">
			<div class="tab-pane fade active show" id="last">
				<p>Last links ...</p>
			</div>
			<div class="tab-pane fade" id="top">
				<p>Top links ...</p>
			</div>
		</div>
	</div>
</div>
@endsection
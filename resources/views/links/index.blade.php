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
			<ul class="tab-pane fade active show" id="last">
				@forelse ($links_last as $link)
				    <li><a href="{{ route( 'links.hash', $link->hash ) }}">
				    	{{ env('APP_URL') . "/" . $link->hash }}
				    	<span class="badge badge-light">{{ $link->url }}</span>
					    </a>
	                    <small class="align-baseline">
	                        <form action="{{ route('links.destroy', $link) }}" method="post" class="d-inline-block">
	                            {{ csrf_field() }}
	                            {{ method_field('delete') }}
	                            <button type="submit" class="close position-relative " aria-label="Close">
								  <span aria-hidden="true" class="align-baseline">&times;</span>
								</button>
	                        </form>
	                    </small>
					</li>
				@empty
				    <p>No links</p>
				@endforelse
			</ul>
			<ul class="tab-pane fade" id="top">
				@forelse ($links_top as $link)
				    <li><a href="{{ route( 'links.hash', $link->hash ) }}">
				    	<span class="badge badge-secondary badge-pill">{{ $link->used }}</span>
				    	{{ env('APP_URL') . "/" . $link->hash }}
				    	<span class="badge badge-light">{{ $link->url }}</span>
				    </a></li>
				@empty
				    <p>No links</p>
				@endforelse
			</ul>
		</div>
	</div>
</div>
@endsection
@extends('layouts.blog')
@section('title', 'Blog - '.$post->title)
@section('main')
	<article id="post-{{ $post->id }}" class="post">
		<header class="post-header">
			<h2 class="pb-3 mb-4 font-italic border-bottom">
				{{ $post->title }}
			</h2>
			<time datetime="{{ $post->datetime }}" class="blog-post-meta">
				{{ $post->created_at }} / <a href="#"> {{ $post->user->name }} </a>
			</time>
			<!-- @ include('partials.tags') -->
		</header>
		<div class="post-content">
			<p>
				{!! $post->rich_text !!}
			</p>
		</div>
		<footer class="post-footer">
			Tag: ....
		</footer>
	</article>

@endsection
@push('aside')
    @include('blog.aside')
@endpush

@if ($paginator->hasPages())
    <nav class="row justify-content-center blog-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-secondary disabled" role="button" aria-disabled="true"
                href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>

        @else
            <a class="btn btn-outline-primary" role="button"
                href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary" role="button"
                href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <a class="btn btn-outline-secondary disabled" role="button" aria-disabled="true"
                href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @endif
    </nav>
@endif

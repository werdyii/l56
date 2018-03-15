@extends('layouts.master')
@section('title', "All Markets" )
@section('main')
    <h1 class="ml-1">Markets <span class="badge badge-secondary">count: {{ $markets->total() }}</span>
        <a href="{{ route('markets.create') }}"
        class="btn d-inline-block"
        data-toggle="tooltip" data-placement="bottom" title="Add new item"
        ><span class="fa fa-plus-circle" aria-hidden="true"></span></a>
    </h1>
    <div class="row justify-content-center">
        @foreach ($markets as $market)
            <div class="col-md-4 pb-3">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('img/market.png') }}" height="auto" width="100%" />
                    <div class="card-body">
                        <p class="card-text">
                            <a href="{{ route('markets.show', $market) }}">
                                {{ $market->name }}
                            </a>
                        </p>

                        <div class="d-flex">
                            <div class="mr-auto p-2">Farms <span class="badge badge-secondary">{{ $market->farms()->count() }}</span></div>
                            <div class="p-2">
                                <a href="{{ route('markets.edit', $market) }}"
                                class="btn btn-sm btn-link"
                                data-toggle="tooltip" data-placement="bottom" title="Edit"
                                ><span class="fa fa-pencil" aria-hidden="true"></span></a>
                            </div>
                            <form action="{{ route('markets.destroy', $market) }}" method="post" class="p-2 denger">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-sm btn-link" type="submit"
                                data-toggle="tooltip" data-placement="bottom" title="Delete"
                                ><span class="fa fa-trash" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $markets->links('pagination') }}
    </div>
@endsection
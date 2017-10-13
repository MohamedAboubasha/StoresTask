@extends('layouts.app')

@section('content')

    <h1>Stores</h1>

    @if(count($stores) > 0)
        @foreach($stores as $store)
            <div class="well">
                <h3><a href="/viewStores/{{$store->id}}">{{$store->name}}</a></h3>
            </div>
        @endforeach
        {{$stores->links()}}
    @else
        <p>No Stores available</p>
    @endif

@endsection
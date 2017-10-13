@extends('layouts.app')

@section('content')
    {{--  <h1>{{$store->name}}</h1>
    <br>
    <div class="well">
        <h3>{{$store->address}}</h3>
    </div>
    
    <div class="well">
        <h3>{{$store->logoPath}}</h3>
    </div>  --}}
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/logos/{{$store->logoPath}}">
            </div>
            <div class="col-md-8 col-sm-8">
                <h3>{{$store->name}}</h3>
                <h4>{{$store->address}}</h4>
            </div>
        </div>
    </div>
    <a href="/updateStore/{{$store->id}}" class="btn btn-default">Update</a>
@endsection

@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <form action="/updateStore/{{$store->id}}" method="POST" enctype="multipart/form-data">
        <div style="font-size:30px">Update Store</div>
        <br></br>
        <div class="form-group">
            <label for="name">Store Name</label>
            <input type="text" name="name" class="form-control" value="{{$store->name}}">
        </div>
        <div class="form-group">
            <label for="address">Store Address</label>
            <input type="text" name="address" class="form-control" value="{{$store->address}}">
        </div>
        <div class="form-group">
            <label for="logoPath">Store Logo</label>
            <input type="file" name="logoPath">
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
    </form>
</div>
@endsection
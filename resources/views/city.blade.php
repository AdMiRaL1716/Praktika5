@extends('layouts.app')
@section('title', $city->name)
@section('content')
    <div class="container">
        <div class="cookiesContent">
            <h2>{{$city->name}}</h2>
            @foreach($countries as $country)
                @if($country->id == $city->id_country)
                    <h3>{{$country->name}}</h3>
                @endif
            @endforeach
            <p>{{$city->population}}</p>
            @foreach($countries as $country)
                @if($country->id == $city->id_country)
                    <a href="../cities/{{$country->id}}" class="btn btn-light">Back</a>
                @endif
            @endforeach
            @if(Auth::user())
                <a href="../edit-city/{{$city->id}}" class="btn btn-light mt-3">Edit</a>
                <a href="../delete-city/{{$city->id}}" class="btn btn-light mt-3">Delete</a>
            @endif
        </div>
    </div>
@endsection

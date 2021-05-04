@extends('layouts.app')
@section('title', $country->name)
@section('content')
    <div class="container">
        <div class="cookiesContent">
            <h2>{{$country->name}}</h2>
            @foreach($continents as $continent)
                @if($continent->id == $country->id_continent)
                    <h3>{{$continent->name}}</h3>
                @endif
            @endforeach
            <p>Capital: {{$country->capital}}</p>
            <p>{{$country->description}}</p>
            <p>{{$country->population}}</p>
            @foreach($continents as $continent)
                @if($continent->id == $country->id_continent)
                    <a href="../countries/{{$continent->id}}" class="btn btn-light">Back</a>
                @endif
            @endforeach
            <a href="../cities/{{$country->id}}" class="btn btn-light mt-3">Cities</a>
            @if(Auth::user())
                <a href="../edit-country/{{$country->id}}" class="btn btn-light mt-3">Edit</a>
                <a href="../delete-country/{{$country->id}}" class="btn btn-light mt-3">Delete</a>
            @endif
        </div>
    </div>
@endsection

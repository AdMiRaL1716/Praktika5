@extends('layouts.app')
@section('title', 'Countries')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($countries as $country)
                <div class="col-md-4 col-lg-4 col-xl-4 mb-30 mt-3 continent">
                    <div class="card h-100 bg-white">
                        <div class="plr-25 ptb-15">
                            <h4 class="mtb-10"><a href="../country/{{$country->id}}"><b>{{$country->name}}</b></a></h4>
                            <a href="../cities/{{$country->id}}" class="btn btn-light">cities</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

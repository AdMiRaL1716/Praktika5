@extends('layouts.app')
@section('title', 'Cities')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($cities as $city)
                <div class="col-md-4 col-lg-4 col-xl-4 mb-30 continent">
                    <div class="card h-100 bg-white">
                        <div class="plr-25 ptb-15">
                            <h4 class="mtb-10"><a href="../city/{{$city->id}}"><b>{{$city->name}}</b></a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

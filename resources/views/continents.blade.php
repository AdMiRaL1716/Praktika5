@extends('layouts.app')
@section('title', 'Continents')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span class="alert-text"><strong>Success!</strong> {{ session('status') }}</span>
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span class="alert-text"><strong>Failed!</strong> {{ session('failed') }}</span>
            </div>
        @endif
        <div class="row">
            @foreach($continents as $continent)
                <div class="col-md-4 col-lg-4 col-xl-4 mb-30 continent">
                    <div class="card h-100 bg-white">
                        <div class="plr-25 ptb-15">
                            <h4 class="mtb-10"><a href="countries/{{$continent->id}}"><b>{{$continent->name}}</b></a></h4>
                            @if(Auth::user())
                                <a href="edit-continent/{{$continent->id}}">Edit</a>
                                <a href="delete-continent/{{$continent->id}}">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

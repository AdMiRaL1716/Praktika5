@extends('layouts.app')
@section('title', 'Edit city')
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
        <form method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">City name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$city->name}}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Select country</label>
                    <select name="id_country" class="form-control @error('id_country') is-invalid @enderror" required>
                        @foreach($countries as $country)
                            @if($country->id == $city->id_country)
                                <option value="{{$country->id}}">{{$country->name}} - Choice</option>
                            @endif
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('id_country')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row md-3">
                <div class="col-md-12">
                    <label class="form-label">Population</label>
                    <input type="number" name="population" class="form-control @error('population') is-invalid @enderror" value="{{$city->population}}" required autofocus>
                    @error('population')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

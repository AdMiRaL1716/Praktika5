@extends('layouts.app')
@section('title', 'Edit country')
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
                    <label class="form-label">Country name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$country->name}}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Select continent</label>
                    <select name="id_continent" class="form-control @error('id_continent') is-invalid @enderror" required>
                        @foreach($continents as $continent)
                            @if($continent->id == $country->id_continent)
                                <option value="{{$continent->id}}">{{$continent->name}} - Choice</option>
                            @endif
                            <option value="{{$continent->id}}">{{$continent->name}}</option>
                        @endforeach
                    </select>
                    @error('id_continent')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Capital</label>
                    <input type="text" name="capital" class="form-control @error('capital') is-invalid @enderror" value="{{$country->capital}}" required>
                    @error('capital')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Population</label>
                    <input type="number" name="population" class="form-control @error('population') is-invalid @enderror" value="{{$country->population}}" required>
                    @error('population')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{$country->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

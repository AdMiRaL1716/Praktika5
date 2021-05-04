@extends('layouts.app')
@section('title', 'Add continent')
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
        <form method="POST" action="{{ route('new-continent') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label">Continent name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required autofocus>
                    @error('name')
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

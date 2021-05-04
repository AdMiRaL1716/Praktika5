@extends('layouts.app')
@section('title', 'Delete country')
@section('content')
    <div class="container">
        <form method="POST" class="text-center">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <p>Delete country ?</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

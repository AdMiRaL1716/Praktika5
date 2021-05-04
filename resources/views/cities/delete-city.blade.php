@extends('layouts.app')
@section('title', 'Delete city')
@section('content')
    <div class="container">
        <form method="POST" class="text-center">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <p>Delete city ?</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

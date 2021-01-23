@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>Edit {{ $cd->title }}</h1>
        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Form Post  --}}
        <form action="{{ route('cds.update', $cd->id)}}" method="POST">
            @csrf
            @method("PATCH")

            <div class="form-group">
                <label for="title"> Cd Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title', $cd->title) }}">
            </div>
            <div class="form-group">
                <label for="description"> Cd Description</label>
                <textarea class="form-control" name="description"> {{ old('description', $cd->description) }}</textarea>
            </div>
             <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
@endsection
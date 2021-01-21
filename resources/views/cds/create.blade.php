@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>Create a new Cd</h1>
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
        <form action="{{ route('cds.store')}}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title"> Cd Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description"> Cd Description</label>
                <textarea class="form-control" name="description"> {{ old('description') }}</textarea>
            </div>
             <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Create">
            </div>
        </form>
@endsection
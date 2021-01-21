@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>CD Detail</h1>

        <h2> {{$cd->title}}</h2>
        <h6>ID {{$cd->id}}</h6>
        <hr>
        <p> {{$cd->description}}</p>
        <hr>

        <div class="mb-2">Created at: {{ $cd->created_at}}</div>
        <div class="mb-2">Updated at: {{ $cd->updated_at}}</div>
    </div>
@endsection
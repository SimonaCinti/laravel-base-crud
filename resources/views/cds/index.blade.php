@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>Discography</h1>

        @if (session('deleted'))
        <div class="alert alert-danger">
            {{session('deleted')}} deleted!
        </div>
            
        @endif

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cds as $cd)
                    <tr>
                        <td>{{ $cd->id}}</td>
                        <td>{{ $cd->title}}</td>
                        <td class="text-center" width="100">
                            <a href="{{route('cds.show', $cd->id )}}" class="btn btn-success">
                                Show
                            </a>
                        </td>
                        <td class="text-center" width="100">
                            <a href="{{ route('cds.edit', $cd->id)}}" class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                        <td class="text-center" width="100">
                            <form action="{{ route('cds.destroy', $cd->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
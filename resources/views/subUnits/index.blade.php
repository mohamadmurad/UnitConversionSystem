@extends('layout.app')


@section('content')

    <h1>SubUnits for {{$unit->name}}</h1>
    <a href="{{route('subunits.create',$unit)}}" class="btn btn-primary">Add SubUnit</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>value</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unit->subUnits as $sub)
            <tr>
                <td>{{$sub->name}}</td>
                <td>{{$sub->value}}</td>

                <td>

                    <a href="{{route('subunits.edit',[$unit,$sub])}}" class="btn-link">Edit</a>
                    <form action="{{route('subunits.destroy',[$unit,$sub])}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <a href="#" class="btn-link" onclick="event.preventDefault(); confirm('Are you sure?') ?
                                                this.closest('form').submit() : null">Delete</a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

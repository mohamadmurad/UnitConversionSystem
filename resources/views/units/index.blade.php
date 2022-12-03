@extends('layout.app')


@section('content')

    <h1>Units</h1>
    <a href="{{route('units.create')}}" class="btn btn-primary">Add Unit</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>

            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr>
                <td>{{$unit->name}}</td>

                <td>
                    <a href="{{route('subunits.index',$unit)}}" class="btn-link">SubUnits</a>
                    <a href="{{route('units.edit',$unit)}}" class="btn-link">Edit</a>
                    <form action="{{route('units.destroy',$unit)}}" method="post" class="d-inline">
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
    {{$units->links()}}
@endsection

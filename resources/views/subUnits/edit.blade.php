@extends('layout.app')


@section('content')

    <h1>Update SubUnits</h1>
    <form action="{{route('subunits.update',[$unit,$subunit])}}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Unit Name</label>
            <input type="text" name="name" value="{{old('name',$subunit->name)}}" class="form-control" id="name" placeholder="Liter"
                   required>
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="value" class="form-label">SubUnit Value for 1 {{$unit->name}}</label>
            <input type="number" name="value" value="{{old('value',$subunit->value)}}" class="form-control" id="value" placeholder="1000"
                   required>
            @error('value') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

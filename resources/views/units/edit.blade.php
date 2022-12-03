@extends('layout.app')


@section('content')

    <h1>Update Units</h1>
    <form action="{{route('units.update',$unit)}}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Unit Name</label>
            <input type="text" name="name" value="{{old('name',$unit->name)}}" class="form-control" id="name" placeholder="Liter"
                   required>
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

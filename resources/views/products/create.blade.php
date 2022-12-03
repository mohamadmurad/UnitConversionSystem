@extends('layout.app')


@section('content')

    <h1>Add Product</h1>
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Unit Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Cola"
                   required>
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

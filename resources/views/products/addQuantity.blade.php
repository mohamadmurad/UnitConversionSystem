@extends('layout.app')


@section('content')

    <h1>Add Quantity for Product {{$product->name}}</h1>
    <form action="{{route('products.addQuantity.store',$product)}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="unit_id" class="form-label">Unit/SubUnit</label>
            <select name="unit_id" class="form-control" id="unit_id" required>
                @foreach($units as $unit)

                    <optgroup label="{{$unit->name}}">
                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @foreach($unit->subUnits as $sub)
                            <option value="{{$sub->id}}">{{$sub->name}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

            @error('unit_id') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>

            <input type="number" class="form-control" id="quantity" name="quantity" required>
            @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

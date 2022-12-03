@extends('layout.app')


@section('content')

    <h1>Products</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>
                    @foreach($product->quantity as $unit)
                        <span>{{$unit['total']}} {{$unit['name']}}</span><br>
                    @endforeach
                </td>

                <td>
                    <a href="{{route('products.addQuantity',$product)}}" class="btn-link">add Quantity</a>
                    <a href="{{route('products.edit',$product)}}" class="btn-link">Edit</a>
                    <form action="{{route('products.destroy',$product)}}" method="post" class="d-inline">
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
    {{$products->links()}}
@endsection

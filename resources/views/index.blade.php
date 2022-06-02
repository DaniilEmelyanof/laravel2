@extends('layout')
@section('content')

    

    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                 <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->description }}" name="description">
                        <input type="hidden" value="{{ $product->price }}"  name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button> 
                    </form>
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                     <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                 </div>
                
            </div>
            @endforeach
        </div>
    </div>


@endsection

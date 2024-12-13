@extends('layouts.app')

@section('content')

<style>

@media only screen and (max-width: 600px) {
    body {
        font-size: 12px;
    }
}
</style>

<div class="container_fluid">

    @if (session('suces'))
        <div class="alert alert-success">
            {{ session('suces') }}
        </div>
    @endif

    <form action="" class="container" style="margin-bottom: 20px">
            <div class="d-md-flex d-sm-block justify-content-between align-items-center mb-3">
                <div class="d-flex">
                    <select name="category" class="p-1 btn btn-secondary">
                        <option value="">All Categories</option>
                        @foreach($cate as $cate)
                            <option value="{{$cate['id']}}">{{ $cate['name']}}</option>
                        @endforeach
                    </select>
                    <button class="p-1 btn btn-outline-secondary" style="border: 1px solid; border-radius: 10px; margin-left: 10px" type="submit">Filter</button>
                </div>
 
            <div class="d-md-flex my-3">
                <input type="search" name="search" style="" class="me-2 px-2 form-search" placeholder="Search by Names">
                <button  class="p-1 btn btn-secondary" for="search" type="submit">search</button>
            </div>
        </div>

    </form>
    
    
    <table class="table container table-hover table-striped align-middle text-center">
        <tr>
            <th>Product Type</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Detail</th>
            <th></th>
            
        </tr>

        @foreach ($products as $product)
        <tr >
            <td>{{ $product->category->name}}</td>
            <td>{{ $product->product_name}}</td>
            <td>${{ $product->price}}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ url("products/spec/$product->id") }}" class="text-decoration-none">View Detail</a>
            </td>

            <td>
                @if($product->stock > 0)
                    <a href="{{ url("products/check/$product->id")}}" class="btn btn-outline-secondary">Check</a>
                 @else
                    <button disabled>Out of Stock</button>
                @endif
            </td>
        </tr>
      @endforeach

    </table>
</div>
@endsection

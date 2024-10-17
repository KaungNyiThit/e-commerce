@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <select name="category_id" class="form-select mb-2">
                <option value="1">Phone</option>
                <option value="2">Laptop</option>
            </select>
            
            <label for="product_name" class="form-label">Product Name:</label>
            <input type="text" class="form-control" name="product_name">

            <label for="description" class="form-label">Descrption:</label>
            <textarea class="form-control" name="description"></textarea>

            <label for="photo" class="form-label">Photo:</label>
            <input type="file" class="form-control" name="photo">

            <label for="price" class="form-label">Price:</label>
            <input type="number" class="form-control mb-2" name="price">

            <button class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection

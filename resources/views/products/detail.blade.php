
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
        
        <form method="post"  enctype="multipart/form-data">
            @csrf
            <label for="modal" class="form-label">Modal:</label>
            <input type="text" class="form-control" name="modal" >

            {{-- @error('modal')
                <p style="color: red">{{ $message }}</p>
            @enderror --}}

            <label for="display" class="form-label">Display:</label>
            <input type="text" class="form-control" name="display" >



            <label for="processor" class="form-label">Processor:</label>
            <input type="text" class="form-control" name="processor">

            <label for="storage" class="form-label">Storage:</label>
            <input type="text" class="form-control mb-2" name="storage">

            <label for="camera" class="form-label">Camera:</label>
            <input type="text" class="form-control mb-2" name="camera">

         

            @if (isset($data) && $data->category_id == 2)
            <label for="graphic" class="form-label">Graphic:</label>
            <input type="text" class="form-control mb-2" name="graphic">
            @endif


            <label for="battery" class="form-label">Battery:</label>
            <input type="text" class="form-control mb-2" name="battery">

            <label for="os" class="form-label">OS:</label>
            <input type="text" class="form-control mb-2" name="os">

            <button class="btn btn-primary" type="submit">Add Product</button>
        </form>
    </div>
@endsection
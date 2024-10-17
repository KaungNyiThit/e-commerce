@extends('layouts.app')

@section('content')
@php
$cartQuantity = isset(session('cart')[$product->id]) ? session('cart')[$product->id]['quantity'] : 0;

@endphp

    <div class="container">
        @if (session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif


        <form  method="post" action="{{ url("cart/add/$product->id")}}">
            @csrf

            <div class="col-12 text-center">
            <img src="/storage/{{ $product->photo }}" name="photo" alt="" style="width: 200px;" class="py-3" >
            </div>
            
            <select name="category_id" class="form-select mb-2">
                <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
            </select>

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label for="product_name" class="form-label">Product Name:</label>
            <input type="text" disabled class="form-control" name="product_name" value="{{ $product->product_name }}">

            <label for="price" class="form-label">Price:</label>
            <input type="text" disabled class="form-control" name="price" value="{{ $product->price }}">


            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" min="1" name="quantity" id="quantity"  class="form-control">

            <p id="stockWarning" style="color:red; display:none;">Not enough stock available.</p>


            <div class="my-4">
                <a href="#" id="buyBtn" class="btn btn-outline-secondary me-2">Buy Now</a>

                <button class="btn btn-outline-secondary" id="CartBtn" type="submit">Add To  Cart</button>
            </div>
        </form>
    </div>
    <script>

        let stockValue = {{ $product->stock }};

        let stockWarning = document.getElementById('stockWarning');
        let addToCart = document.getElementById('CartBtn');
        let qty = document.getElementById('quantity');
        let cartQuantity = {{ $cartQuantity }};
        let buyBtn = document.getElementById('buyBtn');

        let selectedValue = parseInt(this.value);


    

        qty.addEventListener('input', function(){
           let selectedValue = parseInt(this.value);

           let totalQuantity = cartQuantity + selectedValue

           if(selectedValue > stockValue || selectedValue + cartQuantity > stockValue){
                stockWarning.style.display = 'block';
                buyBtn.style.pointerEvents = "none"
                buyBtn.style.opacity = 0.7
                // buyBtn.style.color = "gray"
                addToCart.disabled = true;
                if( cartQuantity >= stockValue){
                qty.disabled = true;
                qty.value = 0;
                }
           }else {
                stockWarning.style.display = "none";
                addToCart.disabled = false; 
                buyBtn.style.pointerEvents = "auto"
                buyBtn.style.opacity = 1

                buyBtn.disabled = false; 
           } 
        })

        buyBtn.addEventListener('click', function() {
            let qaty = document.getElementById('quantity').value;
            let url = "{{ url('products/buy/' . $product->id) }}" + "?quantity=" + qaty;
            window.location.href = url;
        } )
   </script>
@endsection


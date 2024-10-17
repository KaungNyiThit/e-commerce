@extends('layouts.app');

@section('content')

@php

    $total = 0;
    foreach((array) session('cart') as $id => $details){
    $total = $total + $details['price'] * $details['quantity'];
    }
@endphp


    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <table class="table  table-striped text-center">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                
            </tr>
            @foreach ((array) session('cart') as $id => $details)
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-3 col-5 hidden-xs">
                            <img src="/storage/{{$details['photo']}}" style="width: 100px;" height="100">
                        </div>
    
                        <div class="col-5 col-6">
                            {{$details['product_name']}}
                        </div>
                    </div>
                </td>

                    <td>{{$details['price']}}</td>
                    <td>{{$details['quantity']}}</td>
                    <td>{{$details['price'] * $details['quantity']}}</td>
            </tr>
  
            @endforeach
            <tr>
                <td colspan="5" class="pe-5" style="text-align: right;"><h3><strong>total: {{ $total }}</strong></h3></td>
            </tr>
        </table>
        {{-- continue browsing or buy all --}}
        <div style="text-align: right;">
            <a class="btn btn-outline-success me-3" href="{{ url("cart/checkout/") }}">Buy All</a>

            
            <a class="btn btn-danger" href="/products">continue browsing</a>
        </div>
    </div>
@endsection

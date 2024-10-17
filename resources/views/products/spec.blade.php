@extends('layouts.app')

@section('content')


    <div class="container">
    <ul class="navbar-nav ms-auto">
        <li class="navbar-nav ms-auto">
            <a href="{{ url("spec/add/$phone->id")}}" class="nav-link text-success">Product Spec+</a>
        </li>
    </ul>
        <div class="row">

            <div class="col-12 d-flex justify-content-center">
                <img src="/storage/{{ $phone->photo }}" alt="..." style="width: 280px;" class="py-3 ">
            </div>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Model
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->modal ?? "...."}}
            
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Display
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->display ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Processor
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->processor ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Storage
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->storage ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Camera
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->camera ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Battery
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->battery ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                OS
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->os ?? '....'}}
            </div>
            <hr>
            {{--  --}}
    

            @if ($phone->category->name === "Laptop")
            <div class="col-5 mb-3" style="font-size: 2rem">
                Graphic
            </div>
        
            <div class="col-4 mb-3" style="font-size: 2rem">
                {{$phone->spec->graphic ?? '....'}}
            </div>
            <hr>
            @endif
     
            {{--  --}}

            <hr>
            <div class="col-5 mb-3" style="font-size: 2rem">
                Price
            </div>
            <div class="col-4 mb-3" style="font-size: 2rem">
                ${{$phone->price ?? ' ....'}}
            </div>
            <hr>   



        </div>
       
    </div>
@endsection

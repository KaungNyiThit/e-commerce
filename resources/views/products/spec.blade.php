@extends('layouts.app')

@section('content');

<style>

    .mb-3{
        font-size: 1rem
    }

    @media (max-width: 600px) {
        .mb-3 {
            font-size: 0.8rem;
        }
    }
    </style>
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

            <div class="col-12 my-3">
                <p>Description : {{$phone->description}}</p>
            </div>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3" >
                Model :
            </div>
            <div class="col-5 mb-3">
                {{$phone->spec->modal ?? "...."}}
            
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                Display :
            </div>
            <div class="col-4 mb-3" style=" word-wrap: break-word;">
                {{$phone->spec->display ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                Processor :
            </div>
            <div class="col-4 mb-3">
                {{$phone->spec->processor ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                Storage :
            </div>
            <div class="col-4 mb-3">
                {{$phone->spec->storage ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                Camera :
            </div>
            <div class="col-4 mb-3">
                {{$phone->spec->camera ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                Battery :
            </div>
            <div class="col-4 mb-3">
                {{$phone->spec->battery ?? '....'}}
            </div>
            <hr>
            {{--  --}}
            <hr>
            <div class="col-6 mb-3">
                OS :
            </div>
            <div class="col-4 mb-3">
                {{$phone->spec->os ?? '....'}}
            </div>
            <hr>
            {{--  --}}
    

            @if ($phone->category->name === "Laptop")
            <div class="col-6 mb-3">
                Graphic :
            </div>
        
            <div class="col-4 mb-3">
                {{$phone->spec->graphic ?? '....'}}
            </div>
            <hr>
            @endif
     
            {{--  --}}

            <hr>
            <div class="col-6 mb-3">
                Price :
            </div>
            <div class="col-4 mb-3">
                ${{$phone->price ?? ' ....'}}
            </div>
            <hr>   



        </div>
       
    </div>
@endsection

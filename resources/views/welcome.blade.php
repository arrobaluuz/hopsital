@extends('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
])
@section('content')
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header py-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 pt-5">
                            <h1 class="@if(Auth::guest()) text-white @endif">ANSEZ</h1>
                            <p class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                                Los mejores médicos del mundo son: el doctor dieta, el doctor reposo y el doctor alegría. (Jonathan Swift)  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card" style="width: 100%; background-color: #ffffff54 !important;"" >
                       
                        <div class="card-body">
                            <h2 class="card-title text-center"> CONTACTA A NUESTROS DOCTORES</h2>
                        </div>
                    </div>
                </div>
            @foreach($doctores as $item)
                <div class="carousel-item" >
                    <div class="card" style="width: 100%; background-color: #ffffff54 !important;" >
                        <div class="card-body">

                            <h3 class="card-title text-center">{{$item->nombres}} {{$item->apellidos}}</h3>
                            <h4 class="text-center"> {{$item->name_esp}}</h4>
                            <h5 class="text-center">{{$item->correo}}</h5>

                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush

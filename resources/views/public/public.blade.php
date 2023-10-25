@extends('layouts.home_layouts')

@section('homeContent')

<div class="container text-center mt-4">
    <div class="row align-items-start">

        @foreach ($CV as $dataCV)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$dataCV->Nama}}</h5>
                    <p class="card-text">{{$dataCV->Latar_belakang}}</p>
                    <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



@endsection
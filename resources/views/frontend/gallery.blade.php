@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | Gallery')
@section('image', asset('assets/images/logo.png'))
@section('content')	

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">Gallery</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}"
                        class="text-white fw-semibold text-decoration-none"><i class="fa fa-home me-1"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->

<section class="gallery">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{asset('assets/images/gallery1.png')}}" alt="" height="60">
                    <div class="section-heading">
                        <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">GALLERY</span></h6>
                        <h2 class="section-title">Our Gallery</h2>		
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($albums as $album) 
            <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                <div class="gallery-card px-1">
                    <div class="gallery-thumbnail rounded-5 mb-3">	
                        <a href="{{url('gallery', ['album_slug' => $album->album_slug])}}">
                            <img src="{{ asset('uploads/gallery/'.$album->image) }}" alt="" class="w-100 rounded-5">
                        </a>
                    </div>
                    <h5 class="text-center"><a href="{{url('gallery', ['album_slug' => $album->album_slug])}}" class="text-decoration-none">{{$album->title}}</a></h5>
                </div>
            </div>
            @endforeach
            <div class="pagination">
                {{$albums->links()}}
              </div>
        </div>
    </div>
</section>

@endsection
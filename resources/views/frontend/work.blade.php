@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | Initiatives')
@section('image', asset('assets/images/logo.png'))
@section('content')

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">Works</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}"
                        class="text-white fw-semibold text-decoration-none"><i class="fa fa-home me-1"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Works</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->


<!-- Works Section Start -->

<section class="works">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-4 col-md-4">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{asset('assets/images/bird.png')}}" alt="" height="80%" width="80">
                    <div class="section-heading flex-grow-1">
                        <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">INITIATIVES</span></h6>
                        <h2 class="section-title mb-4">Our Initiatives</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 ps-md-3">
                <p class="ms-md-5">Join us in making a lasting impact through
                    community-driven initiatives and sustainable solutions. Together, we can create change.Through
                    collaboration and advocacy, we're dedicated to fostering a world where everyone thrives, leaving
                    no one behind.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($works as $work)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="work-card rounded p-2 pb-3">
                    <div class="work-card-img rounded mb-3">
                        <img src="{{ asset('uploads/initiatives/'.$work->image) }}" alt="" class="w-100 rounded">
                    </div>
                    <div class="work-card-des px-4 py-2">
                        <h5 class="work-card-title"><a href="{{url('initiatives', ['work_slug' => $work->work_slug])}}" class="text-decoration-none">{{Str::limit($work->title, 30)}}</a></h5>
                        <p class="work-card-description mb-3">{{Str::limit($work->description,50)}}</p>
                        <a href="{{url('initiatives', ['work_slug' => $work->work_slug])}}" class="btn-custom text-decoration-none">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>
<!-- Work Section End -->
@endsection
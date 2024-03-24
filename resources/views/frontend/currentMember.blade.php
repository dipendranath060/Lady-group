@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | Current Members')
@section('image', asset('assets/images/logo.png'))
@section('content')	

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">Current Members</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}"
                        class="text-white fw-semibold text-decoration-none"><i class="fa fa-home me-1"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Current Members</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->


<!-- Team Section start -->

<section class="teams">
    <div class="container">
        <div class="row mb-5 ms-0 ms-md-5">
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-2">
                    <img src="{{asset('assets/images/team.png')}}" alt="" height="80">
                    <div class="section-heading flex-grow-1">
                        <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">MEMBERS</span></h6>
                        <h2 class="section-title">Executive National Board</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($currentMembers as $member)
            @if ($loop->index < 8)
            <div class="col-lg-4 mb-4 col-md-6 col-sm-6">
                <div class="team-card mb-3">
                    <div class="team-img mx-auto">
                        <img src="{{ asset('uploads/current-Members/'.$member->image) }}" class="w-100 p-2" alt="">
                    </div>
                </div>
                <div class="team-details">
                    <h4 class="text-center fs-5">{{$member->name}}</h4>
                    <h6 class="designation text-center">{{$member->designation}}</h6>
                </div>
            </div> 
        @endif
        @endforeach
        </div>
    </div>
</section>

<!-- Team Section end -->

@endsection
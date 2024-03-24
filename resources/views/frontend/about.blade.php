@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | About')
@section('image', asset('assets/images/logo.png'))
@section('content')

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">About Us</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('homes')}}" class="text-white fw-semibold text-decoration-none">
                        <i class="fa fa-home me-1"></i>
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->



<!-- About Section Start -->

<section class="about mb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pb-5 ps-lg-5">
                <div class="d-flex">
                    <img src="{{url('assets/images/about-flower.png')}}" alt="" height="100" width="100">
                    <div class="section-heading">
                        <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">ABOUT</span></h6>
                        <h2 class="section-title mb-4">We are the best Interior, Exterior & Architecture Firm</h2>
                    </div>
                </div>
                <div class="section-body ms-3">
                    <p>
                        At Lady Circle Nepal, we champion empowerment, equality, and community progress. Rooted in a passion for social change, we strive to uplift women and transform communities across Nepal. Through collaborative efforts and a commitment to advocacy, education, and holistic development, our association aims to break barriers and create a society where every woman thrives.
                    </p>
                    <p>
                        Driven by the belief in collective strength, we foster a platform that nurtures skills, knowledge, and opportunities for women and girls. Our initiatives encompass education drives, healthcare programs, and advocacy for gender equality, aiming to create a sustainable impact at both grassroots and societal levels.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-12 p-5 about-img position-relative">
            </div>
        </div>
    </div>
</section>

<!-- About Section End -->

<!-- President Message Start -->

<section class="message">
    <div class="flower-left">
        <img src="{{asset('assets/images/flower2.png')}}" class="w-100" alt="">
    </div>
    <div class="flower-right">
        <img src="{{asset('assets/images/flower2.png')}}" class="w-100" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="president-img mb-5">
                            <img src="{{ asset('assets/images/presidentbadge.png') }}" alt="" class="president-badge">
                            <div class="img-frame">
                                <img src="{{ asset('assets/images/president1.jpeg') }}" alt="" class="w-100 president-main">
                            </div>
                            <div class="president-intro">
                                <h4 class="text-white">Cr. Mansi Agarwal</h4>
                                <h5 class="text-white">President</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="section-heading mb-5">
                            <h2 class="section-title">Message From The President</h2>
                        </div>
                        <p class="message-text text-main">I feel blessed to be part of LCN and KELC2 which not only
                            helped me to be confident but gave me the belief that what we want to achieve we can
                            achieve through hard work and teamwork and
                            not forget with the guidance of our seniors who are very efficient and helpful.
                            Stepping into a new post brings many responsibilities and presence of mind. LCN has
                            given me new identity new friends and a platform where I can prove my self as a new
                            woman.
                            It's my great pleasure to work with you all and learn more about friendship and
                            circling. As your president this year I would like to assure you of my full support.
                            Let's together make LCN proud.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- President Message End -->



<!-- Aims and Objectives Start -->

<section class="songs position-relative">
    <div class="container">
        <div class="row justify-content-start align-items-center justify-content-sm-center mb-4">
            <div class="col-lg-4 col-md-4 col-sm-5 col-6">
                <img src="{{asset('assets/images/singing.png')}}" alt="" class="w-100 sing">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-7">
                <div class="d-flex align-items-center">
                    <h2 class="text-main fs-1 mb-0">Ladies Circle Song</h2>
                    <img src="{{asset('assets/images/music.png')}}" alt="" height="100" width="100">
                </div>
                <p class="text-main">"<strong>Here's</strong> a circles<br>
                There's a circler<br>
                And another <strong>pretty</strong> circler<br>
                <strong>Cirlce</strong>, Circle, <strong>Ladies Circle</strong><br>
                Ladies Circle <strong>Song</strong>"
                </p>
                
            </div>
        </div>
        <div class="row justify-content-start align-items-center justify-content-sm-center">
            <div class="col-lg-4 col-md-4 col-sm-6 order-lg-2 col-6">
                <img src="{{asset('assets/images/hand.png')}}" alt="" class="w-100 sing" height="330">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="d-flex align-items-center">
                    <h2 class="text-main fs-1">Circle Prayer</h2>
                    <img src="{{asset('assets/images/music1.png')}}" alt="" height="100" width="60">
                </div>
                <p class="text-main">"For all the <strong>gifts</strong> we thank thee <strong>God</strong>. Especially for the gift of <strong>friendship</strong> & the priviledge service"</p>
            </div>
        </div>
    </div>
</section>

<!-- Aims and Objectives End -->



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
            <div class="col-lg-3 mb-4 col-md-6 col-sm-6">
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
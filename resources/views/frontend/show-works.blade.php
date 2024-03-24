@extends('layouts.front-master')
@section('title', $work->title)
@section('meta_description', $work->meta_description)
@section('image', asset('uploads/initiatives/'.$work->image))
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

<section class="work-single">
    <div class="container">
        <div class="row bg-white rounded-3 work-single-container">
            <div class="col-lg-8">
                <div class="rounded-3 p-3">
                    <div class="work-single-img">
                        <img src="{{asset('uploads/initiatives/'.$work->image)}}" alt="" class="w-100 rounded-3 mb-4">
                    </div>
                    <div class="work-single-details px-3 mb-5">
                        <h4 class="my-2">{!!$work->title!!}</h4>
                        <p>{!!$work->description!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <div class="work-sidebar">
                    <div class="recent-works">
                        <h4>Recent Initiatives</h4>
                        @foreach ($recentInitiatives as $item)
                        <div class="media border-bottom py-3">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <img loading="lazy" width="64" height="64" src="{{asset('uploads/initiatives/'.$item->image)}}" alt="img" />
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6><a href="{{url('initiatives', ['work_slug' => $item->work_slug])}}" class="text-black fs-6 text-decoration-none">{{$item->title}}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Work Section End -->
    
@endsection
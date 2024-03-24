@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal')
@section('image', asset('assets/images/logo.png'))
@section('content')


@if ($notifications->isNotEmpty())
<div id="pop-up" class="row justify-content-center align-items-center m-0 d-none">
    @foreach ($notifications as $notification) 
    @if ($loop->index < 1)
    <div class="col-md-6 col-10">
        <div class="popup-container rounded-3 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="mb-0">{{Str::limit($notification->title, 100)}}</h4>
                <span id="popup-close" class="fs-1">
                    &times;
                </span>
            </div>
            <a href="{{$notification->link}}">
                <img src="{{asset('uploads/notifications/'.$notification->image)}}" alt="" class="w-100">
            </a>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endif

    
<!-- Home Slider Start -->

<section class="owl-carousel owl-theme home-slider">
    @foreach ($banners as $banner)
    <div class="item">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 d-flex align-items-center justify-content-lg-center">
                    <div class="slider-text">
                        <h1 class="text-black text-capitalize mb-4">{{$banner->description}}</h1>
                        <a class="btn btn-main text-capitalize px-3 py-2" href="{{route('initiative')}}">Find Out More</a>
                    </div>
                </div>
                <div class="col-lg-8 home-slider-container">
                    <div class="home-slider-img w-100" style="background-image:  url('{{asset('uploads/banners/'.$banner->image)}}');"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

<!-- Home Slider End -->

<!-- About Section Start -->

<section class="about mb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 p-5 about-img">
            </div>
            <div class="col-lg-7 pb-5">
                <div class="d-flex">
                    <img src="{{ asset('assets/images/about-flower.png') }}" alt="" height="100" width="100">
                    <div class="section-heading flex-grow-1">
                        <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">ABOUT</span></h6>
                        <h2 class="section-title mb-4"> Empowering Change: Our Story at Lady Circle Nepal </h2>
                    </div>
                </div>
                <div class="section-body ms-3">
                    <p>
                        At Lady Circle Nepal, we champion empowerment, equality, and community progress. Rooted in a passion for social change, we strive to uplift women and transform communities across Nepal. Through collaborative efforts and a commitment to advocacy, education, and holistic development, our association aims to break barriers and create a society where every woman thrives.
                    </p>
                    <p>
                        Driven by the belief in collective strength, we foster a platform that nurtures skills, knowledge, and opportunities for women and girls. Our initiatives encompass education drives, healthcare programs, and advocacy for gender equality, aiming to create a sustainable impact at both grassroots and societal levels.
                    </p>
                    <a href="{{route('about')}}" class="btn-custom mt-3 text-decoration-none">Learn More <i
                        class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section End -->



<!-- Milestone Section Start -->

<section class="milestones">
    <div class="container">
        <div class="row">
            @foreach ($milestones as $milestone)
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                <div class="milestone text-center position-relative z-2">
                    <p class="milestone-data counter-stat text-white fs-2 fw-semibold mb-1">{{$milestone->achievement}}</p>
                    <span class="milestone-text text-white">{{$milestone->title}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Milestone Section End -->



<!-- Events Section Start -->

<section class="events">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">EVENTS</span></h6>
                    <h2 class="section-title mb-4">Upcoming events for positive social change</h2>
                </div>
            </div>
        </div>
        

        @if($upcomingEvents->isEmpty())
        <h6 class="text-black text-center mb-4">Oops! Looks like there are no upcoming events at the moment.<br>
            In the meantime, explore our past events to see what we've been up to!
        </h4>
        <div class="text-center">
            <a href="{{route('event')}}/#prev-events" class="btn btn-main">See previous events</a>
        </div>
        @else
        @foreach ($upcomingEvents as $up)  
        @if ($loop->index < 4)
        <div class="event-card mb-4">
            <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="event-card-img">
                        <a href="{{url('event', ['event_slug' => $up->event_slug])}}"><img src="{{ asset('uploads/events/'.$up->image) }}" alt="" class="w-100"></a>
                        <div class="event-date">
                            <td class="py-3 px-1">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $up->start_date)->format('d M') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="event-card-des">
                        <span class="event-time"><i class="fa fa-clock me-2"></i>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $up->start_date)->format('h:i A') }}</span>
                        <h5 class="event-card-title my-3"><a href="{{url('event', ['event_slug' => $up->event_slug])}}" class="text-decoration-none">{{$up->title}}</a></h5>
                        <p class="event-card-description pb-3 border-bottom">{{Str::limit($up->description,150)}}</p>
                        <p class="text-main fs-5 mb-1"><i class="fa fa-map-marker me-2"></i>Venue</p>
                        <p>{{$up->venue}}</p>
                        <a href="{{url('event', ['event_slug' => $up->event_slug])}}" class="btn-custom text-decoration-none">
                            Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <div class="text-center mt-5">
            <a href="{{route('event')}}" class="btn btn-main">View All Events</a>
        </div>
        @endif
    </div>
</section>

<!-- Events Section End -->



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
        <div class="owl-carousel owl-theme work-slider">
            @foreach ($initiatives as $initiative)
            @if($loop->index < 5)
            <div class="mb-4">
                <div class="work-card rounded p-2 pb-3">
                    <div class="work-card-img rounded mb-3">
                        <img src="{{ asset('uploads/initiatives/'.$initiative->image) }}" alt="" class="w-100 rounded">
                    </div>
                    <div class="work-card-des px-4 py-2">
                        <h5 class="work-card-title"><a href="{{url('initiatives', ['initiatives' => $initiative->work_slug])}}" class="text-decoration-none">{{Str::limit($initiative->title, 20)}}</a></h5>
                        <p class="work-card-description mb-3">{{Str::limit($initiative->description, 50)}}</p>
                        <a href="{{url('initiatives', ['initiatives' => $initiative->work_slug])}}" class="btn-custom text-decoration-none">
                            Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Work Section End -->



<!-- Blog Section Start -->

<section class="blog">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">BLOGS</span></h6>
                    <h2 class="section-title mb-4">Our Recent Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($blogs as $blog)
            @if ($loop->index < 3)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="blog-card">
                    <div class="blog-card-img rounded-3">
                        <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="" class="w-100 rounded-1">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                            <div class="blog-card-des p-3 rounded-3">
                                <div class="mb-2">
                                    <span class="blog-cat">{{$blog->categories->name}}</span>
                                </div>
                                <a href="{{url('blogs', ['blog_slug' => $blog->blog_slug])}}" class="text-decoration-none">
                                    <h5 class="blog-title pb-4">{{Str::limit($blog->title, 20)}}</h5>
                                </a>
                                <a href="{{url('blogs', ['blog_slug' => $blog->blog_slug])}}" class="text-decoration-none text-main">READ MORE 
                                    <i class="fa fa-angle-double-right"></i></a>
                                <p class="blog-date rounded-end-3 rounded-bottom-0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('d M') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Section End -->


<section class="associations">
    <div class="container overflow-x-hidden">
        <ul class="association-slider d-flex list-unstyled align-items-center m-0">
            @foreach ($associations as $association)
            <li><img src="{{ asset('uploads/member-association/'.$association->image) }}" alt="" height="120" width="120"></li>
            @endforeach
        </ul>
    </div>
	</section>
@endsection

@section('scripts')
<script src="{{ asset('counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('OwlCarousel2-2.3.4/owl.carousel.js') }}"></script>
<script>
    $('.home-slider').owlCarousel({
			loop: true,
			items: 1,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			nav: false,
			autoplay: true
		})
		$('.work-slider').owlCarousel({
			loop: true,
			nav: false,
			dots:true,
			items: 3,
			autoplay: true,
			responsive:{
				0:{
					items: 1
				},
				767:{
					items: 2,
				},
				992:{
					items: 3,
				}
			}
		})

initMilestones()

function initMilestones()
	{
		if ($('.counter-stat').length !== 0) {
			$('.counter-stat').counterUp({
				delay: 10,
				time: 1000
			});
		}
	}

</script>
@endsection

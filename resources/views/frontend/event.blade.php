@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | Events')
@section('image', asset('assets/images/logo.png'))
@section('content')	

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">Events</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}"
                        class="text-white fw-semibold text-decoration-none"><i class="fa fa-home me-1"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Events</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->


<!-- Events Section Start -->
<section class="events">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7">
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
            <a href="#prev-events" class="btn btn-main">See previous events</a>
        </div>
        @else
            @foreach ($upcomingEvents as $event)
            <div class="event-card mb-4">
                <div class="row">
                    <div class="col-lg-4 mb-3 mb-lg-0 col-md-5">
                        <div class="event-card-img">
                            <a href="{{url('event', ['event_slug' => $event->event_slug])}}"><img src="{{asset('uploads/events/'.$event->image)}}" alt="" class="w-100"></a>
                            <div class="event-date">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date)->format('d M')}}</div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="event-card-des">
                            <span class="event-time"><i class="fa fa-clock-o me-2"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date)->format('h:i A')}}</span>
                            <h5 class="event-card-title my-3"><a href="{{url('event', ['event_slug' => $event->event_slug])}}" class="text-decoration-none">{{$event->title}}</a></h5>
                            <p class="event-card-description pb-3 border-bottom">{{Str::limit($event->description,150)}}</p>
                            <p class="text-main fs-5 mb-1"><i class="fa fa-map-marker me-2"></i>Venue</p>
                            <p>{{$event->venue}}</p>
                            <a href="{{url('event', ['event_slug' => $event->event_slug])}}" class="btn-custom text-decoration-none">Learn More<i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{$upcomingEvents->links()}}
            @endforeach
            @endif
    </div>
</section>

<!-- Events Section End -->

        <section class="prev-events" id="prev-events">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{asset('assets/images/butterfly1.png')}}" alt="" height="120">
                            <div class="section-heading flex-grow-1">
                                <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">PAST EVENTS</span></h6>
                                <h2 class="section-title mb-4">Reflecting on Success: Past Events at Lady Circle Nepal</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($previousEvents as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="prev-event-card p-2 rounded-2">
                            <div class="prev-event-card-img">
                                <img src="{{ asset('uploads/events/'.$item->image) }}" alt="event" class="w-100 rounded-2">
                            </div>
                            <div class="prev-event-card-des p-2">
                                <h6 class="event-card-title"><a href="{{url('event', ['event_slug' => $item->event_slug])}}" class="text-decoration-none">
                                    {{Str::limit($item->title,25)}}</a></h6>
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->start_date)->format('d M')}}</p>
                                    <p class="text-main"> <i class="fa fa-map-marker"></i> {{$item->venue}}</p> 
                                </div>
                                <a href="{{url('event', ['event_slug' => $item->event_slug])}}" class="text-decoration-none btn-custom">Learn More <i
                                        class="fa fa-angle-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$previousEvents->links()}}
            </div>
        </section>
</section>
@endsection
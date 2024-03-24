@extends('layouts.front-master')
@section('title', $blog->meta_title)
@section('meta_description', $blog->meta_description)
@section('image', asset('uploads/blogs/'.$blog->image))
@section('content')

<!-- Breadcrumb Start -->

<section class="breadcrumbs">
    <div class="position-relative z-2 text-center">
        <h2 class="text-white breadcrumb-title">Blog</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homes')}}"
                        class="text-white fw-semibold text-decoration-none">
                        <i class="fa fa-home me-1"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="blog.html"
                        class="text-decoartion-none text-white"></a>Blog</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->

<!-- Blog container -->

<section class="blog-single">
    <div class="container">
        <div class="row bg-white rounded-3 blog-single-container">
            <div class="col-lg-8">
                <div class="rounded-3 p-3">
                    <div class="blog-single-img">
                        <img src="{{asset('uploads/blogs/'.$blog->image)}}" alt="" class="w-100 rounded-3 mb-4">
                        <span class="blog-single-date">{!!\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->updated_at)->format('d M')!!}</span>
                    </div>
                    <div class="blog-single-details px-3 mb-5">
                        <span class="single-blog-cat">{!!$blog->categories->name!!}</span>
                        <h4 class="my-4">{!!$blog->title!!}</h4>
                        <p>{!!$blog->description!!}</p>
                    </div>
                    <div class="share-blog p-3 text-end d-flex align-items-center justify-content-end">
                        <span class="me-3">Share :</span>
                        <ul class="social-share list-unstyled m-0">
                            <li><a href="https://www.facebook.com/sharer.php?u={{url('show-blogs/'.$blog->blog_slug)}}" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{url('show-blogs/'.$blog->blog_slug)}}&text={!!$blog->title!!}"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <div class="blog-sidebar">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        @foreach ($recentBlogs as $blog)
                        @if ($loop->index < 3)                            
                        <div class="media border-bottom py-3">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <img loading="lazy" width="64" height="64" src="{{asset('uploads/blogs/'.$blog->image)}}" alt="img" />
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6><a href="{{url('blogs', ['blog_slug' => $blog->blog_slug])}}" class="text-black fs-6 text-decoration-none">{{$blog->title}}
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection
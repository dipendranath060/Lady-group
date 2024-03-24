@extends('layouts.front-master')
@section('title', 'Ladies Circle Nepal | Blogs')
@section('image', asset('assets/images/logo.png'))
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
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Breadcrumb End -->

<!-- Blog Section Start -->

<section class="blog">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6 class="section-subtitle mb-2"><span class="bg-white pe-2">BLOGS</span></h6>
                    <h2 class="section-title mb-4">Our Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="blog-card">
                    <div class="blog-card-img rounded-3">
                            <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{$blog->image_alt}}" class="w-100 rounded-1">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                            <div class="blog-card-des p-3 rounded-3">
                                <div class="mb-2">
                                    <span class="blog-cat">{{$blog->categories->name}}</span>
                                </div>
                                <a href="{{url('blogs', ['blog_slug' => $blog->blog_slug])}}" class="text-decoration-none">
                                    <h5 class="blog-title pb-4">{{Str::limit($blog->title,30)}}</h5>
                                </a>
                                <a href="{{url('blogs', ['blog_slug' => $blog->blog_slug])}}" class="text-decoration-none text-main">READ MORE <i
                                        class="fa fa-angle-double-right"></i></a>
                                <p class="blog-date rounded-end-3 rounded-bottom-0">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->updated_at)->format('d M')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="pagination mx-auto">
                {{$blogs->links()}}
            </div>
        </div>
    </div>
</section>

<!-- Blog Section End -->

@endsection
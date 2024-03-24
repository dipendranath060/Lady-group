@extends('layouts.master')
@section('title', 'Show | Blog')
@section('content')


<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
      <nav
        aria-label="breadcrumb"
        class="p-2 bg-white breadcrumb-main rounded">
        <ol class="breadcrumb m-0 justify-content-start">
          <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            <a href="{{route('blogs')}}">Blogs</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Show-Blog
          </li>
        </ol>
      </nav>
    </div>
  </div>

<section class="blog-single">
    <div class="container">
        <div class="row bg-white rounded-3 blog-single-container justify-content-center">
            <div class="col-lg-8">
                <div class="rounded-3 p-3">
                    <div class="blog-single-img">
                        <img src="{{asset('uploads/blogs/'.$blog->image)}}" alt="" class="w-100 rounded-3 mb-4">
                        <span class="blog-single-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('d M') }} </span>
                    </div>
                    <div class="blog-single-details px-3">
                        <h4 class="my-4">{!!$blog->title!!}</h4>
                        <p>{!!$blog->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.master')
@section('title', 'Edit | Blog')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
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
            <a href="{{route('blogs')}}">Blog</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Edit Blog
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Blog Upload Form -->
  <div class="blog-container py-3">
    <div class="container">
      <div class="row mb-3 justify-content-center">
        <div class="col-lg-7">
          <div class="add-form bg-white p-4 rounded">
            <h2 class="mb-5 section-title border-bottom pb-1">
              Edit a Blog
            </h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <div>{{$error}}</div>
                  @endforeach
                </div>
            @endif
            <form action="{{url('admin/update-blog/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="title" class="fs-5 mb-2">Title</label>
                <input type="text" name="title" value="{{$blog->title}}" id="title" class="w-100" placeholder="Enter blog title..." required />
              </div>
              <div class="mb-3">
                <label for="meta_title" class="fs-5 mb-2">Meta Title</label>
                <input type="text" name="meta_title" value="{{$blog->meta_title}}" id="meta_title" class="w-100" placeholder="Enter blog meta title..." required />
              </div>
              <div class="mb-3">
                <label for="slug" class="fs-5 mb-2">Slug</label>
                <input type="text" name="blog_slug" value="{{$blog->blog_slug}}" id="slug" class="w-100" placeholder="Enter blog slug..." required />
              </div>
              <div class="d-flex flex-wrap mb-3">
                <div>

                <div>
                  <label for="category" class="fs-5 mb-2">Select a category</label></div>
                    <select name="category_id" id="category" class="py-2 me-5" onchange="checkNewCategory(this)"  >
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
              
            </div>
              <div class="mb-3">
                <label for="summernote" class="fs-5 mb-2"
                  >Description</label
                >
                <textarea
                  id="summernote"
                  class="bg-white"
                  name="description"
                  placeholder="Enter blog description..."
                >{{$blog->description}}</textarea>
              </div>

              <div class="mb-3">
                <label for="meta_description" class="fs-5 mb-2"
                  >Meta Description</label
                ><br />
                <textarea
                  id="meta_description"
                  name="meta_description"
                  class="w-100"
                  rows="5"
                  placeholder="Enter blog meta description..."
                >{{$blog->meta_description}}</textarea>
              </div>

              <div class="d-flex align-items-center">

              
              <div class="mb-3 me-3">
                <label for="blogimg" class="fs-5 mb-2"
                  >Upload blog Image</label
                ><br />
                <input
                  type="file"
                  name="image"
                  id="blogimg"
                  class="w-100"
                ><br><br>
                <img src="{{asset('uploads/blogs/'.$blog->image)}}" width="100px" alt="existing image">
              </div>

              <div class="mb-3">
                <label for="image_alt" class="fs-5 mb-2">Image Alt</label>
                <input type="text" name="image_alt" value="{{$blog->image_alt}}" id="image_alt" class="w-100" placeholder="Enter image_alt..." required />
              </div>

            </div>

              <div class="mb-5">
                <label for="blogimg" class="fs-5 mb-2"
                  >Featured Image</label
                ><br />
                <input
                  type="file"
                  name="featured_image"
                  id="blogimg"
                  class="w-100"
                ><br><br>
                <img src="{{asset('uploads/blogs/'.$blog->featured_image)}}" width="100px" alt="existing image">
              </div>

              <button class="btn btn-primary mb-1">Update Post</button>
              <button
                class="btn btn-danger mb-1"
                type="reset"
                onclick="reset_content()"
              >
                Reset Content
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Enter blog description...',
        tabsize: 2,
        height: 300
    });
    function reset_content() {
        $('#summernote').summernote('reset')
    }
</script>
@endsection

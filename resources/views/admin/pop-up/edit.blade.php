@extends('layouts.master')
@section('title', 'Edit | Notification')
@section('content')

        <!-- Breadcrumb -->
        <div class="breadcrumb-area mb-3">
            <div class="container">
                <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
                    <ol class="breadcrumb m-0 justify-content-start">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('notifications')}}">Notification</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Notification</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Milestone Add Form -->
        <div class="counter-container py-3">
            <div class="container">
                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-7">
                        <div class="add-form bg-white p-4 rounded">
                            <h2 class="mb-5 section-title border-bottom pb-1">Edit a Notification</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{url('admin/update-notification/'.$notification->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="fs-5 mb-2">Title</label>
                                    <input type="text" value="{{$notification->title}}" name="title" id="title" class="w-100" required>
                                </div>
                                
                                <div class="mb-5">
                                    <label for="image" class="fs-5 mb-2">Image</label><br>
                                    <input id="image" name="image" class="w-100" type="file"><br><br>
                                        <img src="{{asset('uploads/notifications/'.$notification->image)}}" width="100px" alt="existing image">
                                </div>

                                <div class="mb-3">
                                    <label for="link" class="fs-5 mb-2">Link</label>
                                    <input type="text" value="{{$notification->link}}" name="link" id="link" class="w-100">
                                </div>

                                <button type="submit" class="btn btn-primary mb-1">Update Notification</button>
                                <button class="btn btn-danger mb-1" type="reset" onclick="reset_content()">Reset Content</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
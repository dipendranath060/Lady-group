@extends('layouts.master')
@section('title', 'List | Current-Member')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
            <ol class="breadcrumb m-0 justify-content-start">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Current-Members</li>
                <li class="breadcrumb-item active" aria-current="page">Current-Member List</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Testimonial List Table -->
<section class="testimonial-list">
    <div class="container">
        <h2 class="mb-5 section-title border-bottom pb-3 text-center">Current-Member List</h2>
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
            <div class="col-lg-10 overflow-auto">
                <div class="text-end mb-3">
                    <a href="{{route('add-current-member')}}" class="btn btn-success">+ Add New Current-Member</a>
                </div>
                @if ($currentMembers->isEmpty())
                    <h4 class="text-black text-center">No Current Member Found....</h4>
                @else
                <table class="w-100 bg-white text-center" id="table-list">
                    <tr class="border-top border-bottom">
                        <th class="py-3 px-1">S.N</th>
                        <th class="py-3 px-1">Name</th>
                        <th class="py-3 px-1">Image</th>
                        <th class="py-3 px-1">Designation</th>
                        <th class="py-3 px-1">Action</th>
                    </tr>
                    @foreach ($currentMembers as $currentMember)
                    <tr>
                        <td class="py-3 px-1">{{$loop->iteration}}</td>
                        <td class="py-3 px-1">{{$currentMember->name}}</td>
                        <td>
                            <img src="{{asset('uploads/current-members/'.$currentMember->image)}}" width="80px" alt="img">
                        </td>
                        <td class="py-3 px-1">{{$currentMember->designation}}</td>
                        <td class="py-3 px-1">
                            <a type="button" href="{{url('admin/edit-current-member/'.$currentMember->id)}}" class="btn btn-success mb-1">Edit</a>
                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $currentMember->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    {{-- modal starts --}}
                    <div class="modal fade" id="deleteModal_{{ $currentMember->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Current-Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Current Member ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteCurrentForm" action="{{url('admin/delete-current-member/'.$currentMember->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </table>
                {{ $currentMembers->links() }}
                @endif  
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('button[data-bs-target^="#deleteModal"]').on('click', function() {
            const currentMemberId = $(this).data('currentMember-id');
            $('#deleteCurrentForm_' + currentMemberId).attr('action', '{{ url("admin/delete-currentMember") }}/' + currentMemberId);
        });
  
        $('#deleteCurrentForm').on('submit', function(e) {
            e.preventDefault();
        });
    });
  </script>
@endsection
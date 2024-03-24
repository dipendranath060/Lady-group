@extends('layouts.master')
@section('title', 'List | Previous-Member')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
            <ol class="breadcrumb m-0 justify-content-start">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Previous-Members</li>
                <li class="breadcrumb-item active" aria-current="page">Previous-Member List</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Previous List Table -->
<section class="testimonial-list">
    <div class="container">
        <h2 class="mb-5 section-title border-bottom pb-3 text-center">Previous-Member List</h2>
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
            <div class="col-lg-10 overflow-auto">
                <div class="text-end mb-3">
                    <a href="{{route('add-pre-member')}}" class="btn btn-success">+ Add New Previous-Member</a>
                </div>
                @if ($prevMembers->isEmpty())
                    <h4 class="text-black text-center">No Previous Member Found....</h4>
                @else
                <table class="w-100 bg-white text-center" id="table-list">
                    <tr class="border-top border-bottom">
                        <th class="py-3 px-1">S.N</th>
                        <th class="py-3 px-1">Name</th>
                        <th class="py-3 px-1">Image</th>
                        <th class="py-3 px-1">Designation</th>
                        <th class="py-3 px-1">Tenure</th>
                        <th class="py-3 px-1">Action</th>
                    </tr>
                    @foreach ($prevMembers as $prevMember)
                    <tr>
                        <td class="py-3 px-1">{{$loop->iteration}}</td>
                        <td class="py-3 px-1">{{$prevMember->name}}</td>
                        <td>
                            <img src="{{asset('uploads/previous-members/'.$prevMember->image)}}" width="80px" alt="img">
                        </td>
                        <td class="py-3 px-1">{{$prevMember->designation}}</td>
                        <td class="py-3 px-1">{{$prevMember->tenure}}</td>
                        <td class="py-3 px-1">
                            <a type="button" href="{{url('admin/edit-pre-member/'.$prevMember->id)}}" class="btn btn-success mb-1">Edit</a>
                            <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $prevMember->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    {{-- modal starts --}}
                    <div class="modal fade" id="deleteModal_{{ $prevMember->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Previous Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Previous Member?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteprevForm" action="{{url('admin/delete-pre-member/'.$prevMember->id)}}" method="POST">
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
                {{ $prevMembers->links() }}
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
            const prevMemberId = $(this).data('prevMember-id');
            $('#deleteprevForm_' + prevMemberId).attr('action', '{{ url("admin/delete- prevMember") }}/' + prevMemberId);
        });
  
        $('#deleteprevForm').on('submit', function(e) {
            e.preventDefault();
        });
    });
  </script>
@endsection
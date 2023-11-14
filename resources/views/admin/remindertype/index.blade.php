@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="pagetitle">
            <h1>Reminder Type</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Reminder Type</li>
                    <input type="hidden" value="{{route('remindertype.index')}}" id="index_route">
                </ol>
            </nav>
        </div><!-- End Page Title -->
    </div>
    <div class="col-md-4">
        <button type="button" class="float-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Add {{$title}}
        </button>
    </div>
</div>


<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="main_datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
    @include('admin.remindertype.modal')
</section>

@endsection

@push('scripts')
<script src="{{asset('assets/js/admin/remindertype.js')}}"></script>
@endpush
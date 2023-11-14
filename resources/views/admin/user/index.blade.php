@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Users</li>
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
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
    @include('admin.user.modal')
</section>

@endsection


@push('scripts')
<script>
    var table = $('#main_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'mobile',
                name: 'mobile'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#userFrm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('user.store')}}",
                type: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    $(".submitBtn").attr('disabled', true);
                },
                success: function(response) {
                    if (response.status) {
                        $(".submitBtn").removeAttr('disabled');
                        alert(response.message);
                        $("#userFrm")[0].reset();
                        $("#basicModal").modal('hide');
                        table.draw();
                    }
                }
            })
        })

        // Edit 
        $(document).on('click',".edit-btn",function(){
            let id = $(this).data("id");
            let edit_route_name = "{{route('user.show',[':id'])}}";
            edit_route_name = edit_route_name.replace(':id',id);
            $.ajax({
                url: edit_route_name,
                type: 'GET',
                success: function(response) {
                    if (response.status) {
                        $("#basicModal").modal('show');
                        $(".modal-title").text('Edit Reminder Type');
                        $("#name").val(response.data.name);
                        $("#email").val(response.data.email);
                        $("#mobile").val(response.data.mobile);
                        $("#id").val(response.data.id);
                    }else{
                        alert(response.message);
                    }
                }
            })
        })

        // Delete
        $(document).on('click',".delete-btn",function(){
            let id = $(this).data("id");
            let delete_route_name = "{{route('user.destroy',[':id'])}}";
            delete_route_name = delete_route_name.replace(':id',id);
            $.ajax({
                url: delete_route_name,
                type: 'delete',
                data:{"_token": "{{ csrf_token() }}"},
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        table.draw();
                    }else{
                        alert(response.message);
                    }
                }
            })
        })

        $(document).on('click','.status-change',function(){
            let id = $(this).data('id');
            let status = $(this).data('status');
            let statusChangeRoute = "{{route('user.status')}}";
            $.ajax({
                url: statusChangeRoute,
                type: 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    'id' : id,
                    'status' : status
                },
                success: function(response) {
                    if (response.status) {
                        table.draw();
                    }else{
                        alert(response.message);
                    }
                }
            })
        })
    })
</script>
@endpush
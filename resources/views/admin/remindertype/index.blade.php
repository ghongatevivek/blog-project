@extends('admin.layouts.admin')

@section('content')


<section class="section">
    <div class="row p-2">
        <div class="col-md-12">
            <!-- <a href="" class="float-end btn btn-primary">Add {{$title}}</a> -->
            <button type="button" class="float-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Add {{$title}}
              </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <table class="table" id="main_datatable">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@include('admin.remindertype.modal')

@push('scripts')
<script>
    $(document).ready(function(){
        $("#reminderTypeFrm").submit(function(e){
            e.preventDefault();
            $.ajax({
                url : "{{route('remindertype.store')}}",
                type : 'POST',
                data : $(this).serialize(),
                beforeSend : function(){
                    $(".submitBtn").attr('disabled',true);
                },
                success : function(response){
                    if(response.status){
                        $(".submitBtn").removeAttr('disabled');
                        alert(response.message);
                        $("#reminderTypeFrm")[0].reset();
                        $("#basicModal").modal('hide');
                    }
                }
            })
        })
        var table = $('#main_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('remindertype.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    })
</script>
@endpush
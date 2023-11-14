let indexRoute = $("#index_route").val();
let table = $('#main_datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: indexRoute,
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            data: 'created_at',
            name: 'created_at'
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

    $("#reminderTypeFrm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                $(".submitBtn").append(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
            },
            success: function(response) {
                if (response.status) {
                    $(".submitBtn").find('.spinner-border').remove();
                    toastr.success(response.message);
                    $("#reminderTypeFrm")[0].reset();
                    $("#basicModal").modal('hide');
                    table.draw();
                }else{
                    toastr.error(response.message);
                }
            }
        })
    })

    // Edit 
    $(document).on('click',".edit-btn",function(){
        let id = $(this).data("id");
        $.ajax({
            url: indexRoute+'/'+id,
            type: 'GET',
            success: function(response) {
                if (response.status) {
                    $("#basicModal").modal('show');
                    $(".modal-title").text('Edit Reminder Type');
                    $("#name").val(response.data.name);
                    $("#id").val(response.data.id);
                }else{
                    toastr.error(response.message);
                }
            }
        })
    })

    // Delete
    $(document).on('click',".delete-btn",function(){
        let id = $(this).data("id");
        $.ajax({
            url: indexRoute+'/'+id,
            type: 'delete',
            data : {
                "_token" : csrf_token
            },
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);
                    table.draw();
                }else{
                    toastr.error(response.message);
                }
            }
        })
    })

    $(document).on('click','.status-change',function(){
        let id = $(this).data('id');
        let status = $(this).data('status');
        let statusChangeRoute = "{{route('remindertype.status')}}";
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
                    toastr.error(response.message);
                }
            }
        })
    })
})
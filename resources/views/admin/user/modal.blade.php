<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{route('user.store')}}" id="userFrm" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submitBtn">Save</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Basic Modal-->
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{route('remindertype.store')}}" id="reminderTypeFrm" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Basic Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Status</label>
                            <!-- <div class="form-check form-switch">
                                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </div> -->
                            <input type="radio" name="status" value="1">Active
                            <input type="radio" name="status" value="0">Deactie
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Basic Modal-->
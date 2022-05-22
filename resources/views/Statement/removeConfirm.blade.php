<div class="modal fade" id="removeConfirmBox" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <input type="hidden" id="id" value="">
                <h6>Are you sure you want to remove this statement?</h6>
            </div>
            <div>
                <button type="button" class="btn btn-danger btn-sm ml-3" onclick="cancel()">No</button>
                <button type="button" class="btn btn-success btn-sm" onclick="remove()">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="orcafile_delete_modal" tabindex="-1" role="dialog"
    aria-labelledby="delete_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_modalTitle">Delete Orcafile</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the Orcafile?                
            </div>
            <div class="modal-footer">
                <form class="forms-sample" action="" id="orcafile_delete_form" method="POST">
                    @csrf
                    @method('DELETE')             
                    <button type="submit" class="btn btn-gradient-danger mr-2 btn-rounded btn-sm">Delete</button>
                    
                </form>
                <button class="btn btn-light btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
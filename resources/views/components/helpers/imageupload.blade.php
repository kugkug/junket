<div class="div-image-uploader">
    <div class="card-body box-profile">
        <div class="text-center">
        <img class="profile-user-img img-fluid img-circle image-uploaded" src="{{asset('images/system/no_company_image.png')}}" alt="Image Upload" title="Update Image">
        </div>
    </div>

    <div class="modal fade" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-image"></i>
                        Upload Image
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle image-upload" src="{{asset('images/system/no_company_image.png')}}" alt="Image Upload">
                            <input type="file" class="form-control d-none">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" id="btn-use-photo">Use Image</button>
                    <button type="button" class="btn btn-danger" id="btn-reset-photo">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
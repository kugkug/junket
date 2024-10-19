@include('partials.admin.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-building"></i> Update Existing Company
                </h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Code</label>
                            <input type="email" class="form-control" placeholder="Company Code">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="email" class="form-control" placeholder="Company Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Company Address</label>
                    <input type="email" class="form-control" placeholder="Company Address">
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="email" class="form-control" placeholder="Contact Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" placeholder="Company Email">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Person</label>
                            <input type="email" class="form-control" placeholder="Contact Person">
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>

                    <a class="btn btn-danger" href="/admin/companies">
                        <i class="fa fa-undo"></i> Cancel
                    </a>
                </div>
          </div>
    </div>
@include('partials.admin.footer')
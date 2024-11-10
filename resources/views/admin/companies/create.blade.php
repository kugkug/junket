@include('partials.admin.header')
    <div class="col-md-12">
        <form action="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-building"></i> Register New Company
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <x-helpers.imageupload caption='Company Logo' />    
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Code</label>
                                        <input type="email" class="form-control" placeholder="Company Code" data-key="Code" data="req">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Company Name</label>
                                        <input type="email" class="form-control" placeholder="Company Name" data-key="Name" data="req">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Address</label>
                                <textarea class="form-control" rows="4" data-key="Address" data="req"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="email" class="form-control" placeholder="Contact Number" data-key="ContactNo" data="req">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="Company Email" data-key="Email" data="req">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Person</label>
                                <input type="email" class="form-control" placeholder="Contact Person" data-key="Representative" data="req">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" data-trigger="submit">
                            <i class="fa fa-save"></i> Save
                        </button>

                        <a class="btn btn-danger" href="/admin/companies">
                            <i class="fa fa-undo"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@include('partials.admin.footer')
<script src="{{asset('scripts/modules/companies.js')}}"></script>
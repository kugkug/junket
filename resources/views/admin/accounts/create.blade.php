@include('partials.admin.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-user-plus"></i> Add New User
                </h3>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="">Company 1</option>
                                <option value="">Company 2</option>
                                <option value="">Company 3</option>
                                <option value="">Company 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Employee ID.</label>
                            <input type="email" class="form-control" placeholder="Employee ID.">
                        </div>
                    </div>
                </div>                

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="email" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="email" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="email" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
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
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Position</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="">Agent</option>
                                <option value="">Cashier</option>
                                <option value="">Front Desk</option>
                                <option value="">Supervisor</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>

                    <a class="btn btn-danger" href="/admin/accounts">
                        <i class="fa fa-undo"></i> Cancel
                    </a>
                </div>
          </div>
    </div>
@include('partials.admin.footer')
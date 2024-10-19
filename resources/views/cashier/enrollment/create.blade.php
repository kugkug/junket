@include('partials.cashier.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-user-plus"></i> Enroll New Player
                </h3>
            </div>
            <div class="card-body">

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
                            <label for="exampleInputEmail1">Passport / ID</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cash In</label>
                            <input type="email" class="form-control text-right" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rebate</label>
                            <input type="email" class="form-control text-right" placeholder="0.00">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i> Save
                    </button>

                    <a class="btn btn-danger" href="/cashier/enrollments">
                        <i class="fa fa-undo"></i> Cancel
                    </a>
                </div>
          </div>
    </div>
@include('partials.cashier.footer')
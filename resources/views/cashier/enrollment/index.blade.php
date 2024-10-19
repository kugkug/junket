@include('partials.cashier.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-users"></i> Enrollments
                </h3>

                <div class="card-tools">
                  <a class="btn btn-primary" href="/enrollment/add">
                      <i class="fa fa-user-tag"></i> Enroll
                  </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 ">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Cash In</th>
                    <th>Rebate</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Enrollee 1</td>
                    <td>100,000</td>
                    <td>5,000</td>
                    <td>
                        
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="/enrollment/edit">
                              <i class="fa fa-user-edit"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fas fa-money-check-alt"></i> Cash Out
                            </a>
                        </div>
                          
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Enrollee 2</td>
                    <td>100,000</td>
                    <td>5,000</td>
                    <td>
                        
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="/account/edit">
                              <i class="fa fa-user-edit"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fas fa-money-check-alt"></i> Cash Out
                            </a>
                        </div>
                          
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Enrollee 3</td>
                    <td>100,000</td>
                    <td>5,000</td>
                    <td>
                        
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="/account/edit">
                              <i class="fa fa-user-edit"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fas fa-money-check-alt"></i> Cash Out
                            </a>
                        </div>
                          
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Enrollee 4</td>
                    <td>100,000</td>
                    <td>5,000</td>
                    <td>
                        
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="/account/edit">
                              <i class="fa fa-user-edit"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fas fa-money-check-alt"></i> Cash Out
                            </a>
                        </div>
                          
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
@include('partials.cashier.footer')
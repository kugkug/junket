@include('partials.admin.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-building"></i> Registered Companies
                </h3>

                <div class="card-tools">
                    <a class="btn btn-primary" href="/company/registration">
                        <i class="fa fa-plus"></i> New Company
                    </a>
                  </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>User Accounts</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Company 1</td>
                        <td>Manila</td>
                        <td>10</td>
                        <td>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="/company/edit">
                                  <i class="fa fa-edit"></i> Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/accounts/add">
                                  <i class="fa fa-user-plus"></i> Add Users
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                  <i class="fa fa-ban"></i> Deactivate
                                </a>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Company 2</td>
                        <td>Manila</td>
                        <td>10</td>
                        <td>
                            
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                              
                        </td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Company 3</td>
                        <td>Manila</td>
                        <td>10</td>
                        <td>
                            
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                              
                        </td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Company 4</td>
                        <td>Manila</td>
                        <td>10</td>
                        <td>
                            
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                              
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-md m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
          </div>
    </div>
@include('partials.admin.footer')
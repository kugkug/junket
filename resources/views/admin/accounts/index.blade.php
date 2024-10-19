@include('partials.admin.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-users"></i> User Accounts
                </h3>

                <div class="card-tools">
                  <a class="btn btn-primary" href="/account/add">
                      <i class="fa fa-user-plus"></i> Add User
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
                    <th>Position</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>User Account 1</td>
                    
                    <td>Supervisor</td>
                    <td>
                        
                        <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="/account/edit">
                              <i class="fa fa-user-edit"></i> Edit
                            </a>
                            <a class="dropdown-item" href="/account/access">
                              <i class="fa fa-user-cog"></i> Access Settings
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fa fa-user-slash"></i> Deactivate
                            </a>
                        </div>
                          
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>User Account 2</td>
                    <td>Cashier</td>
                    <td>
                        
                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="/account/edit">
                          <i class="fa fa-user-edit"></i> Edit
                        </a>
                        <a class="dropdown-item" href="/account/access">
                          <i class="fa fa-user-cog"></i> Access Settings
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-user-slash"></i> Deactivate
                        </a>
                    </div>
                          
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>User Account 3</td>
                    
                    <td>Agent</td>
                    <td>
                        
                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu" style="">
                          <a class="dropdown-item" href="/account/edit">
                            <i class="fa fa-user-edit"></i> Edit
                          </a>
                          <a class="dropdown-item" href="/account/access">
                            <i class="fa fa-user-cog"></i> Access Settings
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">
                            <i class="fa fa-user-slash"></i> Deactivate
                          </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>User Account 4</td>
                    
                    <td>Agent</td>
                    <td>
                        
                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                        <a class="dropdown-item" href="/account/edit">
                          <i class="fa fa-user-edit"></i> Edit
                        </a>
                        <a class="dropdown-item" href="/account/access">
                          <i class="fa fa-user-cog"></i> Access Settings
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-user-slash"></i> Deactivate
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
@include('partials.admin.footer')
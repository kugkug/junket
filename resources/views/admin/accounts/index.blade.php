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
            <div class="card-body">
              	<div class="dataTables_wrapper dt-bootstrap4">
                  	<div class="table-responsive div-table-data"></div>
                  	<div class="row paginator">
                      
                  	</div>
              	</div>
          	</div>
            <!-- /.card-body -->
          </div>
    </div>
@include('partials.admin.footer')
<script src="{{asset('scripts/modules/accounts.js')}}"></script>
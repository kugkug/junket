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
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="table-responsive div-table-data">
                    
                    </div>
                    <div class="row paginator">
                        
                    </div>
                </div>
            </div>
          </div>
    </div>
@include('partials.admin.footer')
<script src="{{asset('scripts/modules/companies.js')}}"></script>
@include('partials.cashier.header')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              	<h3 class="card-title">
                	<i class="fa fa-users"></i> Agents
                </h3>

                <div class="card-tools">
                  	<a class="btn btn-primary" href="/agent/add">
                      	<i class="fa fa-user-tag"></i> Add Agent
                  	</a>
                </div>
            </div>
            <div class="card-body">
				<div class="dataTables_wrapper dt-bootstrap4">
					<div class="table-responsive div-table-data"></div>
					<div class="row paginator"></div>
				</div>
			</div>
        </div>
    </div>
@include('partials.cashier.footer')
<script src="{{asset('scripts/modules/agents.js')}}"></script>
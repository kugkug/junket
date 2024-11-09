@include('partials.cashier.header')

    <div class="col-md-12">
        <div class="card collapsed-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-user"></i> Player Information
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <img class="img-fluid" src="{{ $player_info['photo'] }}" alt="">
                    </div>
                    <div class="col-md-5 p-2">
                        <dl>
                            <dt>Lastname</dt>
                            <dd>{{ ucwords(strtolower($player_info['lastname']))}}</dd>
                            <hr />
                            <dt>Middlename</dt>
                            <dd>{{ ucwords(strtolower($player_info['middlename']))}}</dd>
                            <hr />
                            <dt>Firstname</dt>
                            <dd>{{ ucwords(strtolower($player_info['firstname']))}}</dd>
                            <hr />
                            <dt>Nationality</dt>
                            <dd>{{ $player_info['nationality']['nationality']}}</dd>
                            <hr />
                            <dd>Arrival Date</dd>
                            <dt>{{ date("F d, Y", strtotime($player_info['arrival_date']))}}</dt>
                            <hr />
                            <dd>Deposit</dd>
                            <dt>{{ number_format($player_info['deposit'], 2, ".", "," )}}</dt>
                        </dl>        
                    </div>
                </div>
                
            </div>
          </div>

        <div class="card">
            <div class="card-header">
              	<h3 class="card-title">
                	<i class='fas fa-coins'></i> Availments
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">FNB</label>
                            <input type="text" class="form-control" placeholder="Passport No." data-key="PassportNo" data="req">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <input type="date" class="form-control" placeholder="Arrival Date" data-key="ArrivalDate" data="req">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Room No.</label>
                            <input type="text" class="form-control" placeholder="First Name" data-key="FirstName" data="req">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Restaurant</label>
                            <input type="text" class="form-control" placeholder="Middle Name" data-key="MiddleName" data="req">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Receipt Amount</label>
                            <input type="text" class="form-control" placeholder="Last Name" data-key="LastName" data="req">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Receipt Number</label>
                            <input type="text" class="form-control" placeholder="Contact Number">
                        </div>
                    </div>

                </div>
                <hr />
                <div class="card card-primary">
                    <div class="card-header  text-center">
                        <h3 class="card-title">
                            <i class='fas fa-coins'></i> Transactions
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="table-responsive div-table-data"></div>
                            <div class="row paginator"></div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
@include('partials.cashier.footer')
<script src="{{asset('scripts/modules/transactions.js')}}"></script>
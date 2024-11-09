@include('partials.admin.header')
    <div class="col-md-12">
        <form action="">
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
                                <select class="form-control" data-key="Code" data="req">
                                    <option value=""></option>
                                    @if (count($companies) > 0)
                                        @foreach ($companies as $company)
                                            <option value="{{$company['code']}}" 
                                                {{ ($account_info['company_code'] == $company['code']) ? " selected" : "" }}
                                            >{{$company['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee ID.</label>
                                <input type="text" class="form-control" placeholder="Employee ID." data-key="EmployeeID" data="req" value="{{ $account_info['emp_id'] }}">
                            </div>
                        </div>
                    </div>                

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" data-key="FirstName" data="req" value="{{ $account_info['firstname'] }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Middle Name" data-key="MiddleName" data="req" value="{{ $account_info['middlename'] }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" data-key="LastName" data="req" value="{{ $account_info['lastname'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="text" class="form-control" placeholder="Contact Number" data-key="ContactNo" data="req" value="{{ $account_info['phone'] }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" data-key="Email" data="req" value="{{ $account_info['email'] }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Position</label>
                                <select class="form-control" data-key="PositionId" data="req">
                                    <option value=""></option>
                                    @if (count($positions) > 0)
                                        @foreach ($positions as $type => $position)
                                        <option value="{{$type}}"
                                            {{ ($account_info['user_type'] == $type) ? " selected" : "" }}
                                        >{{$position}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" data-trigger="update" data-id="{{ $account_info['id'] }}">
                            <i class="fa fa-save"></i> Update
                        </button>

                        <a class="btn btn-danger" href="/admin/accounts">
                            <i class="fa fa-undo"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@include('partials.admin.footer')
<script src="{{asset('scripts/modules/accounts.js')}}"></script>
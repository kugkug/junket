@include('partials.cashier.header')
    <div class="col-md-12">
        <form action="">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-user-plus"></i> Enroll New Player
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <x-helpers.imageupload />    
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Passport No.</label>
                                        <input type="text" class="form-control" placeholder="Passport No." data-key="PassportNo" data="req">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Arrival Date</label>
                                        <input type="date" class="form-control" placeholder="Arrival Date" data-key="ArrivalDate" data="req">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nationality</label>
                                        <select class="form-control" data-key="NationalityId" data="req">
                                            <option value=""></option>
                                            @if (count($nationalities) > 0)
                                                @foreach ($nationalities as $nationality)
                                                <option value="{{$nationality['id']}}">{{$nationality['nationality']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" data-key="FirstName" data="req">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Middle Name" data-key="MiddleName" data="req">
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" data-key="LastName" data="req">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Number</label>
                                        <input type="text" class="form-control" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Initial Deposit</label>
                                        <input type="number" class="text-right form-control" placeholder="0.00" data-key="Deposit" data="req">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>                
                </div>
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" data-trigger="submit">
                            <i class="fa fa-save"></i> Save
                        </button>

                        <a class="btn btn-danger" href="/cashier/enrollments">
                            <i class="fa fa-undo"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@include('partials.cashier.footer')
<script src="{{asset('scripts/modules/players.js')}}"></script>
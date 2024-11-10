@include('partials.cashier.header')

    <input type="hidden" value="{{$player_info['id']}}" id="id">
    <div class="col-md-12">
        <form action="">
            <div class="card card-success card-outline collapsed-card">
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
                                <dt>Fullname</dt>
                                <dd>{{ 
                                    ucwords(strtolower($player_info['firstname'] . " ". $player_info['middlename']." ".$player_info['lastname']))}}
                                </dd>
                                <hr />
                                <dt>Nationality</dt>
                                <dd>{{ $player_info['nationality']['nationality']}}</dd>
                                <hr />
                                <dd>Arrival Date</dd>
                                <dt>{{ date("F d, Y", strtotime($player_info['arrival_date']))}}</dt>
                                <hr />
                                <dd>Deposit</dd>
                                <dt>{{ number_format($player_info['deposit'], 2, ".", "," )}}</dt>

                                <hr />
                                <dd>Agent</dd>
                                <dt>
                                    {{ 
                                        ($player_info['agent']) ? 
                                        ucwords(strtolower($player_info['lastname'] . " " . $player_info['firstname'].", ". $player_info['middlename'])) :
                                        "-"
                                    }}
                                </dt>
                            </dl>        
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class='fas fa-coins'></i> Availments
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Availment Type</label>
                                <select class="form-control" data-key="AvailmentId" data="req">
                                    <option value=""></option>
                                    @if (count($fnb) > 0)
                                        @foreach ($fnb as $fb)
                                        <option value="{{$fb['id']}}">{{$fb['type']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reference Number</label>
                                <input type="text" class="form-control" placeholder="Reference Number" data-key="ReferenceNo" data="req">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Amount</label>
                                <input type="number" class="form-control text-right" placeholder="0.00" data-key="TotalAmount" data="req">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-helpers.imageupload caption='Receipt Image' />    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Remarks</label>
                                <textarea class="form-control"  rows="10" data-key='Remarks'></textarea>
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

            <div class="card card-primary card-outline">
                <div class="card-header text-center">
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
        </form>
    </div>
@include('partials.cashier.footer')
<script src="{{asset('scripts/modules/transactions.js')}}"></script>
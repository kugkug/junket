@include('partials.admin.header')

<div class="row">
     
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa fa-users"></i> Top Bettor
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th class="text-right">Cash In</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Bettor 1</td>
                <td class="text-right">1,000,000</td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Bettor 1</td>
                <td class="text-right">150,000</td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Bettor 1</td>
                <td class="text-right">120,000</td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Bettor 1</td>
                <td class="text-right">10,000</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary float-right">
                <i class="fa fa-list"></i> View All
            </button>
        </div>
      </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line"></i> Realtime Reports
                </h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-wallet"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">Cash In</span>
                              <span class="info-box-number">760,000</span>
                            </div>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-text">New Members</span>
                              <span class="info-box-number">2,000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Rebates</span>
                                <span class="info-box-number">10</span>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
  </div>
@include('partials.admin.footer')
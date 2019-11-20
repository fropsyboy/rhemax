@extends('layouts.back')

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Total Balance</p>
                  <h3 class="card-title">
                  {{ str_limit($balance, $limit = 7, $end = '..') }}
                    <!-- <small>CRs</small> -->
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <button type="button" class="btn  btn-sm btn-secondary" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                    <i class="material-icons text-danger">warning</i> Top Up credit...
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Referral</p>
                  <h3 class="card-title">0.000088</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Total Spend</p>
                  <h3 class="card-title">+75</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked per Transactions
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Trans Pending</p>
                  <h3 class="card-title">{{$wait}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Tracked per Second
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Token Delivery</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 100% </span> Delivery rate always.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 1 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Successful Transactions</h4>
                  <p class="card-category">Online payment only</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 1 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Failed Transactions</h4>
                  <p class="card-category">Online payment only</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 1 minutes ago
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Top Up's</h4>
                  <p class="card-category">Online Top Up only Top 5</p>
                </div>
                </div>
                  <div class="card-body table-responsive">
                      <table class="table table-hover">
                          <thead class="text-warning">
                          <th>ID</th>
                          <th>Amount(BTC)</th>
                          <th>Status</th>
                          <th>Date</th>
                          </thead>
                          <tbody>
                          <?php $i = 1; ?>
                          @foreach($message as $item)
                              <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$item->amountf}}</td>
                                  <td>
                                                    @if($item->status==0)
                                                        <span class="btn btn-primary">
                                                                WAITING
                                                                </span>
                                                    @elseif($item->status==1)
                                                        <span class="btn btn-info">
                                                                PENDING
                                                                 </span>
                                                    @elseif($item->status==100)
                                                        <span class="btn btn-success">
                                                                SUCCESSFUL
                                                                 </span>
                                                    @else
                                                    <span class="btn btn-danger">
                                                                FAILED
                                                                 </span>
                                                    @endif
                                                </td>
                                  <td>{{$item->created_at}}</td>

                              </tr>
                              <?php $i++; ?>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Transaction History</h4>
                  <p class="card-category">Online transactions only Top 5</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Amount</th>
                      <th>Credit</th>
                      <th>Status</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                      <!-- <tr>
                        <td>1</td>
                        <td>$36,738</td>
                        <td>40,000</td>
                          <td>successful</td>
                          <td>Today</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Minerva Hooper</td>
                        <td>$23,789</td>
                          <td>successful</td>
                          <td>Curaçao</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Sage Rodriguez</td>
                        <td>$56,142</td>
                          <td>successful</td>
                          <td>Netherlands</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Philip Chaney</td>
                        <td>$38,735</td>
                          <td>successful</td>
                          <td>Korea, South</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Top Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_trans') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select Method</label>
                            <select name="type" class="form-control" required>
                                <option>--Select Option--</option>
                                <option value="online">Online => (Coin Transfer, Barcode Scanning, etc...)</option>
                                <option value="offline" disabled>Ofline => ()</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="credit" class="col-form-label">Add Credit</label>
                            <input type="number" step="1" min="500" class="form-control" placeholder=" " name="amount"  required>
                        </div>
                        <p><font color="red">Note : Currency is in USD </font> </p>
                        <div class="right-w3l text-center">
                            <button type="submit" class="btn  btn-success center-block" >
                                Top Up
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
      @endsection

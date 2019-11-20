@extends('layouts.back')

@section('content')
    <div class="content">
        @if(session()->get('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Top Up Account --&raquo;</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" data-toggle="tab">
                                                <i class="material-icons">sync_problem</i>
                                                <button type="button" class="btn  btn-sm btn-secondary" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                                                    Top Up
                                                </button>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">

                                <div class="tab-pane active" id="profile">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Method</th>
                                        <th>Amount(BTC)</th>
                                        <th>Received</th>
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                         @role('admin') 
                                         <th>Wallet</th>
                                        <th>Action</th>
                                         @endrole 
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($trans as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td> Token Conversion </td>
                                                <td>{{$item->amountf}}</td>
                                                <td>{{$item->received}}</td>
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

                                                <td>
                                                    @if($item->payment=='pending')
                                                        <span class="btn btn-primary">
                                                                PENDING
                                                                </span>
                                                    @elseif($item->payment=='completed')
                                                        <span class="btn btn-success">
                                                                COMPLETED
                                                                 </span>
                                                    @else
                                                    <span class="btn btn-danger">
                                                                FAILED
                                                                 </span>
                                                    @endif
                                                </td>

                                                <td> {{$item->created_at}} </td>
                                                @role('admin')
                                                <td>
                                                {{$wallet}}
                                                </td>

                                                <td>
                                                    <a href="{{route('accept_payment',['id' => $item->id])}}" >
                                                    <button class="btn btn-xs btn-success">Confirmed</button>
                                                    </a>
                                                </td>
                                                @endrole
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="{{$trans->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo; PREV</span>
                                                </a>
                                            </li>

                                            <li class="page-item">
                                                <a class="page-link" href="{{$trans->nextPageUrl()}}" aria-label="Next">
                                                    <span aria-hidden="true">Next &raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ---other--- -->
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
                            <input type="number" step="1" min="5" class="form-control" placeholder=" " name="amount"  required>
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

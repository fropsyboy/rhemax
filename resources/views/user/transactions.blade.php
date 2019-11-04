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
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" data-toggle="tab">
                                                <i class="material-icons">attach_money</i>
                                                <button type="button" class="btn  btn-sm btn-secondary" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                                                    Payment Details
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
                                        <th>Amount</th>
                                        <th>Credit</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        @role('admin')
                                        <th>Action</th>
                                        @endrole
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($trans as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td> Offline Method </td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->credit}}</td>
                                                <td>
                                                    @if($item->status=='pending')
                                                        <span class="btn btn-primary">
                                                                {{strtoupper($item->status)}}
                                                                </span>
                                                    @elseif($item->status=='successful')
                                                        <span class="btn btn-success">
                                                                {{strtoupper($item->status)}}
                                                                 </span>
                                                    @else
                                                        <span class="btn btn-danger">
                                                                {{strtoupper($item->status)}}
                                                                 </span>
                                                    @endif
                                                </td>
                                                <td> {{$item->created_at}} </td>
                                                @role('admin')
                                                <td>
                                                    <button class="btn btn-xs btn-danger">Delete</button>
                                                    <button class="btn btn-xs btn-success">Accept</button>
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
                                <option value="online" disabled>Online => (Master Card, Verve, etc...)</option>
                                <option value="offline">Offline => (Bank Payment, Transfer, etc...)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="credit" class="col-form-label">Add Credit</label>
                            <input type="number" step="1" min="500" class="form-control" placeholder=" " name="credit"  required="">
                        </div>
                        <p><font color="red">Note : 2 Naira per unit </font> </p>
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

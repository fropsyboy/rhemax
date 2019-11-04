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
                                    <span class="nav-tabs-title">System Users:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link active" href="#profile" data-toggle="tab">--}}
{{--                                                <i class="material-icons">done_all</i> All Users--}}
{{--                                                <div class="ripple-container"></div>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                        <li class="nav-item">
                                            <a class="nav-link " href="#" data-toggle="tab">
                                                <i class="material-icons">input</i>
                                                <button type="button" class="btn  btn-sm btn-secondary" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                                                    Add Credit
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
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Credit</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($users as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item->name}}  {{$item->lname}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->credit}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    <a href="{{route('user_trans',['id' => $item->id])}}" >
                                                    <button class="btn btn-success btn-sm">
                                                        view
                                                    </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="{{$users->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo; PREV</span>
                                                </a>
                                            </li>

                                            <li class="page-item">
                                                <a class="page-link" href="{{$users->nextPageUrl()}}" aria-label="Next">
                                                    <span aria-hidden="true">NEXT &raquo;</span>
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
                    <form action="{{ route('add_credit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select User</label>
                            <select name="user" class="form-control" required>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}  {{$user->lname}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Add Credit</label>
                            <input type="number" step="0.01" class="form-control" placeholder=" " name="credit"  required="">
                        </div>
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

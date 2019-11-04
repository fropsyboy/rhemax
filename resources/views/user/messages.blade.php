@extends('layouts.back')

@section('content')
<div class="content">
    @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        @if(session()->get('dnd'))
            <div class="alert alert-info">
                {{ session()->get('dnd') }}
            </div>
        @endif
        @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                  <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Messages:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">done_all</i> sent
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                        <i class="material-icons">close</i> failed
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
                                  <th>Sender</th>
                                  <th>Pages</th>
                                  <th>Message</th>
                                  <th>Credit</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($message as $item)
                                  <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->sender}}</td>
                                    <td>{{$item->page}}</td>
                                    <td>{{ str_limit($item->message, $limit = 30, $end = '...') }}</td>
                                    <td>{{$item->credit}}</td>
                                      <td>
                                          <a href="{{route('messages',['iden' => $item->id])}}" >
                                              <button class="btn btn-success btn-sm">view</button>
                                          </a> &nbsp;
                                          {{--                                          <button class="btn btn-primary btn-sm">Resend</button>--}}
                                      </td>
                                  </tr>
                                  <?php $i++; ?>
                                    @endforeach
                                </tbody>
                          </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="{{$message->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo; PREV</span>
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="{{$message->nextPageUrl()}}" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                    </div>


{{--                        ----third start-----}}


                        <div class="tab-pane" id="settings">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>S/N</th>
                                <th>Sender</th>
                                <th>Pages</th>
                                <th>Massage</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($failed as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->sender}}</td>
                                        <td>{{$item->page}}</td>
                                        <td>{{ str_limit($item->message, $limit = 30, $end = '...') }}</td>
                                        <td>
                                            <a href="{{route('messages',['iden' => $item->id])}}" >
                                            <button class="btn btn-success btn-sm">view</button>
                                            </a>
                                                &nbsp;
{{--                                            <button class="btn btn-primary btn-sm">Retry</button>--}}
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="{{$failed->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo; PREV</span>
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="{{$failed->nextPageUrl()}}" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                </div>
              </div>
              </div>
                <br><br>

{{--                new Card--}}
                @if($count > 0)
                <div class="card">
                    <div class="card-header card-header-tabs card-header-danger">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Message Information </span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-toggle="tab">
                                            <i class="material-icons">input</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sender Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{$details->sender}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your SMS <b>NUMBERS</b> here</label>
                                    <div class="form-group">
                                        <select class="form-control" readonly="">
                                            @foreach(unserialize($details->numbers) as $leader)
                                            <option>{{$leader}}</option>
                                            @endforeach
                                        </select>
{{--                                        <textarea rows="2" class="form-control" name="numbers" readonly>{{ $details->numbers }}</textarea>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationTextarea"> Your SMS <B>MESSAGE</B> here</label>
                                    <div class="form-group">
                                        <textarea rows="5"  class="form-control is-invalid" id="validationTextarea" name="message" readonly> {{$details->message}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
                @endif

{{--                end new card--}}
            </div>

            <!-- ---other--- -->
            <div class="col-md-5">
              <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">New Compose </span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                    <i class="material-icons">input</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{route('send_message')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sender Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="" required>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Select <b>CONTACT</b> list</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="custom-select" name="list" id="inputGroupSelect01">--}}
{{--                                <option class="form-control" value="" >Office Contacts </option>--}}
{{--                                <option class="form-control" value="" >Church Contacts </option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12">
                    <div class="form-group">
                            <label>Enter your SMS <b>NUMBERS</b> here</label>
                            <div class="form-group">
                                <label class="bmd-label-floating"> 23407645535,234807763535,234807763535</label>
                                <textarea rows="2" class="form-control" name="numbers" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationTextarea">Enter your SMS <B>MESSAGE</B> here</label>
                            <div class="form-group">
                                <label class="bmd-label-floating"> Welcome!!! this is a placeholder, click and type your message</label>
                                <textarea rows="5"  class="form-control is-invalid" id="validationTextarea" name="message" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Message Send</button>
                    <div class="clearfix"></div>
                    </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection

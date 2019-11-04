@extends('layouts.back')

@section('content')
<div class="content">
    @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->get('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="{{route('update')}}" method="post">
                      @csrf
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control" value="{{$user->name}}" name="name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" value="{{$user->lname}}" name="lname">
                        </div>
                      </div>
                    </div>
                      <br><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email Address</label>
                          <input type="text" class="form-control" value="{{$user->email}}" readonly>
                        </div>
                      </div>
                    </div>
                      <br><br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city" value="{{$user->city}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" class="form-control" name="state" value="{{$user->state}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" class="form-control" value="+234" readonly>
                        </div>
                      </div>
                    </div>
                      <br><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> You can add a little introduction about yourself here...</label>
                            <textarea class="form-control" rows="5" name="about">{{$user->about}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      @endsection

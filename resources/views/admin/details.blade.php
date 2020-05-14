@extends('layouts.back')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


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
                  <h4 class="card-title">Edit Write Ups</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('update_write')}}" method="post">
                      @csrf
                      
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" value="{{$write->title}}" name="title" >
                        </div>
                      </div>

                     <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type</label>
                          <input type="text" class="form-control" value="{{$write->type}}" disabled>
                          <input type="hidden" class="form-control" value="{{$write->id}}" name="id" >
                        </div>
                      </div> 

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select name="status" class="form-control " >
                               <option>active</option>
                               <option>disable</option>
                            </select>
                        </div>
                      </div>

                    </div>
                      <br><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="body" rows="5" id="summernote">
                          {{$write->body}}
                             </textarea>
                        </div>
                      </div>
                     
                     
                      <br><br>
                   
                    <button type="submit" class="btn btn-primary pull-right">Update Write up</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
        ]
      });
    </script>
      @endsection

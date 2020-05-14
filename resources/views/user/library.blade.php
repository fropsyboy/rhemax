@extends('layouts.back')

@section('content')
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <!-- <span class="nav-tabs-title">Users Transactions:</span> -->
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                                <i class="material-icons">playlist_add</i>My Library
                                                <div class="ripple-container"></div>
                                        </li>
                                        &nbsp;&nbsp;&nbsp;

                                        

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
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($write_ups as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item->title}}  </td>
                                                <td>{{$item->type}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    <a href="{{route('view_readlib',['id' => $item->id])}}" >
                                                    <button class="btn btn-success btn-sm">
                                                        Read
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
                                            <a class="page-link" href="{{$write_ups->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo; PREV</span>
                                                </a>
                                            </li>

                                            <li class="page-item">
                                            <a class="page-link" href="{{$write_ups->nextPageUrl()}}" aria-label="Next">
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

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Top Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_write') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Select Type</label>
                            <select name="type" class="form-control " required>
                               <option>Library</option>
                               <option>Skills</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Title</label>
                            <input type="text"  class="form-control" placeholder=" " name="title"  required="">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="5" id="summernote">
                             </textarea>
                        </div>
                        <div class="right-w3l text-center">
                            <button type="submit" class="btn  btn-success center-block" >
                                Save Write Up
                            </button>
                        </div>

                    </form>
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

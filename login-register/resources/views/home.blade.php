@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hi {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div align="right">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Add
                        </button>
                    </div>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">Id</th>
                            <th width="35%">Full Name</th>
                            <th width="35%">Address</th>
                            <th width="30%">Action</th>
                        </tr>

                        @foreach($alldata as $data)
                        <tr>
                           
                            <td>{{$data['id']}}</td>
                            <td>{{$data['full_name']}}</td>
                            <td>{{$data['address']}}</td>
                            <td>
                               
                                <a href="#" class="btn btn-primary">Show</a>
                                <a href="{{ url('edit') }}/{{$data['id']}}" class="btn btn-warning">Edit</a>
                               
                                <a href="{{ url('delete') }}/{{$data['id']}}"  class="btn btn-danger">Delete</a>
                               
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-4 text-right">Enter Full Name</label>
                        <div class="col-md-8">
                            <input type="text" name="full_name" class="form-control input-lg" />
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control input-lg" />
                            <input type="hidden" name="user_email" value="{{ Auth::user()->email }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <label class="col-md-4 text-right">Enter Full Address</label>
                        <div class="col-md-8">
                            <input type="text" name="address" class="form-control input-lg" />
                        </div>
                    </div>
                    <br />
                    <br />
                    <br />
                    <!-- <div class="form-group">
                        <label class="col-md-4 text-right">Select Profile Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image"/>
                        </div>
                    </div> -->
                    <br /><br /><br />
                   <button>Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-4 text-right">Enter Full Name</label>
                        <div class="col-md-8">
                            <input type="text" name="full_name" class="form-control input-lg" />
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control input-lg" />
                            <input type="hidden" name="user_email" value="{{ Auth::user()->email }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div class="form-group">
                        <label class="col-md-4 text-right">Enter Full Address</label>
                        <div class="col-md-8">
                            <input type="text" name="address" class="form-control input-lg" />
                        </div>
                    </div>
                    <br />
                    <br />
                    <br />
                    <!-- <div class="form-group">
                        <label class="col-md-4 text-right">Select Profile Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image"/>
                        </div>
                    </div> -->
                    <br /><br /><br />
                   <button>Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
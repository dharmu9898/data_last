@extends('layouts.usersidebar')
@section('content')
<!-- <div class="container-fluid">    -->




<div class="container">
<div class="row" style="margin-left: 200px;">
<div class="col-xl-2 col-md-2 col-0 col-lg-2 col-sm-0"> </div>

<div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 tab1">
                      {{-- messsage pop up open --}}
                      @if(session()->get('success'))
                      <div class="alert alert-success col-xl-9 col-9 col-sm-10 col-lg-10 col-md-10">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          {{ session()->get('success') }}
                      </div>
                  @endif
                  <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10">
                      @if(session()->get('danger'))
                          <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              {{ session()->get('danger') }}
                          </div>
                      @endif
                  </div>
                  @if(count($errors) > 0)
                      <div class="row">
                          <div class="col-xl-10 col-12 col-sm-10 col-lg-10 col-md-10 error">
                              <ul>
                                  @foreach($errors->all() as $error)
                                  <div class="alert alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                  <p class="text-center"> {{$error}}</p>
                          </div>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  {{-- messsage pop up close --}}
                               <div class="container">
                                  <div class="col-xl-12">
                                    <div class="row">
                                      <div class="col-12">
                                          <div class="card">
                                            <div class="card-header bg-dark text-white fa fa-user"> &nbsp; Send Mail to Operator</div>
                                            <div class="card-body shadow" style="border-bottom:3px solid red;">
                                                <form method="get" action="{{url('user/operatorSendMail/send')}}" enctype="multipart/form-data">
                                              @csrf
                                          
                                            <div class="form-group">
                                                <label for="email">From </label>
                                                <input type="email" class="form-control"  name="email" value="{{ Auth::user()->email }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="emails">  </label>
                                                <input type="hidden" class="form-control"    name="emails" value="{{ $data->operatoremail }}" />
                                            </div>
                                            <input type="hidden" value="{{$data->email}}">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control" name="message" rows="4">


                                                    </textarea>
                                                  </div>
                                            </div>
                                              <button type="submit" class="btn btn-outline-primary fa fa-envelope float-right"> &nbsp;Send mail</button>
                                              <td><a href="{{ url()->previous() }}" class="btn btn-outline-primary fa fa-arrow-left float-right mr-2"> &nbsp; Back</a> </td>
                                        </form>
                                            </div>
                                          </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div>
                            </div>
                          </div>
      <div>
    </div>
  </div>

@endsection


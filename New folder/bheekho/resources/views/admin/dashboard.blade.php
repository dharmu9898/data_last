@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading text-center"><strong style="font-size: 25px;">Admin Dashboard </strong></div>
               <br>
              
                <div class="panel-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">

                         <!-- Social Revolutionaries Count -->
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">               
                            <div class="card-body">
                             <div class="row">
                              <div class="col">
                               <h5 class="card-title text-uppercase text-muted mb-0">Social Revolutionaries Count</h5>
                               <span class="h2 font-weight-bold mb-0">{{ count($social_revolutionaries) }}</span>
                                </div>                
                            </div>                  
                            </div>
                        </div>
                        </div>
                           <!-- Social Members Count -->
                           <div class="col-xl-5 col-md-6">
                        <div class="card card-stats">                
                            <div class="card-body">
                             <div class="row">
                              <div class="col">
                               <h5 class="card-title text-uppercase text-muted mb-0">Social Members Count</h5>
                               <span class="h2 font-weight-bold mb-0">{{ count($socialmembers) }}</span>
                                </div>                
                            </div>                  
                            </div>
                        </div>
                        </div>
                        <!-- Request Count -->
                        <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">                
                            <div class="card-body">
                             <div class="row">
                              <div class="col">
                               <h5 class="card-title text-uppercase text-muted mb-0" style="">Total Request Count</h5>
                               <span class="h2 font-weight-bold mb-0">{{ count($request) }}</span>
                                </div>                
                            </div>                  
                            </div>
                        </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12  text-center">
            <div class="card">
                <div class="card-header"><strong style="font-size: 25px;">Choose your role as Who you want to Join.</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <a href="{{route('socialrevolutionaries.selectrole' , Auth::user()->id) }}" class="btn btn-primary" style="font-size: 20px;">Join as Social Revolutionaries</a><br><br>
                    <div class="text-center"><strong>OR</strong></div>
                    <br>
                    <a href="{{route('socialmember.selectrole', auth::user()->id)}}" class="btn btn-primary" style="font-size: 20px;">I want to Get Help !</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

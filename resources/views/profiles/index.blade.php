@extends('layouts.app')

@section('content')
<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                      @foreach($users->chunk(2) as $profiles)
                      <div class="row">
	                      	@foreach($profiles as $user)
	                      	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_details">
	                        <div class="well profile_view">
	                          <div class="col-sm-12">
	                            <h4 class="brief"><i>Computer Science</i></h4>
	                            <div class="left col-xs-7">
	                              <h2>{{ $user->profile->name }}</h2>
	                              <p><strong>Username: {{ $user->username }}</strong></p>
	                              <ul class="list-unstyled">
	                                <li>Gender: {{ $user->profile->gender }}</li>
	                                <li>Status: {{ $user->profile->status }}</li>
	                              </ul>
	                            </div>
	                            <div class="right col-xs-5 text-center">
	                              <img src="{{ $user->profile->photo->path }}" alt="" class="img-circle img-responsive" height="200" width="200">
	                            </div>
	                          </div>
	                          <div class="col-xs-12 bottom text-center">
	                            <div class="col-xs-12 col-sm-6 pull-right">
	                              <a href="{{ route('profile.show', $user->username) }}" class="btn btn-success pull-right">
	                                <i class="fa fa-user"> </i> View Profile
	                              </a>
	                            </div>
	                          </div>
	                        </div>
	                      </div>	
	                      @endforeach
                      </div>
                      @endforeach
                  </div>
                </div>
              </div>
            </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="" id="root">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ $profile->user->username }}</h3>

                      <ul class="list-unstyled user_data">
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>
                      </ul>

                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Basic Info</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">About me</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contribution</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start Basic Info -->
                            <ul class="list-group">
                              <li class="list-group-item">
                              <h2>
                              <label class="col-2 col-form-label">Name: </label>
                              <span id="profileName">{{ $profile->name }}</span>
                              @can('update', $profile)
                              <a @click="updateName({{ $profile->id }})" class="btn btn-default pull-right" style="margin-top: -5px;">Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
                              @endcan
                              </h2>
                              </li>
                              <li class="list-group-item">
                              <h2>
                              <label class="col-2 col-form-label">Date of Birth: </label>
                              <span id="profileDob">{{ $profile->dob->toFormattedDateString() }}</span>
                              @can('update', $profile)
                              <a @click="updateDob({{ $profile->id }})" class="btn btn-default pull-right" style="margin-top: -5px;">Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
                              @endcan
                              </h2>
                              </li>
                              <li class="list-group-item">
                              <h2>
                              <label class="col-2 col-form-label">Gender: </label>
                              <span id="profileGender">{{ $profile->gender }}</span>
                              @can('update', $profile)
                              <a class="btn btn-default pull-right" data-toggle="modal" data-target="#radioForm" style="margin-top: -5px;">Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
                              @endcan
                              </h2>
                              </li>
                              <li class="list-group-item">
                              <h2>
                              <label class="col-2 col-form-label">Status: </label>
                              <span id="profileStatus">{{ $profile->status }}</span>
                              @can('update', $profile)
                              <a data-toggle="modal" data-target="#statusModal" class="btn btn-default pull-right" style="margin-top: -5px;">Edit <i class="fa fa-cog" aria-hidden="true"></i></a>
                              @endcan
                              </h2>
                              </li>
                            </ul>
                            <!-- end Basic info -->
                            @include('profile.partials.genderModal')
                            @include('profile.partials.statusModal')
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start about me -->
                            <ul class="list-group">
                              <li class="list-group-item">
                              <h2>
                                {{ $profile->bio }}
                              </h2>
                              </li>
                            </ul>
                            <!-- end about me -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <!-- start of contribution -->
                            
                            <!-- end fo contribution -->
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

@section('foot')
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/bootbox.min.js') }}"></script>
<!-- <script src="{{ asset('js/moment.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script>
    $(document).ready(function () {
        
        var app = new Vue({
          el: '#root',
          methods : {
              updateName : function(id){
                        bootbox.prompt({
                          title: 'Enter new Name',
                          inputType: 'text',
                          callback: function (result) {
                              if (result) {
                                axios.patch('/profiles/'+id,{
                                  name : result
                                })
                                  .then(function (response) {
                                      $('#profileName').html(result);
                                  })
                                  .catch(function (error) {
                                    console.log(error);
                                  });
                              }
                          }
                      });
                  },

              updateDob : function(id){
                        bootbox.prompt({
                          title: 'Enter new Date of Birth',
                          inputType: 'date',
                          callback: function (result) {
                              if (result) {
                                axios.patch('/profiles/'+id,{
                                  dob : result
                                })
                                  .then(function (response) {
                                      $('#profileDob').html(moment(result).format('MMM D, YYYY')); 
                                  })
                                  .catch(function (error) {
                                    console.log(error);
                                  });
                              }
                          }
                      });
                  },

              updateGender: function(id){
                      choice = $('input[type=radio][name=gender]:checked').val();
                      if (choice != null) {
                        choice == 'Female' ? gender = false : gender = true;
                      }
                      if (choice != null) {
                                axios.patch('/profiles/'+id,{
                                  gender : gender
                                })
                                  .then(function (response) {
                                      $('#profileGender').html(choice);
                                      $('#radioForm').modal('toggle');
                                  })
                                  .catch(function (error) {
                                    console.log(error);
                                  });
                        }
                  },

                  updateStatus: function(id){
                      choice = $('input[type=radio][name=gender]:checked').val();
                      if (choice != null) {
                                axios.patch('/profiles/'+id,{
                                  status : choice
                                })
                                  .then(function (response) {
                                      $('#profileStatus').html(choice);
                                      $('#statusModal').modal('toggle');
                                  })
                                  .catch(function (error) {
                                    console.log(error);
                                  });
                        }
                  }
              
              

              }


        });
      
});
 </script>
@endsection
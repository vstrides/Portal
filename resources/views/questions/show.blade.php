@extends('layouts.app')
@section('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" />
@endsection
@section('content')
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{ $question->category->title }}</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="row">
                      <div class="col col-lg-8">
                        <h2>{{ $question->title }}</h2>
                      </div>
                      <div class="col col-lg-4">
                        <h5 class="pull-right">Asked by <a href="#">{{ $question->user->name }}</a> {{ $question->created_at->diffForHumans() }}</h5>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <p>
                        <h4>{!! $question->body !!}</h4>
                      </p>
                  <hr style="margin-bottom: 3px;">
                  <div class="row">
                        @foreach($question->tags as $tag)
                          <a href="#" class="btn btn-default btn-round">{{ $tag->title }}</a>
                        @endforeach
                  </div>
                  <hr style="margin-top: 1px;">
	                  <div class="row">
	                  	<div class="btn-group">
	                      <button type="button" class="btn btn-success"><i class="fa fa-chevron-up"></i></button>
	                      <button type="button" class="btn btn-success"><span class="badge">234</span></button>
	                      <button type="button" class="btn btn-success"><i class="fa fa-chevron-down"></i></button>
	                    </div>
	                    <div class="btn-group" style="padding-left: 10px;">
	                      <button type="button" class="btn btn-success">Views <span class="badge">234</span></button>
	                    </div>
	                    <div class="btn-group" style="padding-left: 10px;">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#answersModal">Answer <i class="fa fa-pencil"></i></button>
	                    </div>
	                    <ul class="nav navbar-right panel_toolbox">
	                    	  <li><a><i class="fa fa-share fa-lg"></i></a></li>
		                      <li><a><i class="fa fa-edit fa-lg"></i></a></li>
		                      <li><a><i class="fa fa-trash fa-lg"></i></a></li>
                    	</ul>
	                  </div>
                  </div>
                </div>
                @include('partials.answer_form')
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="row">
                      <div class="col col-lg-8">
                        <h1>Answers</h1>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <ul class="list-group">
                          @foreach($question->answers as $answer)
                          <li class="list-group-item">
                            <div class="row">
                              <ul class="list-unstyled msg_list" style="width: 100%;">
                                <li>
                                  <a>
                                    <span class="image">
                                      <img src="/images/img.jpg" alt="img" />
                                    </span>
                                    <span>
                                      <span>{{ $answer->user->name }}</span>
                                      <span class="time">{{ $answer->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                      
                                    </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                            <div class="row" style="margin-top: 5px; margin-bottom: 10px; margin-left: -2px; margin-right: -2px;">
                              {!! $answer->body !!}
                            </div>
                            <div class="row" style="margin-left: -2px; margin-right: -2px;">
                              <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-chevron-up"></i></button>
                                <button type="button" class="btn btn-success btn-sm">234</button>
                                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-chevron-down"></i></button>
                              </div>
                              <div class="btn-group" style="padding-left: 10px;">
                                <button type="button" class="btn btn-success btn-sm">Views | 234</button>
                              </div>
                              <div class="btn-group" style="padding-left: 10px;">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{ $answer->id }}commentModal">
                                  Comment <i class="fa fa-commenting" aria-hidden="true"></i>
                                </button>
                                <button 
                                  data-toggle="collapse" 
                                  type="button" 
                                  data-target="#{{ $answer->id }}Comments"
                                  class="btn btn-success btn-sm" 
                                  aria-expanded="false" 
                                  aria-controls="{{ $answer->id }}Comments">
                                  <i class="fa fa-chevron-down"></i>
                                </button>
                              </div>
                              <ul class="nav navbar-right panel_toolbox">
                                  <li><a><i class="fa fa-share fa-lg"></i></a></li>
                                  <li><a><i class="fa fa-edit fa-lg"></i></a></li>
                                  <li><a><i class="fa fa-trash fa-lg"></i></a></li>
                              </ul>
                            </div>
                            @include('partials.comments_form')
                            <!-- Comment Section -->
                            <div class="collapse" id="{{ $answer->id }}Comments" style="padding-top: 10px;">
                              @foreach($answer->comments as $comment )
                                <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $comment->user->name }}
                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    </h4>
                                    {{ $comment->body }}
                                </div>
                              </div>
                              @endforeach
                            </div>
                            <!-- End of Comment Section -->
                    </li>
                    @endforeach
                      </ul>  
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('foot')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
    $(document).ready(function () {
        let data = {
          photoPaths: []
        };

        var app = new Vue({
          el: '#root',
          data: data
        });

        tinymce.init({
            selector: '#answer_body',
            theme: 'modern',
            height: 190,
            plugins: [
                'advlist link image lists spellchecker wordcount code media textcolor'
              ],
            content_css: 'css/content.css',
            toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor | code',
            menubar : ''
        });

        // Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
          }
        });
      
        Dropzone.options.photoUploadForm = {
          paramName: 'photo',
          maxFilesize: 3,
          acceptedFiles: '.jpg, .jpeg, .png, .bmp',
          dictDefaultMessage: 'Drop images to upload',
          init: function() {
            this.on("success", function(file, response) { 
                data.photoPaths.push(response);
            });
          }
        };

         $("[data-toggle=tooltip]").tooltip();
});
 </script>
@endsection
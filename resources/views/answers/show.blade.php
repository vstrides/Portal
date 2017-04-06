@extends('layouts.app')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('content')
@inject('question', 'App\Question')
<div class="" id="root">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <div class="row">
            <div class="col col-lg-8">
              <h4><a href="{{ route('questions.show', $answer->question->id) }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Question</a></h4>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="row">
                    <ul class="list-unstyled msg_list" style="width: 100%;">
                      <li>
                        <a>
                          <span class="image">
                            <img src="/images/img.jpg" alt="img" />
                          </span>
                          <span>
                            <span>{{ $answer->user->username }}</span>
                            <span class="time">{{ $answer->created_at->toFormattedDateString() }}</span>
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
                      <button 
                        type="button"
                        class="btn btn-success btn-sm" 
                        @click="Vote('{{ route('answer.votes',$answer->id) }}', true, {{$answer->id}})">
                        <i class="fa fa-chevron-up"></i></button>
                      <button type="button" id="{{ $answer->id }}voteBtn" class="btn btn-success btn-sm">
                      {{ $answer->getVotes() }}</button>
                      <button type="button" class="btn btn-success btn-sm" @click="Vote('{{ route('answer.votes',$answer->id) }}', false, {{$answer->id}})">
                      <i class="fa fa-chevron-down"></i></button>
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
                        @can('update', $answer)
                        <li value="{{ $answer->id }}" id="aupdatebtnlink">
                        <a id="aupdatebtn" @click="update({{$answer->question->id}},{{$answer->id}})">
                        <i class="fa fa-edit fa-lg"></i></a></li>
                        @endcan
                        @can('delete', $answer)
                        <li id="adeletebtnlink" value="{{ $answer->id }}"><a id="adeletebtn"><i class="fa fa-trash fa-lg"></i></a></li>
                        @endcan
                    </ul>
                  </div>
                  @include('partials.answer_form')
                  @include('partials.comments_form')
                  <!-- Comment Section -->
                  <div class="collapse" id="{{ $answer->id }}Comments" style="padding-top: 10px;">
                    @foreach($answer->comments()->latest('created_at')->get() as $comment )
                      <div class="media">
                      <a class="pull-left" href="#">
                          <img class="media-object" src="http://placehold.it/64x64" alt="">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading">{{ $comment->user->username }}
                              <small>{{ $comment->created_at->diffForHumans() }}</small>
                          </h4>
                          {{ $comment->body }}
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- End of Comment Section -->
              </li>
            </ul>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('foot')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/bootbox.min.js') }}"></script>
<script>
    $(document).ready(function () {
        tinymceConfig = {
            selector: '#answer_body',
            theme: 'modern',
            height: 190,
            plugins: [
                'advlist link image lists spellchecker wordcount code media textcolor'
              ],
            content_css: 'css/content.css',
            toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor | code',
            menubar : ''
        };
        
        tinymce.init(tinymceConfig);
        
        let data = {
          photoPaths: []
        };

        var app = new Vue({
          el: '#root',
          data: data,
          methods : {
              Vote : function(url, status, id){
                        axios.post(url, {
                          status: status,
                        })
                        .then(function (response) {
                          console.log(response);
                          document.getElementById(id+'voteBtn').innerHTML = response.data;
                        })
                        .catch(function (error) {
                          console.log(error);
                        });
                  },
              update : function(qid, id){
                        axios.get('/answers/'+id+'/edit')
                                    .then(function (response) {
                                      tinyMCE.activeEditor.setContent(response.data);
                                      $('#myModalLabel').html('Edit your answer');
                                      $('#aForm').attr('action', '/answers/'+id)
                                      $('#aForm').append('<input name="_method" type="hidden" value="PATCH">');
                                      $('#abtn').html('Update Answer');
                                      $('#a_qid').val(qid);
                                    })
                                    .catch(function (error) {
                                      console.log(error);
                                    });
                        $('#answersModal').modal('show');
                  }
              }
        });
        

        // Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
          }
        });

      
        $(document).on("click", "#adeletebtn", function(e) {
            bootbox.confirm({
                title: "Delete Answer",
                message: "Are you sure ?",
                size: 'small',
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-arrow-left"></i> Cancel',
                        className: 'btn-success'
                    },
                    confirm: {
                        label: '<i class="fa fa-trash"></i> Confirm',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                      if(result){
                        id = document.getElementById('adeletebtnlink').value;
                        axios.delete('/answers/'+id)
                        .then(function (response) {
                          console.log(response.data);
                          window.location.replace(response.data);
                        })
                        .catch(function (error) {
                          console.log(error);
                        });
                      }
                }
            });
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

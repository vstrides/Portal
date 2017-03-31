@extends('layouts.app')
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
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
@extends('layouts.app')

@section('content')

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tags</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <tbody>
                      @foreach($tagsdata->chunk(5) as $tags)
                        <tr>
                        @foreach($tags as $tag)
                          <td>{{ $tag->title }}<span class="badge pull-right">{{ $tag->question_count }}</span></td>
                        @endforeach
                        </tr>
                       @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>


@endsection
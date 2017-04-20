@extends('layouts.app')

@section('content')
  <div class="x_panel">
    <div class="x_title">
      <h2>Cateogries</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table table-bordered">
        <tbody>
        @foreach($categoriesdata->chunk(5) as $categories)
          <tr>
          @foreach($categories as $category)
            <td>{{ $category->title }}<span class="badge pull-right">{{ $category->question_count }}</span></td>
          @endforeach
          </tr>
         @endforeach
        </tbody>
      </table>

    </div>
  </div>
@endsection
      <div class="form-group">
      {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Your Question']) !!}
      </div>
      
      <div class="form-group">
      {!! Form::select('category_id', $categories, null,[ 'id' => 'sel1','class' => 'form-control', 'placeholder' => 'Categorize Question']) !!}
      </div>
      
      <div class="form-group">
      {!! Form::select('tags[]', $tags, $question->tags->pluck('id')->toArray() ,[ 'id' => 'sel2','class' => 'select2_multiple form-control', 'multiple' => true]) !!}
      </div>
      <div class="form-group">
        <ul class="list-group">
            <li class="list-group-item" v-for="photoPath in photoPaths">@{{ photoPath }}</li>
        </ul>
      </div>
      <div class="form-group">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'question_body', 'placeholder' => 'Describe your Question']) !!}
      </div>

      <div class="form-group">
          {!! Form::submit($submitButton, ['class' => 'btn btn-success']) !!}
      </div>
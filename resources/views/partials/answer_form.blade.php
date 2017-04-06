<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="answersModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Submit Your Answer</h4>
      </div>
      
      <div class="modal-body">
        @include('partials.image_upload')
        
        {!! Form::open([
          'route' => 'answers.store', 
          'style' => 'padding-top: 10px;',
          'id' => 'aForm'
          ]) !!}

            <div class="form-group">
              <ul class="list-group">
                  <li class="list-group-item" v-for="photoPath in photoPaths">@{{ photoPath }}</li>
              </ul>
            </div>

            <input type="hidden" id="a_qid" name="question_id" value="{{ $question->id }}">
            
            <div class="form-group">
              {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'answer_body']) !!}
            </div>

          {!! Form::close() !!}

          <button type="button" id="abtn" class="btn btn-success" onclick="event.preventDefault();document.getElementById('aForm').submit();">Post Answer</button>
      </div>
    </div>
  </div>
</div>
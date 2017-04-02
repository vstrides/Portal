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
            <form class="form-horizontal" id="root" action="{{ route('answers.store') }}" method="POST" style="padding-top: 10px;">
                {{ csrf_field() }}
                <div class="form-group">
                  <ul class="list-group">
                      <li class="list-group-item" v-for="photoPath in photoPaths">@{{ photoPath }}</li>
                  </ul>
                </div>
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div class="form-group">
                  <textarea placeholder="Describe your Answer..." name="body" id="answer_body" class="form-control"></textarea>
                </div>  
              </form>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="event.preventDefault();document.getElementById('root').submit();">Post Answer</button>
          </div>

        </div>
      </div>
    </div>
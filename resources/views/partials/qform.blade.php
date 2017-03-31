<div class="col-md-8 col-xs-12 col-lg-offset-2" style="margin-top: 50px;">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ask a Question</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="root">
                    <br />
                    @include('partials.image_upload')
                    <form class="form-horizontal" action="{{ route('questions.store') }}" method="POST" style="padding-top: 10px;">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Your Question" name="title">
                      </div>
                      <div class="form-group">
                          <select class="form-control select2_multiple" id="sel1" name="category_id">
                            <option></option>
                            @foreach($categories as $category => $value)
                            <option value="{{ $category }}">{{ $value }}</option>
                            @endforeach
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <select class="select2_multiple form-control" multiple="multiple" id="sel2" name="tags[]">
                            @foreach($tags as $tag => $value)
                            <option value="{{ $tag }}">{{ $value }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="photoPath in photoPaths">@{{ photoPath }}</li>
                        </ul>
                      </div>
                      <div class="form-group">
                        <textarea placeholder="Describe your Question..." name="body" id="question_body" class="form-control">Is shaabi a fool ??</textarea>
                      </div>  

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success">Submit Question</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
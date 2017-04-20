<div class="col">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Latest Questions</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled timeline">
                    @foreach($questions as $question)
                    <li>
                      <div class="row grid-divider">
                        <div class="col col-lg-8 col-md-12">
                        <div class="col-padding">
                          <div class="block">
                            <div class="tags">
                              <a href="" class="tag">
                              <span>{{ $question->category->title }}</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a href="{{ route('questions.show', $question->id ) }}">{{ $question->title }}</a>
                              </h2>
                            <div class="byline">
                              <span>{{ $question->created_at->diffForHumans() }}</span> by <a href="{{ route('profile.show', $question->user->username) }}">{{ $question->user->username }}</a>
                            </div>
                              <p class="excerpt">{!! substr($question->body, 0, 300) !!}<a href="{{ route('questions.show', $question->id) }}">...&nbsp;Read&nbsp;More</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        </div>
                          
                        <div class="col col-lg-4 col-md-12">
                          <div class="col-padding">
                            <div class="row">
                            <table style="width:100%; margin-top: 10px">
                              <tr>
                                <td><center><button class="btn btn-default btn-circle btn-lg">{{ $question->views }}</button></center></td>
                                <td><center><button class="btn btn-success btn-circle btn-lg ">{{ $question->answers->count() }}</button></center></td>
                                <td><center><button class="btn btn-primary btn-circle btn-lg">{{ $question->getVotes() }}</button></center></td>
                              </tr>
                              <tr>
                                <td><center>Views</center></td>
                                <td><center>Answers</center></td>
                                <td><center>Votes</center></td>
                              </tr>
                            </table>
                          </div>
                          <div class="separator"></div>
                          <div class="row">
                            @foreach($question->tags as $tag)
                            <a href="#" class="btn btn-default btn-round">{{ $tag->title }}</a>
                            @endforeach
                          </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
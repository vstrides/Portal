<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              
                <ul class="nav navbar-nav">
                <li><a href="{{ route('questions.create') }}"><h5>Ask a question</h5></i></a></li>
                </ul>
            
              <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                  <li><a href="{{ route('login') }}"><h5>Login or Register</h5></a></li>
                @else
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{ Auth::user()->profile->photo->path }}" alt="">{{ Auth::user()->username }}
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="{{ route('profile.show', Auth::user()->username) }}">Profile<i class="fa fa-user pull-right" aria-hidden="true"></i></a></li>
                      <li><a href="javascript:;">Help<i class="fa fa-info-circle pull-right" aria-hidden="true"></i></a></li>
                      <li>
                      <a href="{{ route('logout') }}" 
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                      >
                       <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      </li>
                    </ul>
                  </li>
                </ul>
            @endif
          </nav>
      </div>
</div>
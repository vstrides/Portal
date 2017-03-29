<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-question-circle"></i>Questions</a></li>
                  <li><a href="#"><i class="fa fa-tags"></i> Tags </a></li>
                  <li><a href="#"><i class="fa fa-trophy"></i> Badges </a></li>
                  <li><a href="#"><i class="fa fa-list-ul"></i> Categories </a></li>
                  <li><a href="#"><i class="fa fa-users"></i> Users </a></li>
                </ul>
            </div>
</div>
<!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
              </a>
            </div>
            
<!-- /menu footer buttons -->
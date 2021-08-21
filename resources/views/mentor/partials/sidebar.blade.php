<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html" title="Sleek Dashboard">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>

          <span class="brand-name text-truncate">Sleek Dashboard</span>
        </a>
      </div>

      <!-- begin sidebar scrollbar -->
      <div class="" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-book-open"></i>
              <span class="nav-text">Course Management</span> <b class="caret"></b>
            </a>

            <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.course')}}">
                    <span class="nav-text">Courses Data</span>
                    
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.chapter')}}">
                    <span class="nav-text">Chapters Data</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.lesson')}}">
                    <span class="nav-text">Lessons Data</span>
                  </a>
                </li>
               
              </div>
            </ul>
          </li>

          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages2"
              aria-expanded="false" aria-controls="pages2">
              <i class="mdi mdi-cash-usd"></i>
              <span class="nav-text">Revenue</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="pages2" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.revenue')}}">
                    <span class="nav-text">Revenue</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <!-- <li class="section-title">
            Pages
          </li> -->

          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
              aria-expanded="false" aria-controls="pages">
              <i class="mdi mdi-account"></i>
              <span class="nav-text">User Management</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="pages" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.account')}}">
                    <span class="nav-text">User Profile</span>
                    
                  </a>
                </li>
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.password')}}">
                    <span class="nav-text">Change Password</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>

        

          <!-- <li class="section-title">
            Documentation
          </li> -->
        </ul>
      </div>

    
    </div>
  </aside>
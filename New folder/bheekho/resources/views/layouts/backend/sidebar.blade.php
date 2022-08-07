<nav class="sidenav navbar navbar-vertical navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="#">
          <img src="{{asset('img/brand/favicon.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">

          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <ul class="navbar-nav">
                        

                  <li class="nav-item">
                      <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="  button" aria-expanded="true" aria-haspopup="true" aria-controls="navbar-dashboards" v-pre>
                        <i class="fas fa-user-shield text-primary"></i>
                       <span class="nav-link-text">{{ Auth::user()->name }}</span>
                     </a>
              <div class="collapse" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link active" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><h2> Logout</h2></a>                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                     </form>
                  </li>
                  
                </ul>
              </div>
            </li>
                      </ul> 
          <!-- Nav items -->
          <ul class="navbar-nav">
            @if(Request::is('admin*'))
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.dashboard')}}"  role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>              
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.request.index') }}" class="nav-link active">
               <i class="fa fa-users text-primary"></i>
               <span class="nav-link-text" >Manage Requests</span>
             </a>            
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.socialrevolutionaries.index') }}" class="nav-link active">
               <i class="fa fa-user text-primary"></i>
               <span class="nav-link-text" >Manage Social Revolutionaries</span>
             </a>            
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.socialmembers.index') }}" class="nav-link active">
               <i class="fa fa-users text-primary"></i>
               <span class="nav-link-text" >Manage Social Members</span>
             </a>            
            </li>
             <li class="nav-item">
              <a href="{{ route('admin.addcategory.index') }}" class="nav-link active">
               <i class="fa fa-list text-primary"></i>
               <span class="nav-link-text" >Add Help Category</span>
             </a>            
            </li>
             @endif

             @if(Request::is('socialrevolutionaries*'))
             <li class="nav-item">
              <a class="nav-link active" href="{{route('socialrevolutionaries.dashboard')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialRevolutionaries\SocialRevolutionaryController@edit' , Auth::user()->id) }}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-edit text-primary"></i>
                <span class="nav-link-text">Update Your Profile</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialRevolutionaries\SocialRevolutionaryController@addrequest')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-paper-plane text-primary"></i>
                <span class="nav-link-text">Add New Request</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialRevolutionaries\SocialRevolutionaryController@myrequest')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-envelope-open text-primary"></i>
                <span class="nav-link-text">My Requests</span>
              </a>              
            </li>
            @endif

            @if(Request::is('socialmember*'))
             <li class="nav-item">
              <a class="nav-link active" href="{{route('socialmember.dashboard')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialMember\SocialMemberController@edit', auth::user()->id)}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-edit text-primary"></i>
                <span class="nav-link-text">Profile Update</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialMember\SocialMemberController@addrequest')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-paper-plane text-primary"></i>
                <span class="nav-link-text">Add New Request</span>
              </a>              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{action('SocialMember\SocialMemberController@othersrequest')}}" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-envelope-open text-primary"></i>
                <span class="nav-link-text">Others Requests</span>
              </a>              
            </li>
            @endif
            <!-- Footer -->
            <li class="nav-item" style="margin-top: 210px;">
              <a class="nav-link" href="http://bheekho.com/" target="_blank"  aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="fa fa-copyright"></i>
                 <span class="nav-link-text"><strong>Bheekho Foundation (2020)</strong>  All rights reserved.</span>
              </a>              
            </li>              
          </ul>    
        </div>                       
      </div>
    </div>
  </nav>


  
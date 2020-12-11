     <!-- HEADER DESKTOP-->
     <header class="header-desktop">
         <div class="section__content section__content--p30">
             <div class="container-fluid">
                 <div class="header-wrap">
                     <div class="header-button" style="position: absolute; right: 25px;">
                         <div class="account-wrap">
                             <div class="account-item clearfix js-item-menu">
                                 <div class="content">
                                     <a class="js-acc-btn" href="#" style="width: 150%;">
                                         <i class="fas fa-user" style="margin-right: 2%;"></i>
                                         {{ Auth::user()->name }}
                                     </a>
                                 </div>
                                 <div class="account-dropdown js-dropdown">
                                     <div class="info clearfix">
                                         <i class="fas fa-user" style="margin-right: 5%; position: absolute; margin-top: 7%;"></i>
                                         <div class="content" style="margin-left: 8%;">
                                             <h5 class="name">
                                                 <a href="#">{{ Auth::user()->name }}</a>
                                             </h5>
                                             <span class="email">{{ Auth::user()->email }}</span>
                                         </div>
                                     </div>
                                     <div class="account-dropdown__footer">
                                         <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                             <i class="zmdi zmdi-power"></i>Logout</a>
                                     </div>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </header>
     <!-- HEADER DESKTOP-->

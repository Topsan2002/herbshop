<div class="page-main-header" >
  <div class="main-header-right row m-0">
    <form class="form-inline search-full" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
    </div>
    <div class="left-menu-header col horizontal-wrapper pl-0">
      <ul class="horizontal-menu">
        <!-- <li class="mega-menu"><a class="nav-link" href="#"><i data-feather="layers"></i><span>Bonus Ui</span></a>
          <div class="mega-menu-container menu-content">
            <div class="container-fluid">
              <div class="row">
                <div class="col mega-box">
                  <div class="mobile-title d-none">
                    <h5>Mega menu</h5><i data-feather="x"></i>
                  </div>
                  <div class="link-section icon">
                    <div>
                      <h6>Error Page</h6>
                    </div>
                    <ul>
                      <li><a href="error-400.html">Error page 400</a></li>
                      <li><a href="error-401.html">Error page 401</a></li>
                      <li><a href="error-403.html">Error page 403</a></li>
                      <li><a href="error-404.html">Error page 404</a></li>
                      <li><a href="error-500.html">Error page 500</a></li>
                      <li><a href="error-503.html">Error page 503</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col mega-box">
                  <div class="link-section doted">
                    <div>
                      <h6> Authentication</h6>
                    </div>
                    <ul>
                      <li><a href="login.html">Login Simple</a></li>
                      <li><a href="login-image.html">Login Bg Image</a></li>
                      <li><a href="login-video.html">Login Bg video</a></li>
                      <li><a href="signup.html">Register Simple</a></li>
                      <li><a href="signup-image.html">Register Bg Image</a></li>
                      <li><a href="signup-video.html">Register Bg video</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col mega-box">
                  <div class="link-section dashed">
                    <div>
                      <h6>Usefull Pages</h6>
                    </div>
                    <ul>
                      <li><a href="search.html">Search Website</a></li>
                      <li><a href="search-video.html">Search Video</a></li>
                      <li><a href="unlock.html">Unlock User</a></li>
                      <li><a href="forget-password.html">Forget Password</a></li>
                      <li><a href="reset-password.html">Reset Password</a></li>
                      <li><a href="maintenance.html">Maintenance</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col mega-box">
                  <div class="link-section">
                    <div>
                      <h6>Email templates</h6>
                    </div>
                    <ul>
                      <li><a href="basic-template.html">Basic Email</a></li>
                      <li><a href="email-header.html">Basic With Header</a></li>
                      <li><a href="template-email.html">Ecomerce Template</a></li>
                      <li><a href="template-email-2.html">Email Template 2</a></li>
                      <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                      <li><a href="email-order-success.html">Order Success</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col mega-box">
                  <div class="link-section">
                    <div>
                      <h6>Coming Soon</h6>
                    </div>
                    <ul class="svg-icon">
                      <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>
                      <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>
                      <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>
                    </ul>
                    <div>
                      <h6>Other Soon</h6>
                    </div>
                    <ul class="svg-icon">
                      <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>
                      <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li> -->
      </ul>
    </div>
    <div class="nav-right col-8 pull-right right-menu">
      <ul class="nav-menus">
       
      
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
      
        <li class="profile-nav onhover-dropdown p-0">
          <div class="media profile-media"><img class="b-r-10" src="../assets/images/dashboard/profile.jpg" alt="">
            <div class="media-body"><span><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></span>
              <p class="mb-0 font-roboto"><?php echo $_SESSION['role_name'] ?> <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><i data-feather="user"></i><a href="index.php?p=edit_profile">  <span>  Account</a>  </span></li>
            <!-- <li><i data-feather="mail"></i><span>Inbox</span></li>
            <li><i data-feather="file-text"></i><span>Taskboard</span></li>
            <li><i data-feather="settings"></i><span>Settings</span></li> -->
            <li><a href="api/api_signout.php"><i data-feather="log-in"></i><span>ออกจากระบบ</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
    <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
  </div>
</div>
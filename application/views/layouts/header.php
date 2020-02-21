<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sibaper DKK Pati</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- iCheck Form -->
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/icheck/skins/all.css" />
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/select2/select2.min.css" />
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <!-- datepicker CSS -->
  <link href="<?=base_url('template/backend/')?>css/main.css" rel="stylesheet" />
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>vendors/jquery-toast-plugin/jquery.toast.min.css">

  <!-- gritter CSS -->
  <link rel="stylesheet" type="text/css" href="<?=base_url("template/backend/vendors/gritter/css/jquery.gritter.css")?>">
  <!-- js should be placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="<?=base_url("template/backend/js/jquery.js")?>"></script>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>css/style.css">
  <link rel="stylesheet" href="<?=base_url('template/backend/')?>css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />  

  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('img/')?>logo.png" />
</head>

<body>
    <!-- partial -->
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="<?=base_url('home/dashboard')?>"><img src="<?=base_url('img/')?>sibaper.png" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="<?=base_url('home/dashboard')?>"><img src="<?=base_url('img/')?>logo-mini.png" alt="logo"/></a> 
    </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>       
        <ul class="navbar-nav navbar-nav-right">                             
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="<?=base_url("login_do/logout")?>">
              <i class="icon-logout"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            
          </ul>
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
              aria-labelledby="todo-section">
              
              <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                  
                 
                  
                  
                 
                </ul>
              </div>
              
              
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
              <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                  All</small>
              </div>
              
            </div>
            <!-- chat tab ends -->
          </div>
        </div>

    <!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="row row-offcanvas row-offcanvas-right">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="profile-image">
              <img src="<?=base_url('img')?>/user.png" alt="image"/>
              <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
            </div>
            <div class="profile-name">
              <p class="name">
              <?=$_SESSION['persediaan']['realname']?>
              </p>
              <p class="designation">
              <?=$_SESSION['persediaan']['realname']?>
              </p>
            </div>
          </div>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2) =="dashboard"){ echo "active"; } ?>">
          <a class=" nav-link" href="<?=base_url('home/dashboard')?>">
            <i class="icon-speedometer menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
            
<?php 
      /*
       * Menu Bar
       */
    foreach ($menu as $main) {
        if($main['MenuParentId'] == '0') {  
          $active = $this->uri->segment(1) == $main['MenuModule'] ? 'active': '';                       
            echo '<li'.($main["MenuHasSubmenu"] ? ' class="nav-item"' : '').'>';
            
            echo '    <a href="'.($main["MenuHasSubmenu"] ? '#'.$main["MenuName"] : base_url($main["MenuModule"])).'"class="nav-link" '.'data-toggle="collapse">';
            if(!empty($main["MenuIcon"])) {
               echo '    <i class="menu-icon icon-'.$main["MenuIcon"]. '" ></i>';
            }
            echo '        <span class="menu-title">'.$main["MenuName"].'</span>'; 
            echo '    <span class="badge badge"><i class="fa fa-angle-down"></i></span>';            
            echo '    </a>';               
            if($main["MenuHasSubmenu"]) { 
              echo '<div class="collapse" id="'.$main["MenuName"] .'">';                 
                echo '<ul class="nav flex-column sub-menu">';
            }
          
            /*
             * Menu Level 1
             */                            
            foreach ($menu as $submenu1) {
                if($submenu1['MenuParentId'] == $main['MenuId']) {
                    $sub = '';
                    if($submenu1["MenuHasSubmenu"]) {
                        $sub = ' class="nav-link'.($main['MenuModule'] == $this->uri->segment(1)."/".$this->uri->segment(2) ? ' active' : '').'"';
                    } else {
                        if($submenu1['MenuModule'] == $this->uri->segment(1)."/".$this->uri->segment(2)) {
                            $sub = ' active';
                        }
                    }                    
                    echo '<li'.' class="nav-item"'.'>';
                    echo '    <a href="'.($submenu1["MenuHasSubmenu"] ? '#'.$main["MenuName"] : base_url($submenu1["MenuModule"])).'"class=" nav-link '.$sub.'"> ';                    
                    echo          $submenu1["MenuName"];                    
                    echo '    </a>';                       
                    if($submenu1["MenuHasSubmenu"]) { 
                      echo '<div class="collapse" id="'.$submenu1["MenuName"] .'">';                                         
                        echo '<ul class="nav flex-column sub-menu">';
                    }
                    /*
                     * Menu Level 2
                     */
                    foreach ($menu as $submenu2) {
                        if($submenu2['MenuParentId'] == $submenu1['MenuId']) {
                            echo '<li'.($submenu2["MenuHasSubmenu"] ? ' class="nav-link"' : '').'>';
                            echo '    <a href="'.($submenu2["MenuHasSubmenu"] ? '#'.$main["MenuName"] : base_url($submenu2["MenuModule"])).'"'.($submenu2["MenuHasSubmenu"] ? ' class=" nav-link"' : '').'>';
                            echo            $submenu2["MenuName"];
                            echo '    </a>';   
                            if($submenu2["MenuHasSubmenu"]) { 
                              echo '<div class="collapse" id="'.$main["MenuName"] .'">';                                         
                                echo '<ul class="nav flex-column nav-second-level">';
                            }
                            /*
                             * Menu Level 3
                             */
                            foreach ($menu as $submenu3) {
                                if($submenu3['MenuParentId'] == $submenu2['MenuId']) {
                                    echo '<li'.($submenu3["MenuHasSubmenu"] ? ' class="nav-link"' : '').'>';
                                    echo '    <a href="'.($submenu3["MenuHasSubmenu"] ? '#' : base_url($submenu3["MenuModule"])).'"'.($submenu3["MenuHasSubmenu"] ? ' class="dropdown-toggle"' : '').'>';
                                    echo          $submenu3["MenuName"];
                                    echo '    </a>';                                       
                                    if($submenu3["MenuHasSubmenu"]) {                                        
                                        echo '<ul class="nav flex-column nav-second-level">';
                                    }
                                    /*
                                     * Menu Level 4
                                     */
                                    foreach ($menu as $submenu4) {
                                        if($submenu4['MenuParentId'] == $submenu3['MenuId']) {
                                            echo '<li'.($submenu4["MenuHasSubmenu"] ? ' class="nav-link"' : '').'>';
                                            echo '    <a href="'.($submenu4["MenuHasSubmenu"] ? '#' : base_url($submenu4["MenuModule"])).'"'.($submenu3["MenuHasSubmenu"] ? ' class="dropdown-toggle"' : '').'>';
                                            echo          $submenu4["MenuName"];
                                            echo '    </a>';   
                                            if($submenu4["MenuHasSubmenu"]) {                                        
                                                echo '<ul class="nav flex-column nav-second-level">';                                               
                                            }
                                            /*
                                            * Menu Level 5
                                            */                                                            
                                            if($submenu4["MenuHasSubmenu"]) {
                                                echo "</ul>"; /* End of Menu Level 5 */
                                            }
                                            echo "</li>";                                            
                                        }
                                    }
                                    if($submenu3["MenuHasSubmenu"]) {
                                        echo '</ul>'; /* End of Menu Level 4 */
                                    }
                                    echo '</li>';
                                }
                            }
                            if($submenu2["MenuHasSubmenu"]) {
                                echo '</ul>'; /* End of Menu Level 3 */
                                
                              echo '</div>';
                              }
                            echo '</li>';
                        }
                    }
                    if($submenu1["MenuHasSubmenu"]) {
                        echo '</ul>'; /* End of Menu Level 2 */
                         
                      echo '</div>';
                      }
                    echo '</li>';

                }
            } 
            if($main["MenuHasSubmenu"]) {
                echo '</ul>'; /* End of Menu Level 1 */
                
              echo '</div>';
              }
            echo '</li>';                            
          } /* End of Menu Bar */
    }
?> 
            
  
</nav>

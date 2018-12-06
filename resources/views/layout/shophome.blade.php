<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{session('shopinfo')->shopname}}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="/shopadmins/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/shopadmins/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="/shopadmins/assets/css/ready.css">
  <link rel="stylesheet" href="/shopadmins/assets/css/demo.css">
</head>
<body>
  <div class="wrapper">
    <div class="main-header">
      <div class="logo-header">
        <a href="/shopadmin" class="logo">
          {{session('shopinfo')->shopname}}
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
      </div>
      <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">

       
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
       
            <li class="nav-item dropdown hidden-caret">
              <a class="nav-link dropdown-toggle" href="/shopadmins/#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-bell"></i>
                <span class="notification">3</span>
              </a>
              <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                <li>
                  <div class="dropdown-title">你有多少条未读信息</div>
                </li>
                <li>
                  <div class="notif-center">
                    <a href="/shopadmins/#">
                      <div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
                      <div class="notif-content">
                        <span class="block">
                          New user registered
                        </span>
                        <span class="time">5 minutes ago</span>
                      </div>
                    </a>
                    <a href="/shopadmins/#">
                      <div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
                      <div class="notif-content">
                        <span class="block">
                          Rahmad commented on Admin
                        </span>
                        <span class="time">12 minutes ago</span>
                      </div>
                    </a>
                    <a href="/shopadmins/#">
                      <div class="notif-img">
                        <img src="/shopadmins/assets/img/profile2.jpg" alt="Img Profile">
                      </div>
                      <div class="notif-content">
                        <span class="block">
                          Reza send messages to you
                        </span>
                        <span class="time">12 minutes ago</span>
                      </div>
                    </a>
                    <a href="/shopadmins/#">
                      <div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
                      <div class="notif-content">
                        <span class="block">
                          Farrah liked Admin
                        </span>
                        <span class="time">17 minutes ago</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li>
                  <a class="see-all" href="/shopadmins/javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
                </li>
              </ul>
            </li>
            <li><a href="/shopadmin/dologout">退出登录</a></li>
               
     
             
            </ul>
          </div>
        </nav>
      </div>
      <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
          <div class="user">
            <div class="photo">
              <img src="{{session('shopinfo')->logo}}">
            </div>
            <div class="info">
              <a class="" data-toggle="collapse" href="" aria-expanded="true">
                <span>
                  {{session('shopinfo')->name}}
                  <span class="user-level"> {{session('shopinfo')->address}}</span>
               
                </span>
              </a>
              <div class="clearfix"></div>

              <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                <ul class="nav">
                  <li>
                    <a href="/shopadmins/#profile">
                      <span class="link-collapse">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="/shopadmins/#edit">
                      <span class="link-collapse">Edit Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="/shopadmins/#settings">
                      <span class="link-collapse">Settings</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <a href="/shopadmin/cplb">
                <i class="la la-bars"></i>
                <p>菜品类别</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/shopadmin/xxcp">
                <i class="la la-certificate"></i>
                <p>详细菜品</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/shopadmin/ddgl">
                <i class="la la-certificate"></i>
                <p>订单管理</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/shopadmin/shopuser">
                <i class="la la-certificate"></i>
                <p>店铺信息</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <div class="content">
    @section('content')




  
    <img src="/sp.jpg" style="width:1610px;height: 810px">













    @show
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
          <p>
            <b>We'll let you know when it's done</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="/shopadmins/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/shopadmins/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/shopadmins/assets/js/core/popper.min.js"></script>
<script src="/shopadmins/assets/js/core/bootstrap.min.js"></script>
<script src="/shopadmins/assets/js/plugin/chartist/chartist.min.js"></script>
<script src="/shopadmins/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>

<script src="/shopadmins/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="/shopadmins/assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/shopadmins/assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="/shopadmins/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="/shopadmins/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/shopadmins/assets/js/ready.min.js"></script>
<script src="/shopadmins/assets/js/demo.js"></script>
</html>
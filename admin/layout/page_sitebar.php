<header class="main-nav" >
    <div class="logo-wrapper">
        <a href="index.php?p=dashboard"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt="" /><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="" /></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="index.php?p=dashboard"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt="" /></a>
    </div>
    <nav>
  
        <div class="main-navbar" id="sidebar">
       
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <a href="index.php?p=dashboard"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt="" /></a>
                        <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>
                  <!--   <li class="sidebar-title">
                        <div>
                            <h6 class="">General</h6>
                            <p class="lan-2">Dashboards,widgets & layout.</p>
                        </div>
                    </li> -->
                    <li class="dropdown" >
                        <a class="nav-link menu-title link-nav font-roboto" href="index.php?p=dashboard" data-original-title="" title=""><i data-feather="home"></i><span class="font-roboto"> หน้าหลัก</span> 
                            <!-- <label class="badge badge-success">2</label>  -->
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=order_amount&order_status=0">
                            <i data-feather="monitor"> </i><span>รายการรอตรวจสอบ</span>
                        </a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=order_amount&order_status=1">
                            <i data-feather="monitor"> </i><span>รายการรอจัดส่ง</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=order_amount&order_status=2">
                            <i data-feather="monitor"> </i><span>รายการกำลังจัดส่ง</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=order_amount&order_status=3">
                            <i data-feather="monitor"> </i><span>รายการดำเนินการเสร็จสิ้น</span>
                        </a>
                    </li>
                  
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=list_products">
                            <i data-feather="monitor"> </i><span>สินค้า</span>
                        </a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=list_cate">
                            <i data-feather="monitor"> </i><span>ประเภทสินค้า</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="index.php?p=list_employee">
                            <i data-feather="monitor"> </i><span>พนักงาน</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

<!-- <script>
     var sidebar = new Vue({
      el: "#sidebar",
      data: {
        
      },
      methods: {
       
      },
      mounted() {
        console.log("Hello Sidebar ");
      }
    });
</script> -->
<header class="main-nav">
    <div class="logo-wrapper">
        <a href="index.php"><img class="img-fluid for-light" src="assets/images/logo/logo.png" alt="" /><img class="img-fluid for-dark" src="assets/images/logo/logo_dark.png" alt="" /></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="index.php"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt="" /></a>
    </div>
    <nav>

        <div class="main-navbar" id="sidebar">

            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <a href="index.html"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt="" /></a>
                        <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-title">
                        <div>

                            <h6>หมวดหมู่ สมุนไพร</h6>
                            <p>สมุนไพรไทยรักษาโรค.</p>
                        </div>
                    </li>

                    <?php

                    $query_cat = $conn->query("SELECT * FROM tb_category WHERE del_status = '0' ");
                    while ($fet_cat = $query_cat->fetch_object()) { ?>

                        <li class="dropdown">
                            <a class="nav-link menu-title link-nav" href="index.php?p=product&cat_id=<?php echo $fet_cat->cat_id ?>" data-original-title="" title="">
                                <i data-feather="home"></i><?php echo $fet_cat->cat_name ?>
                                <!--<label class="badge badge-success">2</label> -->
                            </a>
                        </li>
                    <?php  }

                    ?>

                    <li class="sidebar-title">
                        <div>

                            <h6>หมวดหมู่ ....</h6>
                            <p>สมุนไพรไทยรักษาโรค.</p>
                        </div>
                    </li>

                    <li class="sidebar-title">
                        <div>

                            <h6>หมวดหมู่ ....</h6>
                            <p>สมุนไพรไทยรักษาโรค.</p>
                        </div>
                    </li>




                    <!-- <li class="dropdown">
                        <a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span class="lan-6">Widgets</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="general-widget.html">General</a></li>
                            <li><a href="chart-widget.html">Chart</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="#"><i data-feather="layout"></i><span class="lan-7">Page layout</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="box-layout.html">Boxed</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-dark.html">Dark Layout</a></li>
                            <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                            <li><a href="footer-light.html">Footer Light</a></li>
                            <li><a href="footer-dark.html">Footer Dark</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-title">
                        <div>
                            <h6 class="lan-8">About users</h6>
                            <p class="lan-9">About users</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="#">
                            <i data-feather="box"></i><span>Project <label class="badge badge-danger">New</label></span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="projects.html">Project List</a></li>
                            <li><a href="projectcreate.html">Create new</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="kanban.html">
                            <i data-feather="monitor"> </i><span>kanban Board <label class="badge badge-primary">Latest</label></span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

<script>
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
</script>
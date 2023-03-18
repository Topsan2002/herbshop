<?php
// session_destroy();
if (isset($_REQUEST['ac']) && $_REQUEST['ac'] == 'remove_order') {
  // for($i=0; $i<count($_SESSION['chart']); $i++) {

  // }
  unset($_SESSION['chart'][$_REQUEST['index']]);
  $_SESSION['chart'] = array_values($_SESSION['chart']);
  var_dump($_SESSION['chart']);
} else {
}
?>

<div class="page-main-header">
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
      <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="assets/images/logo/logo.png" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
    </div>
    <div class="left-menu-header col horizontal-wrapper pl-0">
      <ul class="horizontal-menu">
       
      </ul>
    </div>
    <div class="nav-right col-8 pull-right right-menu">
      <ul class="nav-menus">
        <?php
        if (isset($_SESSION['user_id'])) { ?>
          
         
          <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
          </li>
          <li class="cart-nav onhover-dropdown">
            <div class="cart-box"><a href="index.php?p=cart"> <i data-feather="shopping-cart"></i><span class="badge badge-pill badge-primary"><?php echo count($_SESSION['chart']); ?></span></a></div>
            <ul class="cart-dropdown chat-dropdown onhover-show-div">
              <li class="bg-primary text-center">
                <h6 class="f-18">ตระกร้าสินค้า</h6>
                <p class="mb-0">คุณมี <?php echo count($_SESSION['chart']); ?> ชิ้นในตะกร้า </p>
              </li>
              <?php
              $total = 0;
              for ($i = 0; $i < count($_SESSION['chart']); $i++) {
                $query = $conn->query("SELECT * FROM tb_product WHERE pro_id = '" . $_SESSION['chart'][$i]->pro_id . "' ");
                $fet = $query->fetch_object();
                $total_price = ($fet->pro_price * $_SESSION['chart'][$i]->amount);
              ?>


                <li class="mt-0">
                  <div class="media"><img style="width: 100%; height: 60px; object-fit: cover;" class="img-fluid rounded-circle mr-3 img-60" src="images/product/<?php echo $fet->pro_pic ?>" alt="">
                    <div class="media-body"><span><?php echo $fet->pro_name ?></span>
                      <p><?php
                          if (strlen($fet->pro_detail) > 20) {
                            echo mb_substr($fet->pro_detail, 0, 30) . " ...";
                          } else {
                            echo $fet->pro_detail;
                          }
                          ?>
                      </p>
                      <h6 class="f-12 light-font"><?php echo $_SESSION['chart'][$i]->amount; ?> x $ <?php echo number_format($fet->pro_price, 2) ?></h6>
                    </div>
                    <div class="close-circle">
                      <button onclick="return delChart(<?php echo $i; ?>);"><i data-feather="x"></i></button>
                    </div>
                  </div>
                </li>
              <?php
                $total += $total_price;
              } ?>

              <div class="total">
                <h6 class="mb-0 mt-1">ราคารวม : <span class="f-right">$<?php echo number_format($total, 2); ?></span></h6>
              </div>
          </li>
          <li>
            <div class="buttons">
              <h6 class="mb-0"><a class="view-cart" href="index.php?p=cart">ตะกร้า</a><a class="checkout f-right" href="index.php?p=checkout">สั่งซื้อสินค้า</a></h6>
            </div>
          </li>
      </ul>
      </li>
      
      <!-- <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li> -->
      <li class="profile-nav onhover-dropdown p-0">
        <div class="media profile-media"><img class="b-r-10" src="assets/images/dashboard/profile.jpg" alt="">
          <div class="media-body"><span><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></span>
            <p class="mb-0 font-roboto">ผู้ใช้งาน <i class="middle fa fa-angle-down"></i></p>
          </div>
        </div>
        <ul class="profile-dropdown onhover-show-div">
          <li><i data-feather="file-text"></i><a href="index.php?p=order_detail"><span>รายการสั่งซื้อ</span></a></li>
          <!-- <li><i data-feather="file-text"></i><a href="index.php?p=billing"><span>คำสั่งซื้อ</span></a></li> -->
          <!-- <li><i data-feather="user"></i><a href="index.php?p=user_profile"><span class="text-primary">Account </span></a></li> -->
          <!-- <li><i data-feather="mail"></i><span>Inbox</span></li>
            <li><i data-feather="file-text"></i><span>Taskboard</span></li> -->
          <li><i data-feather="settings"></i><a href="index.php?p=edit_profile"><span>ข้อมูลสมาชิก</span></a></li>
          <li><i data-feather="log-in"></i><a href="admin/api/api_signout.php">ออกจากระบบ</a></li>
        </ul>
      </li>
      </ul>
    <?php } else { ?>
      <div class="nav-menus">
        <li class="profile-nav onhover-dropdown p-0">
          <div class="media profile-media"><img class="b-r-10" src="assets/images/dashboard/profile.jpg" alt="">
            <div class="media-body"><span>Gust</span>
              <p class="mb-0 font-roboto">Sign In <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><i data-feather="log-in"></i><a href="admin/layout/login.php"><span>เข้าสู่ระบบ</span></a></li>
          </ul>
        </li>
      </div>

    <?php } ?>
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

<script type="text/javascript">
  function delChart(index) {

    $.ajax({
      url: "api/api_chart.php",
      type: "POST",
      dataType: "JSON",
      data: "ac=" + 'remove_order' + "&index=" + index,
      success: function(data, status) {
        // console.log(data)    
        if (data['status'] == true) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: data['msg'],
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(() => {
            // location.replace('index.php?p=list_products')
            window.location.reload();

          }, 1500);

        }
      }
    });

  }
</script>
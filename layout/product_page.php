<?php
// session_destroy();
if (isset($_REQUEST['ac']) && $_REQUEST['ac'] == 'addchart') {
    // $_SESSION['chart'];
    $status = true;

    for ($i = 0; $i < count($_SESSION['chart']); $i++) {
        if ($_SESSION['chart'][$i]->pro_id == $_REQUEST['pro_id']) {
            $status = false;
        }
    }

    if ($status) {
        $object = (object) [
            'pro_id' => $_REQUEST['pro_id'],
            'amount' => $_REQUEST['amount'],
        ];
        array_push($_SESSION['chart'], $object);
    }
}


?>
<?php

    $sql = $conn->query("SELECT * FROM tb_product as a LEFT JOIN tb_category as b ON a.cat_id = b.cat_id WHERE a.pro_id = '" . $_REQUEST["pro_id"] . "'");
    $fet = $sql->fetch_object();

?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Product Page</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?p=dashboard"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">ECommerce </li>
                    </ol>
                </div>
                <div class="col-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark pull-right">
                        <ul>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                            <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form" action="#" method="get">
                                    <div class="form-group form-control-search">
                                        <div class="Typeahead Typeahead--twitterUsers">
                                            <div class="u-posRelative">
                                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                                            </div>
                                            <div class="Typeahead-menu"></div>
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
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="row product-page-main">
                <div class="col-xl-4">
                    <div class="product-slider owl-carousel owl-theme" id="sync1">
                        <div class="item"><img src="images/product/<?php echo $fet->pro_pic ?>" alt=""></div>
                       <!--  <div class="item"><img src="assets/images/ecommerce/02.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/03.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/04.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/05.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/06.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/07.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/08.jpg" alt=""></div> -->
                    </div>
                    <div class="owl-carousel owl-theme" id="sync2">
                       <!--  <div class="item"><img src="assets/images/ecommerce/01.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/02.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/03.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/04.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/05.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/06.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/07.jpg" alt=""></div>
                        <div class="item"><img src="assets/images/ecommerce/08.jpg" alt=""></div> -->
                    </div>
                </div>


                <div class="col-xl-8">
                    <div class="product-page-details">
                        <h5><?php echo $fet->pro_name; ?></h5>
                        <div class="d-flex">
                            <!-- <select id="u-rating-fontawesome" name="rating" autocomplete="off">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> -->
                            <i style="color:darkgoldenrod" class="fa fa-star"></i>
                            <i style="color:blanchedalmond" class="fa fa-star"></i>
                            <i style="color:blanchedalmond" class="fa fa-star"></i>
                            <i style="color:blanchedalmond" class="fa fa-star"></i>
                            <i style="color:blanchedalmond" class="fa fa-star"></i>
                            <span>(250 review)</span>
                        </div>
                    </div>
                    <hr>
                    <!-- <p><?php echo $fet->pro_detail; ?></p> -->
                    <div class="product-price digits">
                        <h3>$ <?php echo number_format($fet->pro_price, 2) ?></h3>
                    </div>
                    <hr>
                    <div>
                        <table class="product-page-width">
                            <tbody>
                                <tr>
                                    <td>หมวดหมู่ :</td>
                                    <td><?php
                                    echo $fet->cat_name;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>สถานะสินค้า :</td>
                                <td class="in-stock">
                                    <?php
                                    if ($fet->del_status == 1) {
                                        echo "สินค้าหมด";
                                    } else {
                                        echo "มีสินค้าทั้งหมด $fet->pro_amount ชิ้น";
                                    }
                                    ?>
                                </td>
                                    <!-- <td class="in-stock"></td>
                                        <td class="out-of-stock" style="display: none;"></td> -->
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <hr>
                    <!-- <ul class="product-color m-t-15">
                        <li class="bg-primary"></li>
                        <li class="bg-secondary"></li>
                        <li class="bg-success"></li>
                        <li class="bg-info"></li>
                        <li class="bg-warning"></li>
                        
                    </ul> -->
                    <fieldset class="qty-box">
                        <div class="input-group col-3">
                            <input id="amount" class="touchspin text-center" type="text" value="1">
                        </div>
                    </fieldset>

                    <div class="m-t-15">
                        <?php 

                        if (isset($_SESSION['user_id']) && $fet->pro_amount > 0) { ?>
                           <button class="btn btn-success-gradien m-r-10" type="button" onclick="return addChart(<?php echo $fet->pro_id ?>);" data-original-title="สั่งซื้อสินค้า" title="">สั่งซื้อสินค้า</button>
                       <?php    }else if( $fet->pro_amount <= 0){ ?>

                           <button class="btn btn-success-gradien m-r-10" type="button" onclick="return proAnt();" data-original-title="สั่งซื้อสินค้า" title="">สั่งซื้อสินค้า</button>

                       <?php    }else{ ?>
                        <button class="btn btn-success-gradien m-r-10" type="button" onclick="return notHave();" data-original-title="สั่งซื้อสินค้า" title="">สั่งซื้อสินค้า</button>


                    <?php   }


                       ?>
                       
                       <!--  <a href="index.php?p=product_page&pro_id=<?php echo $_REQUEST['pro_id'] ?>&amount=1&ac=addchart"><button class="btn btn-primary-gradien m-r-10" type="button" data-original-title="btn btn-info-gradien" title="">Add To Cart</button></a> -->
                   <!--     <button class="btn btn-secondary-gradien m-r-10" type="button" data-original-title="btn btn-info-gradien" title="">Quick View</button>
                       <button class="btn btn-success-gradien" type="button" data-original-title="btn btn-info-gradien" title="">Buy Now</button> -->
                   </div>
               </div>
           </div>
       </div>
       <div class="card">
        <div class="row product-page-main">
            <div class="col-sm-12">
                <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">รายละเอียด</a>
                        <div class="material-border"></div>
                    </li>

                </ul>
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <p class="mb-0 m-t-20"><?php echo $fet->pro_detail ?></p>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">
                        <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>

<script type="text/javascript">
    function addChart(pro_id) {
        // console.log('ss');
        var amount=document.getElementById("amount").value;  
        $.ajax({
            url: "api/api_chart.php",
            type: "POST",
            dataType: "JSON",
            data: "ac=" + 'add' + "&pro_id=" + pro_id + '&amount='+amount,
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

<script type="text/javascript">
    function addOrder() {

        var amount=document.getElementById("amount").value;  
        $.ajax({
            url: "api/api_chart.php",
            type: "POST",
            dataType: "JSON",
            data: "ac=" + 'add_order',
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

                }else{
                     Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data['msg'],
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });

    }


    function proAnt() {
       Swal.fire({
        position: 'center',
        icon: 'error',
        title:'สินค้าหมด',
        showConfirmButton: false,
        timer: 1000
    })
   }

    function notHave() {
       Swal.fire({
        position: 'center',
        icon: 'error',
        title:'กรุณาลงชื่อเข้าใช้',
        showConfirmButton: false,
        timer: 1000
    })
   }
</script>
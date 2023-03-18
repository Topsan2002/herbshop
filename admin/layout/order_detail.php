<?php 
	$query = $conn->query("SELECT * FROM  tb_order LEFT JOIN tb_user ON tb_user.user_id = tb_order.user_id WHERE order_id = '".$_REQUEST['order_id']."' ");
	$fet = $query->fetch_object();
 ?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Invoice</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">ECommerce</li>
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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice">
                            <div>
                                <!-- <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media">
                                                <div class="media-left"><img class="media-object img-60" src="../assets/images/other-images/logo-login.png" alt=""></div>
                                                <div class="media-body m-l-20">
                                                    <h4 class="media-heading">Cuba</h4>
                                                    <p>hello@Cuba.in<br><span class="digits">289-335-6503</span></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-md-right">
                                                <h3>Invoice #<span class="digits counter">1069</span></h3>
                                                <p>Issued: May<span class="digits"> 27, 2015</span><br> Payment Due: June <span class="digits">27, 2015</span></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <hr> -->
                                <!-- End InvoiceTop-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="media">
                                            <div class="media-left"><img class="media-object rounded-circle img-60" src="assets/images/user/1.jpg" alt=""></div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading"><?php echo $fet->fname." ".$fet->lname; ?></h4>
                                                <p><?php echo $fet->email ?><br><span class="digits"><?php echo $fet->phone ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-md-right" id="project">
                                            <h6>ที่อยู่</h6>
                                            <p><?php echo $fet->address ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Invoice Mid-->
                                <div>
                                    <div class="table-responsive invoice-table" id="table">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="item">
                                                        <h6 class="p-2 mb-0">ลำดับ</h6>
                                                    </td>
                                                    <td class="Hours">
                                                        <h6 class="p-2 mb-0">ชื่อสินค้า</h6>
                                                    </td>
                                                    <td class="Rate">
                                                        <h6 class="p-2 mb-0">จำนวน</h6>
                                                    </td>
                                                    <td class="subtotal">
                                                        <h6 class="p-2 mb-0">ราคา/หน่วย</h6>
                                                    </td>
                                                    <td class="subtotal">
                                                        <h6 class="p-2 mb-0">ราคารวม</h6>
                                                    </td>
                                                </tr>
                                            <?php 
                                            	$i = 1;
                                            	$query_pro = $conn->query("SELECT tb_orderitem.*, tb_product.pro_name FROM tb_orderitem 
                                            		LEFT JOIN tb_product ON tb_product.pro_id = tb_orderitem.pro_id WHERE order_id = '".$_REQUEST['order_id']."' ");
                                            	while ($fet_pro = $query_pro->fetch_object()) { ?>
                                            	
                                            		<tr class="text-right">
                                                    <td class="text-center">
                                                        <!-- <label>Lorem Ipsum</label> -->
                                                        <!-- <p class="m-0"></p> -->
                                                        <?php echo $i++ ?>
                                                    </td>
                                                    <td class="text-left">
                                                        <p class="itemtext digits"><?php echo $fet_pro->pro_name ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo $fet_pro->pro_amount ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo $fet_pro->pro_price_now ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo  number_format(itemTotal($fet_pro->order_id, $fet_pro->pro_id),2) ?></p>
                                                    </td>
                                                </tr>


                                            <?php	}

                                             ?>


                                 
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="Rate">
                                                        <h6 class="mb-0 p-2">Total</h6>
                                                    </td>
                                                    <td class="payment digits text-right">
                                                        <h6 class="mb-0 p-2"><?php echo number_format(orderTotal($_REQUEST['order_id']),2); ?></h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table-->
                                   
                                </div>
                                <!-- End InvoiceBot-->
                            </div>
                            <div class="col-sm-12 text-center mt-3">
                                <!-- <button class="btn btn btn-primary mr-2" type="button" onclick="myFunction()">Print</button> -->
                                <a class="btn btn-primary text-light" href="index.php?p=order_amount&<?php echo "order_status=".$_REQUEST['order_status']  ?>"    type="button">ย้อนกลับ</a>
                            </div>
                            <!-- End Invoice-->
                            <!-- End Invoice Holder-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


    <!-- Container-fluid starts-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice">
                            <div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="media">
                                            <div class="media-left"><img class="media-object rounded-circle img-60" src="" alt=""></div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading">หลักฐานการชำระเงิน</h4>
                                                <!-- <p><?php echo $fet->email ?><br><span class="digits"><?php echo $fet->phone ?></span></p> -->
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="media">
                                            <div class="media-left"><img class="media-object rounded-circle img-60" src="assets/images/user/1.jpg" alt=""></div>
                                            <div class="media-body m-l-20">
                                                <h6 class="media-heading"><?php echo "วันที่ชำระ : ".$fet->pay_date ?></h6>
                                                <h6 class="media-heading"><?php echo "เวลาที่ชำระ : ".$fet->pay_time ?></h6>
                                                <h6 class="media-heading"><?php echo "จำนวนที่ชำระ : ".number_format($fet->pay_total,2)." บาท" ?></h6>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                         <div class="text-md-right" id="project">
                                            <a class="btn btn-success text-light" href="../images/payment/<?php echo $fet->pay_pic ?>" target="_blank"    type="button">หลักฐานการชำระเงิน</a>

                                        </div>
                                                <!-- <h6 class="media-heading"><?php echo "วันที่ชำระ : ".$fet->pay_date ?></h6> -->
                                        
                                    </div>
                                    
                                </div>
                                <hr>
                                
                               
                                </div>
                                <!-- End InvoiceBot-->
                            </div>
                           
                            <!-- End Invoice-->
                            <!-- End Invoice Holder-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->






</div>
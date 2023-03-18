<?php

$query = $conn->query("SELECT * FROM tb_user WHERE user_id = '" . $_SESSION['user_id'] . "' ");
$fet = $query->fetch_object();
?>

<div class="page-body checkout">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <div class="page-header-left">
                        <h3>Checkout</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ecommerce</li>
                        </ol>
                    </div>
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
            <div class="card-header">
                <h5>Billing Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <form>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail4">ชื่อ</label>
                                    <input class="form-control" id="inputEmail4" type="text" readonly="readonly" placeholder="<?php echo $fet->fname; ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputPassword4">นามสกุล</label>
                                    <input class="form-control" id="inputPassword4" type="text" readonly="readonly" placeholder="<?php echo $fet->lname; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inputEmail5">เบอร์โทร</label>
                                    <input class="form-control" id="inputEmail5" type="text" readonly="readonly" placeholder="<?php echo $fet->phone; ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="inputPassword7">อีเมล</label>
                                    <input class="form-control" id="inputPassword7" type="text" readonly="readonly" placeholder="<?php echo $fet->email; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputState">Country</label>
                                <select class="form-control" id="inputState" readonly="readonly">
                                    <option selected="">THAILAND</option>
                                    <!-- <option>THAILAND</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress5">Address</label>
                                <input class="form-control" id="inputAddress5" type="text" readonly="readonly" placeholder="<?php echo $fet->address; ?>">
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputCity">Town/City</label>
                                <input class="form-control" id="inputCity" type="text" readonly="readonly">
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="inputAddress2">State/Country</label>
                                <input class="form-control" id="inputAddress2" type="text">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress6">Postal Code</label>
                                <input class="form-control" id="inputAddress6" type="text">
                            </div> -->
                            <!-- <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" id="gridCheck" type="checkbox">
                                    <label class="form-check-label" for="gridCheck">Check me out</label>
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <div class="col-lg-6 col-sm-12">
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
                                    $total = 0;
                                    for ($i = 0; $i < count($_SESSION['chart']); $i++) {
                                        $query = $conn->query("SELECT * FROM tb_product WHERE pro_id = '" . $_SESSION['chart'][$i]->pro_id . "' ");
                                        $fet = $query->fetch_object();
                                        $total_price = ($fet->pro_price * $_SESSION['chart'][$i]->amount);
                                        $total += $total_price;
                                    ?>
                                        <tr class="text-right">
                                            <td class="text-center">
                                                <!-- <label>Lorem Ipsum</label> -->
                                                <!-- <p class="m-0"></p> -->
                                                <?php echo $i + 1; ?>
                                            </td>
                                            <td class="text-left">
                                                <p class="itemtext digits"><?php echo $fet->pro_name ?></p>
                                            </td>
                                            <td>
                                                <p class="itemtext digits"><?php echo $_SESSION['chart'][$i]->amount ?></p>
                                            </td>
                                            <td>
                                                <p class="itemtext digits"><?php echo $fet->pro_price ?></p>
                                            </td>
                                            <td>
                                                <p class="itemtext digits"><?php echo number_format($total_price, 2);  ?></p>
                                            </td>
                                        </tr>


                                    <?php   }

                                    ?>



                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">
                                            <h6 class="mb-0 p-2">Total</h6>
                                        </td>
                                        <td class="payment digits text-right">
                                            <h6 class="mb-0 p-2"><?php echo number_format($total, 2); ?></h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="checkout-details">
                            <div class="order-box">
                                <form method="POST" action="api/api_chart.php?ac=add_order" id="form_order" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="">จำนวนเงินที่จ่าย</label>
                                            <input class="form-control" id="" type="number" name="pay_total" placeholder="ระบุจำนวนเงืน" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">วันที่จ่าย </label>
                                            <input class="form-control" id="" type="date" name="pay_date" placeholder="วันที่จ่าย" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="">เวลาที่จ่าย</label>
                                            <input class="form-control" id="" type="time" name="pay_time" placeholder="เวลาที่จ่าย" required>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label>อัปโหลดสลิปโอนเงิน</label>
                                        <label>โอนเงินเข้าหมายเลขพร้อมเพย์ 0xxxxxxxx</label>
                                        <input class="form-control" type="file" placeholder="" name="pay_pic" required>
                                    </div>
                                    <div class="animate-chk">
                                    </div>
                                    <div class="text-right"><button class="btn btn-primary" type="submit">ชำระเงิน</button> </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<script>
    $(document).on("submit", "#form_order", function(e) {
        e.preventDefault();
        // console.log('in');
        var url = $(this).attr("action");
        var data = new FormData(this);
        // console.log("result data : am in ");
        console.log(url);
        // console.log(data);
        $.ajax({
            url: url,
            type: $(this).attr("method"),
            dataType: "JSON",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // $("#btn_send_form").attr('data-kt-indicator', 'on');
            },
            success: function(data, status) {
                console.log("data API");
                console.log(data);
                if (data['status'] == true) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data['msg'],
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        location.replace('index.php?p=order_detail')
                    }, 1500);
                } else {
                    Swal.fire({
                        text: data['msg'],
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "ตกลง",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            }
        });

    });
</script>
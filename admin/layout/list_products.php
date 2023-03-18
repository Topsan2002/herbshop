<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Product list</h3>
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
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                                <div class="col-md-10">
                                    <h5>รายการสินค้า </h5>
                                  <!--   <span>The searching functionality provided by DataTables is useful for quickly search through the information in the table - however the search is global, and you may wish to present controls that search on specific columns.</span> -->
                                </div>
                                <div class="col-md-2">
                                            <a class="btn btn-success mr-0 ml-5 text-center" href="index.php?p=add_product">เพิ่มสินค้า</a>
                                </div>
                        </div>
                        
                        <!-- <div class="card"></div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-Z">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>รูป</th>
                                        <th>รายละเอียด</th>
                                        <th>ราคาขาย</th>
                                        <th>ราคาทุน</th>
                                        <th>สินค้าคงเหลือ</th>
                                        <!-- <th>Start date</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
 
                                        $query = $conn->query("SELECT * FROM tb_product WHERE del_status = '0' " );
                                        while ($fet = $query->fetch_object()) {
                                            
                                     ?>
                                    <tr>
                                        <td><img height="64px" width="64px" src="<?php if($fet->pro_pic){
                                            echo "../images/product/".$fet->pro_pic;
                                        }else{
                                            echo "../assets/images/ecommerce/product-table-1.png";
                                        } ?>" alt=""></td>
                                        <td>
                                            <h6><?php echo $fet->pro_name ?></h6>
                                            <span>
                                            <?php
                                            if (strlen($fet->pro_detail) > 50) {
                                                echo mb_substr($fet->pro_detail, 0, 50) . "...";
                                            } else {
                                                echo $fet->pro_detail;
                                            }
                                            ?>
                                            </span>
                                        </td>
                                        <td>฿ <?php echo number_format($fet->pro_price,2) ?></td>
                                        <td>฿ <?php echo number_format($fet->pro_costprice,2) ?></td>
                                        <td class="font-success"><?php echo $fet->pro_amount ?></td>
                                        <td>
                                            <a class="btn btn-info mr-3" href="index.php?p=edit_product&pro_id=<?php echo $fet->pro_id; ?>">แก้ไข</a>

                                            <!-- <a class="btn btn-danger mr-3" href="index.php?p=edit_product">ลบ</a> -->
                                            <button class="btn btn-danger" type="button" onclick="return deleteProduct(<?php echo $fet->pro_id; ?>)">ลบ</button>
                                        </td>
                                    </tr>
                
                                    <?php
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

 <script type="text/javascript">
function deleteProduct(id) {
    // console.log(ssa_id)
    Swal.fire({
        title: 'คุณต้องการลบข้อมูลใช่หรือไม่?',
        // text: "ลบข้อมูลทั้งหมดของการประเมินครั้งนี้ การลบข้อมูลจะไม่สามารถกู้คืนได้ กรุณายืนยันการลบข้อมูลอีกครั้ง",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยันลบข้อมูล',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "api/api_product.php",
                type: "POST",
                dataType: "JSON",
                data: "ac=" + 'del' + "&pro_id=" + id,
                success: function(data, status) {
                    // console.log(data)    
                    if (data['status'] == true) {
                        Swal.fire(
                            'สำเร็จ!',
                            'ลบข้อมูลเรียบร้อยแล้ว',
                            'success'
                        )
                        window.location.reload();

                    }
                }
            });


        }

    });
};
    </script>
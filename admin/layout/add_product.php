<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Add Product</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Apps</li>
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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="api/api_product.php?ac=add" id="form_product" enctype="multipart/form-data" >
                        <div class="form theme-form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>ชื่อสินค้า</label>
                                        <input class="form-control" type="text" placeholder="ชื่อสินค้า" name="pro_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>ประเภทสินค้า</label>
                                        <select class="form-control digits" name="cat_id" required>
                                             <?php 

                                        $query_cat = $conn->query("SELECT * FROM `tb_category`");
                                        while($fet_cat = $query_cat->fetch_object()){ ?>
                                             <option value="<?php echo $fet_cat->cat_id ?>"><?php echo $fet_cat->cat_name; ?></option> 

                                     <?php   }

                                         ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>รายละเอียดสินค้า</label>
                                        <textarea required class="form-control" name="pro_detail" rows="3" placeholder="รายละเอียดสินค้า"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>ราคาขาย</label>
                                        <input class="form-control" type="number" placeholder="ราคาขาย" name="pro_price" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>ราคาทุน</label>
                                        <input class="form-control" type="number" placeholder="ราคาทุน" name="pro_costprice" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>จำนวนสินค้า</label>
                                        <input class="form-control" type="number" placeholder="จำนวนสินค้า" name="pro_amount" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>จำนวนสินค้าต่ำสุดที่รับได้</label>
                                        <input class="form-control" type="number" placeholder="จำนวนสินค้าต่ำสุดที่รับได้" name="pro_low" name="pro_low" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>อัปโหลดรูปสินค้า</label>
                                        <input class="form-control" type="file" placeholder="" name="pro_pic">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <!-- <a class="btn btn-success mr-3" href="#">Edit</a> -->
                                        <button class="btn btn-success mr-3" type="submit">เพิ่มสินค้า</button>
                                        <a class="btn btn-danger" href="index.php?p=list_products">Cancel</a>
                                    </div>
                                </div>
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
$(document).on("submit", "#form_product", function(e) {
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
                        location.replace('index.php?p=list_products')
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
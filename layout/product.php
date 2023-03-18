    <div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Product</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg></a></li>
                        <li class="breadcrumb-item">ECommerce</li>
                    </ol>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid product-wrapper">
        <div class="product-grid">
                      <div class="product-wrapper-grid">
                <div class="row">

                    <?php 
                        $query = $conn->query("SELECT * FROM tb_product WHERE cat_id =  '".$_REQUEST['cat_id']."' AND del_status = '0' ");
                        while ($fet = $query->fetch_object()) { ?>
                                
                            
                    <!-- Card Item start -->
                    <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                            <div class="product-box">
                                <div class="product-img"><img class="img-fluid"style="width: 300px; height: 337px; object-fit: cover;"
                                 src="<?php if($fet->pro_pic){
                                            echo "images/product/".$fet->pro_pic;
                                        }else{
                                            echo "images/product/11.jpg";
                                        } ?>" alt="" data-original-title="" title="">
                                    <div class="product-hover">
                                        <ul>
                                            <li>
                                                <button class="btn" type="button" data-original-title="" title=""><a href="index.php?p=product_page&pro_id=<?php echo $fet->pro_id ?>" style="color:black"><i class="icon-shopping-cart"></a></i></button>
                                            </li>
                                            <!-- <li>
                                                <button class="btn" type="button" data-toggle="modal" data-target="#exampleModalCenter<?php echo $fet->pro_id ?>" data-original-title="" title=""><i class="icon-eye"></i></button>
                                            </li>
                                            <li>
                                                <button class="btn" type="button" data-original-title="" title=""><i class="icofont icofont-law-alt-2"></i></button>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalCenter<?php  echo $fet->pro_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter<?php echo $fet->pro_id ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="product-box row">
                                                    <div class="product-img col-md-6"><img class="img-fluid" src="<?php if($fet->pro_pic){
                                            echo "images/product/".$fet->pro_pic;
                                        }else{
                                            echo "images/product/11.jpg";
                                        } ?>" alt="" data-original-title="" title=""></div>
                                                    <div class="product-details col-md-6 text-left">
                                                        <h4><?php echo $fet->pro_name ?></h4>
                                                        <div class="product-price">
                                                            <?php echo number_format($fet->pro_price); ?>
                                                        </div>
                                                        <div class="product-view">
                                                            <h6 class="f-w-600">รายละเอียด</h6>
                                                            <p class="mb-0"><?php echo $fet->pro_detail ?></p>
                                                        </div>
                                                        <div class="product-size">
                                                            <ul>
                                                                <li>
                                                                    <button class="btn btn-outline-light" type="button" data-original-title="" title="">M</button>
                                                                </li>
                                                                <li>
                                                                    <button class="btn btn-outline-light" type="button" data-original-title="" title="">L</button>
                                                                </li>
                                                                <li>
                                                                    <button class="btn btn-outline-light" type="button" data-original-title="" title="">Xl</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-qnty">
                                                            <h6 class="f-w-600">Quantity</h6>
                                                            <fieldset>
                                                                <div class="input-group bootstrap-touchspin">
                                                                    <div class="input-group-prepend"><button class="btn btn-primary btn-square bootstrap-touchspin-down" type="button" data-original-title="" title=""><i class="fa fa-minus"></i></button></div>
                                                                    <div class="input-group-prepend"><span class="input-group-text bootstrap-touchspin-prefix" style="display: none;"></span></div><input class="touchspin text-center form-control" type="text" value="5" data-original-title="" title="" style="display: block;">
                                                                    <div class="input-group-append"><span class="input-group-text bootstrap-touchspin-postfix" style="display: none;"></span></div>
                                                                    <div class="input-group-append ml-0"><button class="btn btn-primary btn-square bootstrap-touchspin-up" type="button" data-original-title="" title=""><i class="fa fa-plus"></i></button></div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="addcart-btn">
                                                                <button class="btn btn-primary" type="button" data-original-title="" title="">Add to Cart</button>
                                                                <button class="btn btn-primary" type="button" data-original-title="" title="">View Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <h4><?php echo $fet->pro_name ?></h4>
                                    <p><?php echo substr($fet->pro_detail,0,120) ?>.</p>
                                    <div class="product-price">
                                        <?php echo number_format($fet->pro_price,2);  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Item end -->

                                
                       <?php }


                     ?>



                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</div>

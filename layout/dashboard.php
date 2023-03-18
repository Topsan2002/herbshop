<div class="page-body">
   <!--  -->
   
    <img class="img-fluid w-100" src="images/advert/main.jpg" alt="blog-main">
    <br>
    <br>
    <br>
    <div class="product-wrapper-grid">
        <div class="row">

            <?php

            $sql = $conn->query("SELECT * FROM tb_product WHERE del_status = '0'  ");
            while ($fet = $sql->fetch_object()) {
            ?>

                <!-- Card Item start -->

                <div class="col-xl-2 col-sm-6 xl-4">
                    <div class="card">
                        <div class="product-box">
                            <div class="product-img"><img style="width: 300px; height: 337px; object-fit: cover;" class="img-fluid" 
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
                                        <li>
                                            <button class="btn" type="button" data-original-title="" title=""><a href="index.php?p=product_page&pro_id=<?php echo $fet->pro_id ?>" style="color:black"><i class="icofont icofont-law-alt-2"></a></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <h4><?php echo $fet->pro_name; ?></h4>

                                <p><?php
                                    if (strlen($fet->pro_detail) > 20) {
                                        echo mb_substr($fet->pro_detail, 0, 30) . " ...";
                                    } else {
                                        echo $fet->pro_detail;
                                    }
                                    ?></p>
                                <div class="product-price">
                                    <h5>$<?php echo $fet->pro_price; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Item end -->
            <?php } ?>

        </div>
    </div>
</div>


<!-- Page Body 2 start -->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-6">
                    <h3>Promotion</h3>
                    <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Pages</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php

        $sql = $conn->query("SELECT * FROM tb_product WHERE del_status = '0' ");
        while ($fet = $sql->fetch_object()) {
            
        ?>

            <div class="col-xl-2 col-sm-6 xl-4">
                <div class="card">
                    <div class="product-box">
                        <div class="product-img"><img style="width: 300px; height: 337px; object-fit: cover;" class="img-fluid" src="<?php if($fet->pro_pic){
                                            echo "images/product/".$fet->pro_pic;
                                        }else{
                                            echo "images/product/11.jpg";
                                        } ?>" alt="" data-original-title="" title="">
                            <div class="product-hover">
                                <ul>
                                    <li>
                                        <button class="btn" type="button" data-original-title="" title=""><a href="index.php?p=product_page&pro_id=<?php echo $fet->pro_id ?>" style="color:black"><i class="icon-shopping-cart"></a></i></button>
                                    </li>
                                    <li>
                                        <button class="btn" type="button" data-original-title="" title=""><a href="index.php?p=product_page&pro_id=<?php echo $fet->pro_id ?>" style="color:black"><i class="icofont icofont-law-alt-2"></a></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-details">
                            <h4><?php echo $fet->pro_name; ?></h4>

                            <p><?php
                                if (strlen($fet->pro_detail) > 20) {
                                    echo mb_substr($fet->pro_detail, 0, 30) . " ...";
                                } else {
                                    echo $fet->pro_detail;
                                }
                                ?></p>
                            <div class="product-price">
                                <h5>$<?php echo $fet->pro_price; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
<!-- Page Body 2 End -->
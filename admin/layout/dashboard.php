
<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-6">
          <h3>
            Ecommerce</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
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
    <div class="row size-column">
     
         
          
      <div class="col-xl-8 box-col-12 xl-60">
        <div class="card o-hidden dash-chart">
          <div class="card-header card-no-border">
            
            <div class="media">
              <div class="media-body">
                <p><span class="f-w-500 font-roboto">ยอดขายวันนี้</span></p>
                <h4 class="f-w-500 mb-0 f-26">$ <span class="counter"><?php echo number_format(getSaleThisDay(),2); ?></span></h4>
              </div>
              <div class="media-body">
                <p><span class="f-w-500 font-roboto">ยอดขายเดือนนี้</span></p>
                <h4 class="f-w-500 mb-0 f-26">$ <span class="counter"><?php echo number_format(getSaleThisMon(),2); ?></span></h4>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="negative-container">
              <!-- <div id="negative-chart"></div> -->
  <canvas id="myChart"></canvas>

            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-50 box-col-12">
        <div class="card">
          <div class="card-header card-no-border">
            <h5>สินค้าใหม่</h5>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="fa fa-spin fa-cog"></i></li>
                <li><i class="view-html fa fa-code"></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="our-product">
              <div class="table-responsive">
                <table class="table table-bordernone">




                  <tbody class="f-w-500">
                    <?php 

    $query_pro = $conn->query("SELECT * FROM tb_product WHERE del_status = '0' ORDER BY pro_id DESC LIMIT 0,5 ");
    while ($fet_pro = $query_pro->fetch_object()) { ?>
                   <tr>
                      <td>

                          <div class="media-body"><span><?php echo $fet_pro->pro_name ?></span>
                            <p class="font-roboto"><?php echo $fet_pro->pro_amount ?> item</p>
                          
                        </div>
                      </td>
                      <td>
                        <p>ราคาทุน</p><span><?php echo $fet_pro->pro_costprice ?></span>
                      </td>
                      <td>
                        <p>ราคาขาย</p><span><?php echo $fet_pro->pro_price ?></span>
                      </td>
                    </tr>   
<?php    }

 ?>
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      


          <div class="col-xl-12">
            <div class="card">

              <div class="card-header"> 
                <h5>ข้อมูลสินค้าที่ควรเติม stock</h5>
              </div>
              <div class="card-body">
                <div class="best-seller-table responsive-tbl">
                  <div class="item">
                    <div class="table-responsive product-list">
                      <table  class="display" id="basic-1">
                        <thead>
                          <tr class="text-center">
                            <th>ลำดับ</th>
                            <th >สินค้า</th>
                            <th >ราคาขาย</th>
                            <th >ราคาทุน</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>จำนวนที่ขายไป</th>
                            <th>ยอดขาย</th>
                            <th >กำไร</th>
                          </tr>
                        </thead>
                        <tbody>
<?php 
  
  $query = $conn->query("SELECT * FROM tb_product WHERE del_status != '1' AND pro_amount <= pro_low ");
  $i  =1;
  while ($fet = $query->fetch_object()) { ?>
    
                          <tr class="text-right">
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td ><?php echo $fet->pro_name ?></td>
                            <td ><?php echo $fet->pro_price ?></td>
                            <td ><?php echo $fet->pro_costprice ?></td>
                            <td><?php echo $fet->pro_amount ?></td>
                            <td><?php  echo countSale($fet->pro_id); ?></td>
                            <td><?php echo productSale($fet->pro_id);  ?></td>
                            <td><?php echo profit($fet->pro_id); ?></td>
                            
                          </tr>
<?php  }

 ?>

                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



     
          <div class="col-xl-12">
            <div class="card">

              <div class="card-header"> 
                <h5>ข้อมูลสินค้า</h5>
              </div>
              <div class="card-body">
                <div class="best-seller-table responsive-tbl">
                  <div class="item">
                    <div class="table-responsive product-list">
                      <table  class="display" id="basic-1">
                        <thead>
                          <tr class="text-center">
                            <th>ลำดับ</th>
                            <th >สินค้า</th>
                            <th >ราคาขาย</th>
                            <th >ราคาทุน</th>
                            <th>จำนวนคงเหลือ</th>
                            <th>จำนวนที่ขายไป</th>
                            <th>ยอดขาย</th>
                            <th >กำไร</th>
                          </tr>
                        </thead>
                        <tbody>
<?php 
  
  $query = $conn->query("SELECT * FROM tb_product WHERE del_status != '1' ");
  $i  =1;
  while ($fet = $query->fetch_object()) { ?>
    
                          <tr class="text-right">
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td ><?php echo $fet->pro_name ?></td>
                            <td ><?php echo $fet->pro_price ?></td>
                            <td ><?php echo $fet->pro_costprice ?></td>
                            <td><?php echo $fet->pro_amount ?></td>
                            <td><?php  echo countSale($fet->pro_id); ?></td>
                            <td><?php echo productSale($fet->pro_id);  ?></td>
                            <td><?php echo profit($fet->pro_id); ?></td>
                            
                          </tr>
<?php  }

 ?>

                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>





        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  <?php 

  $month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $ans_problem = array();
  $date = date("Y-m");

  for($count_i = 1; $count_i <= count($month); $count_i++){
    $total = 0;
      $query_ans = $conn->query("SELECT tb_order.order_id FROM tb_order  WHERE MONTH(created_at) = '".$count_i."' AND YEAR(created_at) = '".date("Y")."' AND order_status >= '1' ");
      while ($fet_total = $query_ans->fetch_object()) {
        $total += orderTotal($fet_total->order_id);
      }
       // $fet_ans = $query_ans->fetch_object();
      array_push($ans_problem, $total);
  }

 ?>
var data_row = <?php echo  json_encode($month); ?>;
var data_ans = <?php echo json_encode($ans_problem); ?>;
  const labels = data_row;

  const data = {
    labels: labels,
    datasets: [{
      label: 'ยอดขาย',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: data_ans,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<script>
  
</script>
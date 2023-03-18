<?php 

	require '../connect.php';
	// require_once '../connect.php';

function orderTotal($id)
{
	require '../connect.php';
	$total = 0;
	$query = $conn->query("SELECT * FROM tb_orderitem WHERE order_id = '".$id."' ");
	while ($fet = $query->fetch_object()) {
		$total += $fet->pro_amount * $fet->pro_price_now;
	}
	return $total;
}

function itemTotal($order_id, $pro_id)
{
	require '../connect.php';
	
	$total = 0;
	$query = $conn->query("SELECT * FROM tb_orderitem WHERE order_id = '".$order_id."' AND pro_id = '".$pro_id."' ");
	$fet = $query->fetch_object();
	$total  = $fet->pro_amount * $fet->pro_price_now;
	return $total;
}

function getSaleThisDay(){
	require '../connect.php';

	$total = 0;
	$query_ans = $conn->query("SELECT tb_order.order_id FROM tb_order  WHERE DAY(created_at) = '".date("d")."' AND MONTH(created_at) = '".date("m")."' AND YEAR(created_at) = '".date("Y")."' AND order_status >= '1' ");
      while ($fet_total = $query_ans->fetch_object()) {
        $total += orderTotal($fet_total->order_id);
      }
   	
   	return $total;
}

function getSaleThisMon(){
	require '../connect.php';

	$total = 0;
	$query_ans = $conn->query("SELECT tb_order.order_id FROM tb_order  WHERE MONTH(created_at) = '".date("m")."' AND YEAR(created_at) = '".date("Y")."' AND order_status >= '1' ");
      while ($fet_total = $query_ans->fetch_object()) {
        $total += orderTotal($fet_total->order_id);
      }
   	
   	return $total;
}


function countSale($pro_id){
	require '../connect.php';
	return $conn->query("SELECT SUM(pro_amount) AS sum FROM tb_orderitem WHERE pro_id = '".$pro_id."'  ")->fetch_object()->sum;

}


function productSale($pro_id)
{
	require '../connect.php';
	$total = 0;
	$query =  $conn->query("SELECT * FROM tb_orderitem WHERE pro_id = '".$pro_id."'  ");
	while ($fet = $query->fetch_object()) {
		$total += ($fet->pro_price_now * $fet->pro_amount);
 	}
	return $total;
}


function profit($pro_id){
	require '../connect.php';

	$total = 0;
	$query =  $conn->query("SELECT o.*, p.pro_costprice FROM tb_orderitem o LEFT JOIN tb_product p ON p.pro_id = o.pro_id  WHERE o.pro_id = '".$pro_id."'  ");
	while ($fet = $query->fetch_object()) {
		$total += ($fet->pro_price_now * $fet->pro_amount) - ($fet->pro_costprice * $fet->pro_amount);
 	}
	return $total;
}


function orderStatus($i){
	$data = array('รอตรวจสอบการชำระเงิน','กำลังเตรียมการจัดส่ง','สินค้ากำลังจัดส่งโดยบริษัทขนส่ง','สินค้าจัดส่งสำเร็จ');
	return $data[$i];
}


 ?>
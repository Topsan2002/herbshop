<?php 


function orderTotal($id)
{
	require 'connect.php';
	$total = 0;
	$query = $conn->query("SELECT * FROM tb_orderitem WHERE order_id = '".$id."' ");
	while ($fet = $query->fetch_object()) {
		$total += $fet->pro_amount * $fet->pro_price_now;
	}
	return $total;
}

function itemTotal($order_id, $pro_id)
{
	require 'connect.php';
	
	$total = 0;
	$query = $conn->query("SELECT * FROM tb_orderitem WHERE order_id = '".$order_id."' AND pro_id = '".$pro_id."' ");
	$fet = $query->fetch_object();
	$total  = $fet->pro_amount * $fet->pro_price_now;
	return $total;
}


function orderStatus($i){
	$data = array('รอตรวจสอบการชำระเงิน','กำลังเตรียมการจัดส่ง','สินค้ากำลังจัดส่งโดยบริษัทขนส่ง','สินค้าจัดส่งสำเร็จ');
	return $data[$i];
}


 ?>
<?php 

require '../connect.php';
session_start();
switch ($_REQUEST['ac']) {
	case 'add':


	$status = true;
	for ($i = 0; $i < count($_SESSION['chart']); $i++) {
		if ($_SESSION['chart'][$i]->pro_id == $_REQUEST['pro_id']) {
			$status = false;
			$_SESSION['chart'][$i]->amount += $_REQUEST['amount'];
		}
	}
	if ($status) {
		$object = (object) [
			'pro_id' => $_REQUEST['pro_id'],
			'amount' => $_REQUEST['amount'],
		];
		array_push($_SESSION['chart'], $object);
	}
	$msg="ใส่ตระกร้าสำเร็จ";
	for ($i = 0; $i < count($_SESSION['chart']); $i++) {
		$fet = $conn->query("SELECT * FROM tb_product WHERE pro_id = '".$_SESSION['chart'][$i]->pro_id."' ")->fetch_object();
		if ($fet->pro_amount < $_SESSION['chart'][$i]->amount) {
			$_SESSION['chart'][$i]->amount = $fet->pro_amount;
			$msg .= "<br>สินค้า : ".$fet->pro_name." <br>มีจำนวนเหลือเพียง : ".$fet->pro_amount."<br>จึงมีการเปลี่ยนแปลงจำนวน" ;
		}
	}
	

	$data = array('status'=>true, 'msg'=>$msg);
	echo json_encode($data);

	break;

	case 'remove_order':
	ob_start();
	unset($_SESSION['chart'][$_REQUEST['index']]);
	$_SESSION['chart'] = array_values($_SESSION['chart']);
	var_dump($_SESSION['chart']);
	$output = ob_get_clean();


	$data = array('status'=>true, 'msg'=>'ลบออกจากตระกร้าสำเร็จ');
	echo json_encode($data);

	break;


	case 'add_order':


	if (count($_SESSION['chart']) <=0 ) {
			$data = array('status'=>false, 'msg'=>"ไม่มีสินค้าในตะกร้า");

	}else{

	$msg="สั่งซื้อสำเร็จ";
	$query = $conn->query("INSERT INTO tb_order(user_id, order_status, created_at, pay_total, pay_date, pay_time) 
		VALUES ('".$_SESSION['user_id']."', '0', NOW(), '".$_REQUEST['pay_total']."', '".$_REQUEST['pay_date']."', '".$_REQUEST['pay_time']."' ) ");



	$id = $conn->query("SELECT MAX(order_id) AS id FROM tb_order  ")->fetch_object()->id;


	if ($_FILES['pay_pic']['name']) {

        			$imageFileType = strtolower(pathinfo($_FILES["pay_pic"]["name"],PATHINFO_EXTENSION));
					$target_dir = "../images/payment/";
					$img = "pay-".$id.".".$imageFileType;
					$target_file = $target_dir . basename($img);
					move_uploaded_file($_FILES["pay_pic"]["tmp_name"], $target_file); 
					$query_file = $conn->query("UPDATE tb_order SET pay_pic = '".$img."' WHERE order_id = '".$id."'  ");	
        	}

	for ($i = 0; $i < count($_SESSION['chart']); $i++) {
		$fet = $conn->query("SELECT * FROM tb_product WHERE pro_id = '".$_SESSION['chart'][$i]->pro_id."' ")->fetch_object();
		if ($fet->pro_amount < $_SESSION['chart'][$i]->amount) {
			$_SESSION['chart'][$i]->amount = $fet->pro_amount;
			$msg .= "<br>สินค้า : ".$fet->pro_name." <br>มีจำนวนเหลือเพียง : ".$fet->pro_amount."<br>จึงมีการเปลี่ยนแปลงจำนวน" ;
		}
		// $total = $_SESSION['chart'][$i]->amount * $fet->pro_price;
		$query_detail = $conn->query("INSERT INTO tb_orderitem(order_id, pro_id, pro_amount, pro_price_now) 
			VALUES ('".$id."', '".$fet->pro_id."', '".$_SESSION['chart'][$i]->amount."','".$fet->pro_price."' )  ");
		$stock = $fet->pro_amount - $_SESSION['chart'][$i]->amount;
		$update_pro = $conn->query("UPDATE tb_product SET pro_amount = '".$stock."' WHERE pro_id = '".$fet->pro_id."' ");
	}

	unset($_SESSION['chart']);
	if ($query) {
			$data = array('status'=>true, 'msg'=>$msg);

	}else{
	$data = array('status'=>false, 'msg'=>'error inset databas3e');

	}	

	}

	

	echo json_encode($data);

	break;

	default:
			// code...
	break;
}





?>
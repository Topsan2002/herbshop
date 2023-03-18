<?php 
	session_start();
	require '../../connect.php';

	switch ($_REQUEST['ac']) {
		case 'upstatus':
			$orderStatus = $conn->query("SELECT tb_order.order_status FROM tb_order WHERE  order_id = '".$_REQUEST['order_id']."' ")->fetch_object()->order_status;
			$orderStatus++;
			$query = $conn->query("UPDATE tb_order SET order_status = '".$orderStatus."', emy_id = '".$_SESSION['user_id']."' WHERE order_id = '".$_REQUEST['order_id']."'   ");
	
			if ($query) {
				
				$data = array('status'=>true, 'msg'=>'อัพเดทสถานะสำเร็จ');
			}else{
				$data = array('status'=>true, 'msg'=>'อัพเดทสถานะไม่สำเร็จ');

			}
			echo json_encode($data);

			break;
			
		default:
			// code...
			break;
	}



 ?>
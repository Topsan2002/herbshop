<?php 

	require '../../connect.php';
	session_start();
	switch ($_REQUEST['ac']) {
		case 'add':
			
			$query = $conn->query("INSERT INTO tb_category(cat_name) VALUES ('".$_REQUEST['cat_name']."') ");
 			if ($query) {
				$data = array('status'=>true, 'msg'=>'เพิ่มข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'เพิ่มข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;
		
		case 'edit':
			
			$query = $conn->query("UPDATE tb_category SET cat_name = '".$_REQUEST['cat_name']."' WHERE cat_id = '".$_REQUEST['cat_id']."' ");
			if ($query) {
				$data = array('status'=>true, 'msg'=>'แก้ไขข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'แก้ไขข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;

		case 'del':
			
			$query = $conn->query("UPDATE tb_category SET del_status  = '1' WHERE cat_id = '".$_REQUEST['cat_id']."' ");
			if ($query) {
				$data = array('status'=>true, 'msg'=>'ลบข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'ลบข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;

		default:
			// code...
			break;
	}


 ?>
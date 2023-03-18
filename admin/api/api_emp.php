<?php 

	require '../../connect.php';
	session_start();
	switch ($_REQUEST['ac']) {
		case 'add':
			
			// $query = $conn->query("INSERT INTO tb_category(cat_name) VALUES ('".$_REQUEST['cat_name']."') ");
			$query = $conn->query("INSERT INTO tb_employee(fname,lname,email,phone,pwd, role_id) 
				VALUES ('".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['email']."', '".$_REQUEST['phone']."', '".md5($_REQUEST['phone'])."', '".$_REQUEST['role_id']."'  ) ");
 			if ($query) {
				$data = array('status'=>true, 'msg'=>'เพิ่มข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'เพิ่มข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;
		
		case 'edit':
			
			// $query = $conn->query("UPDATE tb_category SET cat_name = '".$_REQUEST['cat_name']."' WHERE cat_id = '".$_REQUEST['cat_id']."' ");
			$query = $conn->query("UPDATE tb_employee SET fname = '".$_REQUEST['fname']."', lname = '".$_REQUEST['lname']."', email = '".$_REQUEST['email']."', phone = '".$_REQUEST['phone']."', role_id = '".$_REQUEST['role_id']."'  WHERE emp_id = '".$_REQUEST['emp_id']."' ");
			if ($query) {
				$data = array('status'=>true, 'msg'=>'แก้ไขข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'แก้ไขข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;

		case 'del':
			
			$query = $conn->query("UPDATE tb_employee SET del_status  = '1' WHERE emp_id = '".$_REQUEST['emp_id']."' ");
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
<?php 
	require_once '../../connect.php';

	switch ($_REQUEST['ac']) {
		case 'edit':

			$query = $conn->query("UPDATE tb_user SET 
            fname = '".$_REQUEST['fname']."', lname = '".$_REQUEST['lname']."', phone = '".$_REQUEST['phone']."',
            address = '".$_REQUEST['address']."'
				WHERE user_id = '".$_REQUEST['user_id']."' ");

        	if ($query) {
				$data = array('status'=>true, 'msg'=>'แก้ไขข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'แก้ไขข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);

			break;


		default:
			$data = array('status'=>false, 'msg'=>'action ผิด ');
			echo json_encode($data);
			break;
	}

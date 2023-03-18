<?php 
	require_once '../../connect.php';

	switch ($_REQUEST['ac']) {
		case 'add':
			
			$query = $conn->query("INSERT INTO tb_product(
				pro_name, cat_id,pro_detail, pro_amount, pro_price, pro_costprice, pro_low) 
			VALUES(
				'".$_REQUEST['pro_name']."', '".$_REQUEST['cat_id']."', '".$_REQUEST['pro_detail']."', '".$_REQUEST['pro_amount']."', '".$_REQUEST['pro_price']."', '".$_REQUEST['pro_costprice']."', '".$_REQUEST['pro_low']."'
				)  
			");

			$max = $conn->query("SELECT MAX(pro_id) AS maxId FROM tb_product ");
			$maxId = $max->fetch_object()->maxId;
			if ($_FILES['pro_pic']['name']) {

        			$imageFileType = strtolower(pathinfo($_FILES["pro_pic"]["name"],PATHINFO_EXTENSION));
					$target_dir = "../../images/product/";
					$img = "pic-".$maxId.".".$imageFileType;
					$target_file = $target_dir . basename($img);
					move_uploaded_file($_FILES["pro_pic"]["tmp_name"], $target_file); 
					$query_file = $conn->query("UPDATE tb_product SET pro_pic = '".$img."' WHERE pro_id = '".$maxId."'  ");	
        	}


			if ($query) {
				$data = array('status'=>true, 'msg'=>'เพิ่มข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'เพิ่มข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);

			break;
		

		case 'edit':
			
			$query = $conn->query("UPDATE tb_product  SET 
				pro_name = '".$_REQUEST['pro_name']."', cat_id = '".$_REQUEST['cat_id']."', pro_detail = '".$_REQUEST['pro_detail']."',
				pro_amount = '".$_REQUEST['pro_amount']."', pro_price = '".$_REQUEST['pro_price']."', pro_costprice = '".$_REQUEST['pro_costprice']."',
				pro_low = '".$_REQUEST['pro_low']."'
				WHERE pro_id = '".$_REQUEST['pro_id']."' ");
			$maxId = $_REQUEST['pro_id'];
			if ($_FILES['pro_pic']['name']) {
        			$imageFileType = strtolower(pathinfo($_FILES["pro_pic"]["name"],PATHINFO_EXTENSION));
					$target_dir = "../../images/product/";
					$img = "pic-".$maxId.".".$imageFileType;
					$target_file = $target_dir . basename($img);
					move_uploaded_file($_FILES["pro_pic"]["tmp_name"], $target_file); 
					$query_file = $conn->query("UPDATE tb_product SET pro_pic = '".$img."' WHERE pro_id = '".$maxId."'  ");	
        	}


        	if ($query) {
				$data = array('status'=>true, 'msg'=>'แก้ไขข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'แก้ไขข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);

			break;


		case 'del':
			
			$query = $conn->query("UPDATE tb_product SET del_status = '1' WHERE pro_id = '".$_REQUEST['pro_id']."' ");

        	if ($query) {
				$data = array('status'=>true, 'msg'=>'ลบข้อมูลสำเร็จ');
			}else{
				$data = array('status'=>false, 'msg'=>'ลบข้อมูลไม่สำเร็จ');
			}
			echo json_encode($data);
			break;


		default:
			$data = array('status'=>false, 'msg'=>'action ผิด ');
			echo json_encode($data);
			break;
	}



 ?>
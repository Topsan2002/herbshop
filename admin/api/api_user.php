<?php

session_start();
require_once '../../connect.php';

switch ($_REQUEST['ac']) {
	case 'login':

	$query = $conn->query("SELECT * FROM tb_user 
		LEFT JOIN user_role ON user_role.role_id = tb_user.role_id
		WHERE email = '" . $_REQUEST['email'] . "' AND password  = '" . md5($_REQUEST['password']) . "' ");

	if ($query->num_rows <= 0) {

		$query_em = $conn->query("SELECT * FROM tb_employee
		LEFT JOIN user_role ON user_role.role_id = tb_employee.role_id
		 WHERE email = '" . $_REQUEST['email'] . "' AND pwd  = '" . md5($_REQUEST['password']) . "' ");
		if ($query_em->num_rows <= 0) {
			$data = array("status" => false, 'msg' => 'ลงชื่อเข้าใช้ไม่สำเร็จ');
		}else{
			$result = $query_em->fetch_object();
			// $update = $conn->query("UPDATE tb_user SET last_login = NOW() WHERE user_id = '" . $result->user_id . "' ");
			$_SESSION["sess_id"] = session_id();
			$_SESSION['user_id'] = $result->emp_id;
			$_SESSION['role_id'] = $result->role_id;
			$_SESSION['role_name'] = $result->role_name;
			$_SESSION['fname'] = $result->fname;
			$_SESSION['lname'] = $result->lname;
			$_SESSION['email'] = $result->email;
			$_SESSION['phone'] = $result->phone;
			if (!empty($_REQUEST['remember'])) {
				setcookie('user_login', $_REQUEST['email'], time() + (10 * 365 * 24 * 60 * 60));
				setcookie('user_password', md5($_REQUEST['password']), time() + (10 * 365 * 24 * 60 * 60));
			} else {
				if (isset($_COOKIE['user_login'])) {
					setcookie('user_login', '');
					if (isset($_COOKIE['user_password'])) {
						setcookie('user_password', '');
					}
				}
			}
			$path = $result->role_id == 2 ? '../../' : '../';
			$data = array('status' => true, 'msg' => 'ลงชื่อเข้าใช้สำเร็จ '.$result->role_name, 'path' => $path);
		}


	} else {

		$result = $query->fetch_object();
		$update = $conn->query("UPDATE tb_user SET last_login = NOW() WHERE user_id = '" . $result->user_id . "' ");
		$_SESSION["sess_id"] = session_id();
		$_SESSION['user_id'] = $result->user_id;
		$_SESSION['role_id'] = $result->role_id;
		$_SESSION['role_name'] = $result->role_name;
		$_SESSION['fname'] = $result->fname;
		$_SESSION['lname'] = $result->lname;
		$_SESSION['email'] = $result->email;
		$_SESSION['phone'] = $result->phone;
		if (!empty($_REQUEST['remember'])) {
			setcookie('user_login', $_REQUEST['email'], time() + (10 * 365 * 24 * 60 * 60));
			setcookie('user_password', md5($_REQUEST['password']), time() + (10 * 365 * 24 * 60 * 60));
		} else {
			if (isset($_COOKIE['user_login'])) {
				setcookie('user_login', '');
				if (isset($_COOKIE['user_password'])) {
					setcookie('user_password', '');
				}
			}
		}
		$path = $result->role_id == 2 ? '../../' : '../';
		$data = array('status' => true, 'msg' => 'ลงชื่อเข้าใช้สำเร็จ', 'path' => $path);
	}

	echo json_encode($data);

	break;

	case 'reg':
	if ($conn->query("SELECT tb_user.user_id FROM tb_user WHERE email = '" . $_REQUEST['email'] . "' ")->num_rows > 1) {
		$data = array('status' => false, 'msg' => 'email ของคุณซ้ำ');
	} else {
		$query = $conn->query("INSERT INTO tb_user (fname, lname, email, phone, password, created_at, role_id) 
			VALUES ('" . $_REQUEST['fname'] . "', '" . $_REQUEST['lname'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['phone'] . "', '" . md5($_REQUEST['password']) . "', NOW(), '2') ");
			if ($query) {
				$data = array('status' => true, 'msg' => 'สมัครเข้าใช้งานสำเร็จ');
			} else {
				$data = array('status' => false, 'msg' => 'สมัครไม่สำเร็จ');
			}
		}

		echo json_encode($data);

		break;

		case 'edit':
		$query = $conn->query("UPDATE tb_user SET fname = '" . $_REQUEST['fname'] . "', lname = '" . $_REQUEST['lname'] . "', username = '" . $_REQUEST['username'] . "', phone = '" . $_REQUEST['phone'] . "'
			WHERE user_id = '" . $_REQUEST['user_id'] . "' ");
		if ($query) {
			$data = array('status' => true, 'msg' => 'แก้ไขข้อมูลสำเร็จ');
			$_SESSION['fname'] = $_REQUEST['fname'];
			$_SESSION['lname'] = $_REQUEST['lname'];
			$_SESSION['username'] = $_REQUEST['username'];
			$_SESSION['phone'] = $_REQUEST['phone'];

			$path = $_SESSION['user_role'] == 2 ? '../../' : '../';
			$data = array('status' => true, 'msg' => 'แก้ไขข้อมูลสำเร็จ', 'path' => $path);
		} else {
			$data = array('status' => false, 'msg' => 'แก้ไขข้อมูลไม่สำเร็จ');
		}

		echo json_encode($data);


		break;

		default:
		// code...
		break;
	}

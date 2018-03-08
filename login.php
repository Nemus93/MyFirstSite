<?php
include 'init.php';
if(empty($_POST["username"]) || empty($_POST["password"])) {
	/* Form Required Field Validation */
		$error_message = "All Fields are required";
		$_SESSION['w'] = "loginW";
}
	if(isset($_POST['username'], $_POST['password'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if(!empty($username) && !empty($password)){
			$conn = Connect::getInstance();
			$stmtUserCheck = $conn->prepare("SELECT * FROM users WHERE username=? AND password = ?");
			$stmtUserCheck->bindValue(1, $username);
			$stmtUserCheck->bindValue(2, $password);
			$stmtUserCheck->execute();
			if($stmtUserCheck->rowCount() > 1){
				$error_message = "System error. Try Again!";	
			}else if($stmtUserCheck->rowCount() == 0){
				$error_message = "Unknown user. Try Again!";	
			}
			$error_message = "";
			$success_message = "You have login successfully!";	
			$user = $stmtUserCheck->fetch(PDO::FETCH_ASSOC);
			$_SESSION['f_name'] = $user['f_name'];
			$_SESSION['l_name'] = $user['l_name'];
			$_SESSION['status'] = $user['status'];
			$_SESSION['w'] = "infoUserW";
			header('location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

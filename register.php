<?php
require_once 'oauth/dbconnect.php';

if (!loggedin()) {
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['reg_email']) && isset($_POST['reg_password']) && isset($_POST['reg_confirm'])) {
		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
		$email = $_POST['reg_email'];
		$password = $_POST['reg_password'];
		$password_confirm = $_POST['reg_confirm'];
		$password_hash = md5($password);
		if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($password_confirm)) {
			if($password != $password_confirm) {
				echo 'Passwords do not match. Please try again.';
			} else {
				$reg_query = "SELECT email FROM Users WHERE email='".$email."'";
				$reg_result = mysqli_query($db, $reg_query);
				if($reg_result){
					$reg_num_rows  = mysqli_num_rows($reg_result);
       				if($reg_num_rows == 1) {
       					echo 'A user with the email '.$email .' already exists.';
					} else {
						$reg_query = "INSERT INTO Users VALUES ('', '".mysqli_real_escape_string($db, $email)."', '".mysqli_real_escape_string($db, $fname)."', '".mysqli_real_escape_string($db, $lname)."', '".mysqli_real_escape_string($db, $password_hash)."', 'null', 'null', 'null', 'null')";
						echo $reg_query;
						if($reg_result = mysqli_query($db, $reg_query)){
							header('Location: reg_complete.php');
						} else {
							echo 'Could not register you at this time, please try again later.';
						}
					}
				}
			}
		} else {
			#$title = 'Please enter all fields';
			echo 'Please enter all fields';
		}
	}
} else if (loggedin()) {
	#$title = 'You are already logged in.';
	echo 'You are already logged in.';
}

?>

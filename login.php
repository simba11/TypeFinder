<?php
require_once 'oauth/dbconnect.php';

  if(isset($_POST['login_email']) && isset($_POST['login_password'])) {
    $username = mysqli_real_escape_string($db, $_POST['login_email']);
    $password = mysqli_real_escape_string($db, $_POST['login_password']);
    $password_hash = md5($password);
    if(!empty($username)&&!empty($password)) {
      $query = "SELECT uid FROM Users WHERE email='".$username."' AND password='".$password_hash."'";
      $result = mysqli_query($db, $query);
      if($result){
        $num_rows  = mysqli_num_rows($result);
        if($num_rows == 0) {
          echo 'Incorrect email or password. Please try again.';
        } else if ($num_rows == 1){
           $res = $result->fetch_assoc();
           $user_id = $res['uid'];
           $_SESSION['user_id'] = $user_id;
           $db->close();
           header('Location: index.php');
        }
      }
    } 
  }

?>

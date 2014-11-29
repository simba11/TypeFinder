<?php
require 'login.php';
require 'register.php';

/******** COMMENTED OUT TEMPORARILY *****
#force HTTPS
if($_SERVER["HTTPS"] != "on") {
  header("Location: https://". $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  exit;
  }
*/
$title = 'Please Sign in or Register';
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>TypeFinder</title>

    <!-- Bootstrap core CSS -->
    <link href="_/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="_/css/signin.css" rel="stylesheet">
    <link href="_/css/mystyles.css" rel="stylesheet">
  </head>

  <body>
  <h1 class="cover-heading"><?php echo $title; ?></h1>
  <p>(Or use your Twitter or Facebook accounts to sign up by clicking the icons below)</p>
  <!-- link twitter/fb oauth to buttons --> 
  <div class="social-img">
    <a href="twitter_login.php"><img src="img/twitter.png" widh="100" height="100"></a>
    <a href="facebook_login.php"><img src="img/facebook.png" widh="100" height="100"></a>
  </div>
  <!-- rows -->
   <div class="row">
     <!-- log in -->
     <div class="span6 row1">
      <form class="form-signin" method="post" action="auth.php">
         <h2 class="form-signin-heading">Sign in</h2>
         <input type="email" name ="login_email" class="input-block-level" placeholder="Email address" maxlength="20" required autofocus>
         <input type="password" name="login_password" class="input-block-level" placeholder="Password" maxlength="20" required>
         <label class="checkbox">
         <input type="checkbox" value="remember-me"> Remember me <!-- make a cookie! -->
         </label>
         <button class="btn btn-lg btn-default" type="submit" name="submit" value ="login">Sign in</button>
       </form>
      </div>
    <!-- register -->
    <div class="span6 row2">
      <form class="form-signin" method="post" action="auth.php">
         <h2 class="form-signin-heading">Register</h2>
         <input type="text" class="input-block-level" name="first_name" placeholder="First name" maxlength="20" value="<?php echo $_POST['first_name']; ?>" required>
         <input type="text" class="input-block-level" name="last_name" placeholder="Last name" maxlength="20" value="<?php echo $_POST['last_name']; ?>" required>
         <input type="email" class="input-block-level" name="reg_email" placeholder="Email address" maxlength="20" value="<?php echo $_POST['reg_email']; ?>" required>
         <input type="password" class="input-block-level" name="reg_password" placeholder="Password" maxlength="20" required>
         <input type="password-conf" class="input-block-level" name="reg_confirm" placeholder="Confirm password" maxlength="20" required>
         <button class="btn btn-lg btn-default" type="submit" name="submit_reg" value ="register">Register</button>
       </form>
    </div>
     <div class="mastfoot">
       <div class="inner float-center">
        <p><a href="index.php">Home</a></p>
      </div>
    </div>
  </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="_/js/bootstrap.js"></script>
    <script src="_/js/myscript.js"></script>
  </body>
</html>
<?php
require 'oauth/dbconnect.php';

if (loggedin()){
  $status = 'logout.php';
  $status_message = 'Logout';
} else {
  $status = 'auth.php';
  $status_message = 'Login/Register';
}

?>

<!DOCTYPE html>
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
    <link href="_/css/mystyles.css" rel="stylesheet">

  </head>

<body>
<div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          <h3 class="masthead-brand">TypeFinder</h3>
          <ul class="nav masthead-nav">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="about.php">About TypeFinder</a></li>
                  <li><a href="tech.php">Technologies used</a></li>
                  <li><a href="author.php">About the Author</a></li>
                </ul>
                <li class="active"><a href="fonts.php">Font List</a></li>
                <li><a href="<?php echo $status; ?>"><?php echo $status_message; ?></a></li>
              </ul>

      <!-- End font list -->
      </div>

    </div>

        <div class="fontbody">
        <h2>Fonts</h2>
          <!-- Font list -->
          <ul class="list-unstyled">
            <?php
              if (loggedin()) {
                $query = "SELECT * FROM Fonts ORDER BY Font";
                $result = mysqli_query($db, $query);
                while($cur = $result->fetch_assoc()){
                  echo '<li><a href="#">'.$cur['font'].'</a></li>';
                }
              } else {
                echo '<h3>You must be logged in to see and download fonts. Please Login or register</h3>';
              }
            ?>
          </ul>
      </div>
      <div class="mastfoot">
        <div class="inner">
          <p>TypeFinder, an IAT352 Project by <a href="http://www.simbrar.com">Sim Brar</a>.</p>
        </div>
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

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
              <h3 class="masthead-brand"><a href="index.php">TypeFinder</a></h3>
              <ul class="nav masthead-nav">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="about.php">About TypeFinder</a></li>
                  <li><a href="tech.php">Technologies used</a></li>
                  <li><a href="author.php">About the Author</a></li>
                </ul>
                <li><a href="fonts.php">Font List</a></li>
                <li><a href="<?php echo $status; ?>"><?php echo $status_message; ?></a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h2>Technologies used:</h2><br /><br />
              <h4>Tech Stack:</h4>
              <ul class="list-unstyled">
                <li>PHP</li>
                <li>Javascript</li>
                <li>HTML</li>
                <li>XML</li>
                <li>CSS</li>
                <li>MySQL</li>
                <li>Bootstrap</li>
              </ul>

              <h4>Technologies / Skills:</h4>
              <ul class="list-unstyled">
                <li>Apache</li>
                <li>Sessions</li>
                <li>Security</li>
                <li>XSS/SQL Injection prevention</li>
                <li>Hashing</li>
                <li>oAuth</li>
                <li>SSH / HTTPS</li>
                <li>ERD</li>
                <li>User management</li>
                <li>CRUD</li>
                <li>AJAX</li>
                <li>API integration</li>
              </ul>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>TypeFinder, an IAT352 Project by <a href="http://www.simbrar.com">Sim Brar</a>.</p>
            </div>
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

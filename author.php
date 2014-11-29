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
            <h2>About me:</h2>
           <p>Hi, my name is <b>Sim Brar</b>. I'm a senior student at <abbr title='Simon Fraser University'>SFU</abbr> (in my last semester!) 
           with a major in SIAT (Information Systems) and minors in Computing Science (primarily in web development/cloud architectures) and 
           Business Administration(focussed solely on entrepreneurship).
           <br /><br />
           I built this site as a project for my IAT 352 web course, but may continue to build on it to the point where I can
           confidently release it as a tool for designers. I can happily say it has made me gain a new found respect for PHP!
           <br /><br />
           In my free time, I like to box, go for runs, and read (a lot) on things that interest me. I am interested in the areas of Web Development, 
           Cloud Computing, and Startups. 
           </p>
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

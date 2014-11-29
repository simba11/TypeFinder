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
            <h2>About Typefinder</h2>
           <p>TypeFinder is a tool for finding the right typeface (or font) for your next project.
            The project was designed as an experiment in interaction. Originally adapted from Julian Hansen’s ‘So You Need A Typeface’, TypeFinder explores interactivity (specifically with decision-trees and flow diagrams) on a digital medium. <br /><br />
            <h3>Functionality:</h3>
            <b>Finding the right type</b> – Choosing one of five categories, visitors can traverse through a series of questions helping them determine the correct typeface for their project by using both a logical and preferential criteria. <br/>
            <br />
            <b>Font List</b> – Visitors can view the entire list of fonts, and sort alphabetically or by category. <br/>

            Login / Registration- Visitors can login through some social media channels (Facebook, Twitter), or by creating an account.<br/><br/>
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

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
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      
      $('#submit').click(function (){
        var search_term= { q: 'font' };
        search(search_term);
      });

    });

    function search(search_term) {

      $.ajax({
        url: 'http://search.twitter.com/search.json?' + $.param(search_term),
        dataType: 'jsonp',
        
        success: function(data) {
          console.dir(data);
          for (item in data['results']) {
            $('#tweets').append(
              '<li>' + data['results'][item]['text'] + '</li>'
              );
          }
        }

      });

    }
     </script>
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
            <h1 class="cover-heading">TypeFinder</h1>
            <p class="lead">Need some help finding the right font for your next project?<br/>Maybe I can help.<br/><br/>Select a category below to get started.</p>
            <p class="lead">
              <a href="tree/showTree.php?Book" class="btn btn-lg btn-default">Book</a>
              <a href="tree/showTree.php?Logo" class="btn btn-lg btn-default">Logo</a>
              <a href="tree/showTree.php?Infographic" class="btn btn-lg btn-default">Infographic</a>
              <a href="tree/showTree.php?Invitation" class="btn btn-lg btn-default">Invitation</a>
              <a href="tree/showTree.php?Newspaper" class="btn btn-lg btn-default">Newspaper</a>
            </p>
          </div>
          <br>
          <h3>See who's talking about fonts!</h3>
          <ol id="tweets">
          </ol>
          <a href="#" id="submit">Get tweets</a>

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

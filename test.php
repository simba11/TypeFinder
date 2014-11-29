<?php
require_once 'oauth/dbconnect.php';

?>

<!DOCTYPE HTML>

<HTMLlang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AJAX Test</title>
	 <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
	<h1>New Tweets</h1>
	<ol id="tweets">
	</ol>
	<a href="#" id="submit">get tweets</a>
</body>
</HTML>
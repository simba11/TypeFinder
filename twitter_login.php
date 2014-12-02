<?php
	require("oauth/twitteroauth.php");
	session_start();

	//Twitter OAUTH instance
	$twitteroauth = new TwitterOAuth('###############', '##############################');
	//request authentication tokens
	$request_token = $twitteroauth->getRequestToken('http://localhost:8888/TypeFinder/twitter_oauth.php');
	//save tokens into session localhost/a2/twitter_oauth.php
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

	//auth accepted
	if($twitteroauth->http_code==200){
    //generate the URL and redirect
    	$url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    	header('Location: '. $url);
	} else {
    //kill script
    	die('Something wrong happened.');
	}

?>

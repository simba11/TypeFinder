<?php
//set application variables.
$app_id		= "1400991123499537";
$app_secret	= "91c522dbff444beb463d58a82888453d";
$site_url	= "http://localhost/a2/";

try{
	require_once "oauth/facebook.php";
}catch(Exception $e){
	error_log($e);
}
echo 'test';
//create application instance
$facebook = new Facebook(array(
	'appId'		=> $app_id,
	'secret'	=> $app_secret,
	));

//get fb user ID
$user = $facebook->getUser();


//if user is logged in/authenticated.
if($user){
	try{
		// Proceed knowing you have a logged in user who's authenticated.
		$user_profile = $facebook->api('/me');
	}catch(FacebookApiException $e){
		error_log($e);
		$user = NULL;
	}
}

//if user is logged in/authenticated.
if($user){
	//Get logout URL
	$logoutUrl = $facebook->getLogoutUrl();
} else{
	//Get login URL
	$loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
		'redirect_uri'	=> $site_url,
		));
}

//if user is logged in/authenticated.
if($user){ 
	//Save method calls into an array
	$queries = array(
		array('method' => 'GET', 'relative_url' => '/'.$user),
		array('method' => 'GET', 'relative_url' => '/'.$user.'/home?limit=50'),
		array('method' => 'GET', 'relative_url' => '/'.$user.'/friends'),
		array('method' => 'GET', 'relative_url' => '/'.$user.'/photos?limit=6'),
		);
 
	//POST your queries
	try{
		$batchResponse = $facebook->api('?batch='.json_encode($queries), 'POST');
	}catch(Exception $o){
		error_log($o);
	}
 
	//return JSON info.
	$user_info		= json_decode($batchResponse[0]['body'], TRUE);
	$feed			= json_decode($batchResponse[1]['body'], TRUE);
	$friends_list		= json_decode($batchResponse[2]['body'], TRUE);
	$photos			= json_decode($batchResponse[3]['body'], TRUE);
 
	//Update users status
	if(isset($_POST['publish'])){
		try{
			$publishStream = $facebook->api("/$user/feed", 'post', array(
				'message'		=> 'Check out TypeFinder',
				'link'			=> 'http://TypeFinder.io',
				'picture'		=> 'http://TypeFinder.io/logo',
				'name'			=> 'TypeFinder',
				'caption'		=> 'TypeFinder.io',
				'description'	=> 'A tool for finding the right font for your next project.',
				));
		}catch(FacebookApiException $e){
			error_log($e);
		}
	}
 
	//Update user's status
	if(isset($_POST['status'])){
		try{
			echo 'tes6';
			$statusUpdate = $
			facebook->api("/$user/feed", 'post', array('message'=> $_POST['status']));
		}catch(FacebookApiException $e){
			error_log($e);
		}
	}
}
?>
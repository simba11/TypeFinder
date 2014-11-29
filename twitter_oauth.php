<?php
	require("oauth/twitteroauth.php");
	require_once 'oauth/dbconnect.php';

	session_start();
	if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
    // info valid
		// TwitterOAuth instance
		$twitteroauth = new TwitterOAuth('xv9fHVetac4XRM7S5sblA', 'X8OyQCqtl4eQyBUkkvMlUG8BBWw4hqd98LYesSOrs', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//request access token
		$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
		// Save in session var
		$_SESSION['access_token'] = $access_token;
		//get the user's info
		$user_info = $twitteroauth->get('account/verify_credentials');
		//print_r($user_info);
	
		if(isset($user_info->error)){
		    // error, return to login.
		    header('Location: twitter_login.php');
		} else {
		    // find user by ID
		    $query = "SELECT * FROM Users WHERE oauth_provider = 'twitter' AND oauth_uid = ". $user_info->id;
		    $res = mysqli_query($db, $query);
		    $result = $res->fetch_assoc();
		    // if !id, add to db (register)
		    if(empty($result)){
		    	//get fname, lname
		    	$twitter_names = explode(" ", $user_info->name);
		        $query = mysqli_query($db, "INSERT INTO Users VALUES ('', 'twtact', '{$twitter_names[0]}', 
		        	'{$twitter_names[1]}', 'null' ,'twitter', {$user_info->id}, '{$access_token['oauth_token']}', 
		        	'{$access_token['oauth_token_secret']}')");
		        $query = mysqli_query($db, "SELECT * FROM Users WHERE id = " . mysqli_insert_id($db));
		        $result = $query->fetch_assoc();
		    } else {
		        // pull newest tokens.
		        $query = mysqli_query($db, "UPDATE Users SET oauth_token = '{$access_token['oauth_token']}', oauth_secret = '{$access_token['oauth_token_secret']}' WHERE oauth_provider = 'twitter' AND oauth_uid = {$user_info->id}");
		    }
		    // store session variables.
		    $_SESSION['user_id'] = $result['uid'];
		    $_SESSION['username'] = $result['username'];
		    $_SESSION['oauth_uid'] = $result['oauth_uid'];
		    $_SESSION['oauth_provider'] = $result['oauth_provider'];
		    $_SESSION['oauth_token'] = $result['oauth_token'];
		    $_SESSION['oauth_secret'] = $result['oauth_secret'];
		    //logged in to session, return to index.
			header('Location: index.php'); 
		} 
	} else {
    	// no info available, not logged in, return to register page.
    	header('Location: auth.php');
	}
?>

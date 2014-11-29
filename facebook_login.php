<?php
require_once("oauth/facebook.php");
require_once 'oauth/dbconnect.php';

$facebook = new Facebook(array(
    'appId'  => '1400991123499537',
    'secret' => '91c522dbff444beb463d58a82888453d',
    'cookie' => true
));

//if logged in.
if(!empty($_SESSION['user_id'])){
    header('Location: auth.php');
}

$session = $facebook->getUser();
 
if(!empty($session)) {
    try{
        $uid = $facebook->getUser();
        $user = $facebook->api('/me');
    } catch (Exception $e){}
 
    if(!empty($user)){
        //print_r($user);
    } else {
        die("There was an error.");
    }
} else {
    $login_url = $facebook->getLoginUrl();
    header("Location: ".$login_url);
}

$query = "SELECT * FROM users WHERE oauth_provider = 'facebook' AND oauth_uid = ". $user['id'];
$res = mysqli_query($db, $query);
$result = $res->fetch_assoc();

if(empty($result)){
    $facebook_name = explode(" ", $user->name);
    $query = mysqli_query($db, "INSERT INTO Users VALUES ('', 'facebook', '{$facebook_name[0]}', 
                    '{$facebook_name[1]}', 'null' ,'facebook', '$uid', '1400991123499537', 
                    '91c522dbff444beb463d58a82888453d')");
    $query = mysqli_query($db, "SELECT * FROM Users WHERE id = " . mysqli_insert_id($db));
    $result = $query->fetch_assoc();
    $_SESSION['user_id'] = $result['uid'];
    header('Location: index.php'); 
} else {
    $_SESSION['user_id'] = $result['uid'];
    header('Location: index.php'); 
}
?>
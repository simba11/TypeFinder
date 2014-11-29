<?php
require 'oauth/dbconnect.php';
session_destroy();
#send back to last page
header('Location: '. $http_referer);
?>
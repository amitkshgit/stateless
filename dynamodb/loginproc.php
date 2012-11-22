<?php

// Inialize session
include("dynamodb.php");
error_log("loginproc - Starting Session .... ");
session_start();
error_log("loginproc - Session started ");


// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM admin WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (passcode = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");
print "LOGING: $login<br>";
// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
error_log("loginproc - User logged in ");

header('Location: securedpage.php');
}
else {
// Jump to login page
error_log("loginproc - User failed login ");
mysql_close();
header('Location: index.php?reason=1');
}

?>


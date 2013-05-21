<?php

include('config.inc');
include('dynamodb.php');
// Inialize session
session_start();
$a = session_id();
print "SessionId: $a<br>";
//$a = session_id();
//print "After Session Start Sessid: $a<br>";
$memcache = new Memcache;
$memcache->connect("127.0.0.1", 11211) or die ("Could not connect"); //connect to memcached server
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
error_log("No username was set in session\n");
header('Location: index.php?reason=2');
}

?>
<html>

<head>
<title>Beta Console - S1</title>
</head>

<body>

<p>This is secured page with session: <b><?php echo $_SESSION['username']; ?></b></p>
<?php $instanceid = file_get_contents("http://169.254.169.254/latest/meta-data/instance-id"); ?>
<p> InstanceID: <b><?php echo $instanceid; ?> </p> </b>

<?php

$key = $_POST['key'];
$value = $_POST['value'];

$_SESSION[$key] = $value;

?>

<b><p><a href="securedpage.php"><< Back</a></p> <br></b>
<p><a href="logout.php">Logout</a></p>

</body>

</html>

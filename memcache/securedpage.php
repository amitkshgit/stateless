<?php

include('config.inc');
include('memsess_withoutlock.php');
$a = session_id();
print "SessionId: $a<br>";
// Inialize session
session_start();
//$a = session_id();
//print "After Session Start Sessid: $a<br>";
$memcache = new Memcache;
$memcache->connect($memcachedhost, 11211) or die ("Could not connect"); //connect to memcached server
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

<script type="text/javascript">

function selectRegion(region)
  {
var regions = Array("ec2.us-east-1.amazonaws.com","ec2.us-west-1.amazonaws.com","ec2.us-west-2.amazonaws.com","ec2.eu-west-1.amazonaws.com","ec2.ap-southeast-1.amazonaws.com","ec2.ap-northeast-1.amazonaws.com","ec2.sa-east-1.amazonaws.com"); 
	var url = window.location.href;    
	if (url.indexOf('?region') > -1){
	newurl = url.substr(0,url.indexOf('?region'))
	url = newurl + '?region=' + regions[region]
	}else{
   	url = url + '?region=' + regions[region]
	}
window.location.href = url;
  }

</script>

Select Region: 
<select onchange="selectRegion(this.selectedIndex-1)">
<option>---</option>
<option>Virginia</option>
<option>California</option>
<option>Oregon</option>
<option>Ireland</option>
<option>Singapore</option>
<option>Tokyo</option>
<option>Brazil</option>
<option>Australia</option>
</select>
<br>

<?php
if(isset($_GET['region'])){
$region = $_GET['region'];

print "<br>Region $region<br>";
print "<table border=1>";
print "<tr>";
print "<td>Memcache</td><td> InstanceID </td><td>State</td><td>Type</td><td>Availability Zone </td><td>DNS Name</td><td>Public IP</td>";
print "</tr>";
$entry = 0;

if(($result = $memcache->get($region))){
$frommemc = 1;
foreach ($result as $line){
print "<tr><td>$frommemc</td> $line </tr>";
}
}else{
$frommemc = 0;
$query = "SELECT * from instances where region = '$region'";
$result = mysql_query($query);
//print "RES: $result";
while($row = mysql_fetch_array($result))
  {
$line = "<td> ".$row['instanceid']."</td><td>".$row['state']."</td><td>".$row['type']."</td><td>".$row['az']."</td><td>".$row['dnsname']."</td><td>".$row['publicip']."</td>";
print "<tr> <td>$frommemc</td>$line </tr>";
$cachedlines[$entry++] = $line;
  }
$memcache->set($region,$cachedlines, false, 100);
}
print "</table>";
mysql_close();
}else{
}

?>

<br> Write something to Session <?php echo $a; ?>: 
<form method="post" action="wrsession.php">
<input type=text value="" name=key> <input type=text value="" name=value>
<input type=submit value=Submit>
</form>

<p><a href="logout.php">Logout</a></p>

</body>

</html>

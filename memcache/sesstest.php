<?php

$a = session_id();
print "Before Session Start Sessid: $a\n";
// Inialize session
session_start();
$a = session_id();
print "After Session Start Sessid: $a\n";
$user = $_SESSION['username'];
print "User: $user\n";
exit;

?>

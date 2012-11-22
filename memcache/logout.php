<?php 

include('memsess_withoutlock.php');
// Inialize session
session_start();

// Delete certain session
error_log("Unsetting Session Username\n");
unset($_SESSION['username']);
// Delete all session variables
error_log("Deleting Session \n");
if(session_destroy()){
error_log("Deleted Session \n");
}else{
error_log("Deleted Session WAS NOT SUCCESFULL\n");
}

// Jump to login page
header('Location: index.php?reason=3');

?>

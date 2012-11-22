<?php

require_once 'AWSSDKforPHP/sdk.class.php';

// Instantiate the Amazon DynamoDB client.
// REMEMBER: You need to set 'default_cache_config' in your config.inc.php.
error_log("dynamodb - Starting Dynamodb instance");
$dynamodb = new AmazonDynamoDB();
error_log("dynamodb - Started Dynamodb instance");

// Register the DynamoDB Session Handler.
error_log("dynamodb - Defining handler");
$handler = $dynamodb->register_session_handler(array(
    'table_name' => 'sessions'
));
error_log("dynamodb - Handler obtained");

// Create a table for session storage with default settings.
//$handler->create_sessions_table();


?>

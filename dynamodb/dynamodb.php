<?php

require_once '/usr/share/aws/sdk-latest/sdk.class.php';

// Instantiate the Amazon DynamoDB client.
error_log("dynamodb - Starting Dynamodb instance");
$dynamodb = new AmazonDynamoDB();
$dynamodb->set_region('dynamodb.ap-southeast-1.amazonaws.com');
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

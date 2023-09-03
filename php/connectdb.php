<?php

// Connect to the database
$db = new mysqli('smcse-stuproj00.city.ac.uk', 'adbs924', '200017520', 'adbs924');

// Check if there is any error
if ($db -> connect_error) {

    // Output the error to the console
    printf("[ERROR] Connection failed: %s/n" . $db -> connect_error);

    // Exit the statement
    exit();
}

?>

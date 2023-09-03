<?php

    // Include connection settings
    require_once "connectdb.php";

    // Start the session
    session_start();

    // Create an error containg all the errors
    $bug_array = array();

    // Username input
    $username = mysqli_real_escape_String($db, $_POST['login-username']);

    // Password input
    $password = mysqli_real_escape_String($db, $_POST['login-password']);

    // Check if the username already exists
    $query = "SELECT username, password FROM accounts WHERE username = '$username'";

    // Get the results
    $result = mysqli_query($db, $query);

    // Get the number of rows containg the same username and password
    $fetch_row = mysqli_fetch_row($result);

    // Encrypt the password with the salt
    $hashedpassword = password_verify($password, $fetch_row[1]);

    // Check if there are any matches with the username and password
    if (isset($fetch_row[0]) && $hashedpassword) {

        // Go to the main page
        header("Location: ../index.html");
    }

    else {

        // Write what error would occur into the bug array
        array_push($bug_array, 'incorrect-login');

        // Seperate the array with commas
        $bug_array = implode(',', $bug_array);

        // Add the errors the url
        header("Location: ../login.html?bugs=$bug_array");

    }
?>

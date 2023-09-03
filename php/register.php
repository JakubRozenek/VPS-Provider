<?php

    // Include connection settings
    require_once "connectdb.php";

    // Include connection settings
    require_once "connectdb.php";

    // Start the session
    session_start();

    // Create an error containg all the errors
    $bug_array = array();

    // Username input
    $username = mysqli_real_escape_String($db, $_POST['username']);

    // Firstname input
    $firstname = mysqli_real_escape_String($db, $_POST['firstname']);

    // Lastname input
    $lastname = mysqli_real_escape_String($db, $_POST['lastname']);

    // Phone number input
    $phonenumber = mysqli_real_escape_String($db, $_POST['phonenumber']);

    // Email address input
    $email = mysqli_real_escape_String($db, $_POST['email']);

    // Password input
    $password = mysqli_real_escape_String($db, $_POST['password']);

    // Hashed password input
    $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Confirm password input
    $confirmpassword = mysqli_real_escape_String($db, $_POST['confirmpassword']);

    // Hashed confirm password input
    $hashedconfirmpassword = password_hash($_POST['confirmpassword'], PASSWORD_DEFAULT);

    // Check email query
    $query = "SELECT username FROM accounts WHERE email = '$email'";

    // Get the email result
    $result = mysqli_query($db, $query);

    // Check if there any rows with the same email
    $num_row = mysqli_num_rows($result);

    // Check if the row is 1 indicating us that the email is already taken
    if ($num_row != 0) {

        // Output that the email already exists
        array_push($bug_array, "taken-email");
    }

    // Check username query
    $query = "SELECT username FROM accounts WHERE username = '$username'";

    // Get the username result
    $result = mysqli_query($db, $query);

    // Check if there any rows with the same username
    $num_row = mysqli_num_rows($result);

    // Check if the row is 1 indicating us that the username is already taken
    if ($row != 0) {

        // Output that the username already exists
        array_push($bug_array, "taken-username");
    }

    // Check phone number query
    $query = "SELECT phonenumber FROM accounts WHERE phonenumber = '$phonenumber'";

    // Get the phone number result
    $result = mysqli_query($db, $query);

    // Check if there any rows with the same phone number
    $num_row = mysqli_num_rows($result);

    // Check if the row is 1 indicating us that the phone number is already taken
    if ($num_row != 0) {

        // Output that the phone number already exists
        array_push($bug_array, "taken-phonenumber");
    }

    // Check if passwords are the same
    if ($confirmpassword != $password) {

        // Output that the password are not the same
        array_push($bug_array, "different-passwords");
    }

    // Check if there are any errors in the array
    if (empty($errors)) {

        // Create a SQL query
        $query = "INSERT INTO accounts VALUES ('$username', '$firstname', '$lastname', '$phonenumber', '$email', '$hashedpassword')";

        // Execute the SQL query
        mysqli_query($db, $query);
    }

    else {

        // Seperate the bug array with commas
        $errors = implode(',', $bug_array);

        // Add errors to the url
        header("Location: ../register.html?bugs=$bug_array");
    }

    // Redirect to the login page
    header('Location: ../login.html');

?>


<?php

        // Check if the row is 1 indicating us that the username is already taken
        if ($row == 1) {

            // Output that the username already exists
            $errors[] = "username";
        }




        // Check if there are any errors in the array
        if (empty($errors)) {

            // Create a SQL query
            $query = "INSERT INTO accounts VALUES ('$username', '$firstname', '$lastname', '$phonenumber', '$email', '$hashedpassword')";

            // Execute the SQL query
            mysqli_query($db, $query) or die();
        }

        else {
            $errors = implode(",", $errors);
            header("Location: ../register.html?errors=$errors");
        }

        // Redirect to the login page
        header('Location: ../login.html');
?>

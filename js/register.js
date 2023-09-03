// Title: How to get URL parameter using jQuery or plain JavaScript?
// Author: stackoverflow.com
// Date: 2021
// Availability: https://stackoverflow.com/questions/19491336/how-to-get-url-parameter-using-jquery-or-plain-javascript

$.urlParam = function(input) {

    // Create a regex condition
    var results = new RegExp('[\?&]' + input + '=([^&#]*)');

    // Execute the results
    results.exec(window.location.href);

    // Return the results
    return results[1];
}

// Seperate bugs
var bug = $.urlParam('bugs');
var bug = bug.splits(",");

// Check if the username is taken
if (bug.includes('taken-username')) {

    // Output to the screen
    $('#username').after("<p class = 'bug' style = 'text-align: center;'> Username is already taken.<br>Please enter a different username</p>");
}

// Check if the email is taken
if (bug.includes('taken-email')) {

    // Output to the screen
    $('#username').after("<p class = 'bug' style = 'text-align: center;'> Email is already been used.<br>Please enter a different email address</p>");
}

// Check if the phone number is taken
if (bug.includes('taken-phonenumber')) {

    // Output to the screen
    $('#username').after("<p class = 'bug' style = 'text-align: center;'> Phone number is already been used.<br>Please enter a different phone number</p>");
}

// Check if the password and confirm password is the same
if (bug.includes('different-password')) {

    // Output to the screen
    $('#username').after("<p class = 'bug' style = 'text-align: center;'> Password and confirm password are different.<br>Please enter the same password</p>");
}

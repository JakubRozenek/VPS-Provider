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
var bug = bug.split(',');

// Check if the incorrect username or password
if (bug.includes('incorrect-login')) {

    // Output to the screen
    $('#login-password').after("<p class = 'bug' style = 'text-align: center;'> Username / Password is incorrect.<br>Please try again</p>");
}

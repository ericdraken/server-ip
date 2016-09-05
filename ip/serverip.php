<?php
/**
 * Eric Draken
 * Date: 2016-09-03
 * Time: 8:30 PM
 * Desc: Return the server IP of the machine this file is sitting on
 */

// PHP 5.3+
// REF: http://stackoverflow.com/a/19796250/1938889
$ip = gethostbyname(gethostname());

// Verify a valid IPv4 IP was returned, and not an error
if(filter_var($ip, FILTER_VALIDATE_IP) === false) {
    // Notify the above caused an error
    error_log('gethostbyname() resulted in ' . $ip);
    
    // Use the alternate method of curl'ing the server to retrieve the server IP
    passthru('curl -s http://'.$_SERVER['SERVER_NAME'].'/ip/ip.php');
} else {
    die($ip);
}

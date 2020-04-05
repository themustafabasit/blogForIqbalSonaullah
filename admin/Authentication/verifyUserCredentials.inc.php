<?php
function authenticationSessionVariables()
{
    // return to the login page if session is not set 
    //  *****    OR     *******
    //return to the login page as well, if the session is set , but value is not "true" in that 

    if ((!isset($_SESSION["secureUserIdSession"])) || (!isset($_SESSION["secureUserTypeSession"])) || (!isset($_SESSION["secureLoggedInSession"])) || ($_SESSION["secureLoggedInSession"] !== true) || (empty($_SESSION["secureUserIdSession"])) || (empty($_SESSION["secureUserTypeSession"])) || (empty($_SESSION["secureLoggedInSession"]))) {
        // if any of the session variable  is   " not set ",       or
        // if any of the session variable  is   " empty",          or
        //if the session['secureLoggedIn'] is   " not set to TRUE 
        //throw the user out  then,
        header("location: ../../user/Login/");
        exit;
    }
}
// build session time out , maintain last activity of  a user 
function authenticationSessionTimeout()
{
    // 30 min == 30*60 seconds
    // specify timeout in seconds; 
    $SessionTimeout = 100;
    if (isset($_SESSION['lastActivity']) && (time() > ($_SESSION['lastActivity'] + $SessionTimeout))) {
        // last request was before 30 minutes ago, unset variables,destroy session, n throw the user out 
        session_unset();     // unset $_SESSION variable  
        session_destroy();   // destroy session 
        // throw user out, session expires
        header("location: ../../user/Login/");
        // fallback
        exit;
    }
    // if control reaches here, that means , all session variables are 'set', 'not empty'. session time is valid as well;
    // give access to the user to this page, and just set "last activity"= current time  of the user  
    $_SESSION['lastActivity'] = time(); //  record every time in  "last activity"
}

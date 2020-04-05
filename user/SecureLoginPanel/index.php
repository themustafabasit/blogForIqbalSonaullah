<?php
session_start();
if ((isset($_SESSION["secureUserIdSession"])) && (isset($_SESSION["secureUserTypeSession"])) && (isset($_SESSION["secureLoggedInSession"])) && ($_SESSION["secureLoggedInSession"] === true)) {
    if ((!empty($_SESSION["secureUserIdSession"])) && (!empty($_SESSION["secureUserTypeSession"])) && (!empty($_SESSION["secureLoggedInSession"]))) {
        header("location: ../../admin/Index/");
        exit;
    }
}
?>

<?php
$loginErrorMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['loginSubmit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            //require connection class file first 
            //  require('../../global/connection.php');

            // require validation file
            require('../../admin/Validation/sanitizeUserInput.php');

            //require salt file
            $saltConfig = parse_ini_file('../../global/salt.ini');

            //require prepared statement file to verify login id & password
            require('../../global/PreparedStatements/dbprepared.php');

            // first thing first
            // sanitize user input, to prevent from various attacks like slq injection...
            $username = sanitizeInput($_POST['username']);
            $password = sanitizeInput($_POST['password']);

            //add salt to the user password
            $passwordWithSalt = $saltConfig['loginSalt'] . $password;

            // if everything goes right the below function will return an array else it will return false
            //this function dbPreparedStatementSelectLogin() is defined in connection class
            $data = dbPreparedStatementSelectLogin($username, $passwordWithSalt);

            if ($data === false) {
                $loginErrorMessage = 'invalid userID / password, logon denied ';
            } else {
                // first prevent session fixation by generating new session id every time when user logs in
                session_regenerate_id();
                $_SESSION['secureUserIdSession'] = $data['userid'];
                $_SESSION['secureUserTypeSession'] = $data['usertype'];
                $_SESSION['secureLoggedInSession'] = true;
                header("location: ../../admin/Index/");
            }
        } else {
            $loginErrorMessage = 'all fields are required';
        }
    } else {
        $loginErrorMessage = 'Attempt to login failed';
    }
}

?>

<?php
require('../MasterFiles/userMasterNav.inc.php');
?>

<section class="site_main ">
    <article class=article_container>
        <div class="article_inner_holder">
            <div class="article_middle_content">
                <div>

                </div>

                <form method="POST" action="<?php echo htmlspecialchars('../' . basename(dirname(__FILE__)) . '/'); ?>">
                    <div>
                        <span><?php echo ($loginErrorMessage) ?></span>
                    </div>
                    <input type="text" name="username" id="username">
                    <input type="password" name="password" id="pass">
                    <input type="submit" value="login" name="loginSubmit">
                </form>
            </div>
        </div>
    </article>
</section>
<?php
require('../MasterFiles/userMasterFooter.inc.php');
?>
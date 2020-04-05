<?php
session_start();
session_regenerate_id(true);

require('../Authentication/verifyUserCredentials.inc.php');
authenticationSessionVariables();
authenticationSessionTimeout();
echo (session_id());
?>

<?php
require('../MasterFiles/adminMasterNav.inc.php');
?>

<section class="site_main ">
    <article class=article_container>
        <div class="article_inner_holder">
            <div class="article_middle_content">
                <p>this is home page of the admin</p>
            </div>
        </div>
    </article>
</section>

<?php
require('../MasterFiles/adminMasterFooter.inc.php');
?>
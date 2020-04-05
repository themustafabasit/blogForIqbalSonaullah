<?php
require('../MasterFiles/userMasterNav.inc.php');
?>
<?php
$writerid = "";
$heading = "";
$subheading = "";
$by = "";
$date = "";
$content = "";
$imgname = "";
$mail = "";

$fb = "";
$twitter = "";
$insta = "";
$filename =  basename(dirname(__FILE__));

$sql = "select * from  id427109_blog.article where heading='" . $filename . "';";

$result = db_select($sql);

if ($result == false) {
    echo (db_error());
}

if ($result == true) {
    foreach ($result as $row) {
        $writerid = $row['writer_id'];
        $heading = $row['heading'];
        $subheading = $row['subheading'];
        $date = $row['date'];
        $content = $row['content'];
        $imgname = $row['img'];
    }
}

$imgname = "../images/" . $imgname;


$sql = "select * from  id427109_blog.writer where id=" . $writerid . ";";

$result = db_select($sql);

if ($result == false) {
    echo (db_error());
}

if ($result == true) {
    foreach ($result as $row) {
        $by = $row['name'];
        $mail = $row['mail'];
        $fb = $row['fb'];
        $twitter = $row['twitter'];
        $insta = $row['insta'];
        $intro = $row['intro'];
        $description = $row['description'];
        $dp = $row['dp'];
    }
}

?>

<section class="site_main ">
    <article class=article_container>
        <div class="article_inner_holder">



            <div class="article_middle_content">
                
            <div class="article_heading_container">
                <h1 class="article_heading">    <?php echo $heading ?>      </h1>
            </div>


                <div class="publish">

                    <div class="publish_img_and_subheading">
                    
                    <div class="publish_img" > 
                              <img src="../../global/images/writers/<?php echo $dp ?>" alt="">  
                    </div>
                        <div class="publish_subheading">    <?php echo $subheading ?>       </div>
                    </div>
                
                    <div class="publish_by_and_date">
                        <span class="publish_by">
                            <?php echo $by ?>
                        </span>
                        <span class="publish_date">
                            <?php echo $date ?>
                        </span>
                    </div>

                </div>


                <div class="article_image">
                 <img src="<?php echo $imgname ?>" alt="">
                </div>

                <?php echo $content ?>

                <div class="about_writer_desc">
                    <div class="inner_name_n_at">
                        <p class="writer_name">About - <?php echo $by ?></p>
                        <p class="at"><?php echo $intro ?></p>
                    </div>
                    <div class="writer_img_n_bio">
                        <img src="../../global/images/writers/<?php echo $dp ?>" alt="">
                        <p><?php echo $description ?> </p>
                        <p class="writer_can_be_reached_at"><b><?php echo $by ?></b> can be reached at: </span>
                            <div class="writer_links">
                                <a target="_blank" href="mailto:<?php echo $mail ?>"><img src="../../global/images/email_square.png" alt=""></a>
                                <a target="_blank" href="<?php echo $fb ?>" ><img src="../../global/images/fb_square.png" alt=""></a>
                                <a target="_blank" href="<?php echo $twitter ?>"><img src="../../global/images/twitter_square.png" alt=""></a>
                                <a target="_blank" href="<?php echo $insta ?>"><img src="../../global/images/insta_square.png" alt=""></a>
                            </div>
                        </p>
                    </div>
                </div>


                <div class=form_div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" autocomplete>
                        <div class=row>
                            <p class="leave_a_comment">leave a comment</p>
                        </div>
                        <div class="row">
                            <input id="name" name="name" type="text" class="form_type_text" placeholder="Your Name (required)" value="" required />
                            <span class="error_message">*<p></p></span>
                        </div>

                        <div class="row">
                            <input id="email" name="email" type="email" class="form_type_email" placeholder="Your E-mail (required)" value="" required autocomplete />
                            <span class="error_message">*<p></p></span>
                        </div>
                        <div class="row">
                             <textarea class="form_type_textarea" id="article" name="message" autocomplete maxlength=500 minlength=20 required placeholder="Enter Your Comment Here........ (required) "></textarea>
                            <span id="message_validation" class="error_message">*<p></p></span>
                        </div>
                        <div class="row">
                            <input type="submit" class="form_type_submit" name="uploadBtn" value="Submit" />
                        </div>
                    </form>
                </div>

            </div>
            <?php
            require('../MasterFiles/userMasterAside.inc.php');
            ?>
        </div>
    </article>
</section>

<?php
require('../MasterFiles/userMasterFooter.inc.php');
?>
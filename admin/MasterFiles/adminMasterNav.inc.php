<html>

<head>
    <link rel="stylesheet" type="text/css" media="screen" href="../../global/MasterCSS/masterStructure.css">
    <div id="preloader_screen"><img src="../../global/images/preloader_by_dmytro drapey.gif" id="preloader_giff" /> </div>
    <script>
        document.getElementById("preloader_screen").style.width = window.innerWidth;
    </script>
    <title>Iqbal Sonaullah</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../global/MasterCSS/masterRibbon.css">
    <link href="https://fonts.googleapis.com/css?family=IM+Fell+Double+Pica|Timmana+ZCOOL+KuaiLe" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="../../global/MasterCSS/masterNav.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../../global/MasterCSS/masterAside.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../../global/MasterCSS/masterFooter.css">

    <link rel="stylesheet" type="text/css" media="screen" href="../css/localAdminForm.css">


    <script type="text/javascript" src="../../global/MasterJS/preloader.js"></script>

    <?php
    require '../../global/connection.php';
    $sql = "select * from  id427109_blog.ribbon;";
    $result = db_select($sql);

    if ($result == false) {
        echo (db_error());
    }

    if ($result == true) {
        $i = 0;
        $captions = [];
        $links = [];
        foreach ($result as $row) {
            $captions[$i] = $row['heading'] . "<sub>read more</sub>";
            $links[$i] = $row['link'];
            $i++;
        }
    }
    $low = 1;
    $high = 11;
    $num = mt_rand($low, $high);
    $sql = "select quote from  id427109_blog.quotes where quote_id=" . $num . ";";
    $quote = "";
    $result = db_select($sql);

    if ($result == false) {
        echo (db_error());
    }

    if ($result == true) {
        foreach ($result as $row) {
            $quote = $row['quote'];
        }
    }

    ?>
    <script type="text/javascript">
        counter = 2;

        function init() {
            setTimeout(move, 400);
        }

        function move() {
            var a = document.getElementById("a1");
            a.style.marginLeft = "0px";

            if (a.style.marginLeft = "0px") {
                setTimeout(goback, 3000)
            }
        }

        function goback() {
            var b = document.getElementById("a1");
            b.style.marginLeft = "1000px";
            setTimeout(comeout, 500);
        }

        function comeout() {
            var c = document.getElementById("a1");
            var n1, n2, n3, n4, n5, n6;
            var c1, c2, c3, c4, c5, c6;
            var l1, l2, l3, l4, l5, l6;
            var limit = 6;
            <?php
            echo ("c1='" . $captions[0] . "'; " . "l1='" . $links[0] . "';\n");
            echo ("\t\t\tc2='" . $captions[1] . "'; " . "l2='" . $links[1] . "';\n");
            echo ("\t\t\tc3='" . $captions[2] . "'; " . "l3='" . $links[2] . "';\n");
            echo ("\t\t\tc4='" . $captions[3] . "'; " . "l4='" . $links[3] . "';\n");
            echo ("\t\t\tc5='" . $captions[4] . "'; " . "l5='" . $links[4] . "';\n");
            echo ("\t\t\tc6='" . $captions[5] . "'; " . "l6='" . $links[5] . "';\n");

            ?>

            switch (counter) {
                case 1:
                    n1 = c1;
                    c.innerHTML = n1;
                    c.setAttribute("href", l1);

                    setTimeout(goback, 3000);
                    break;

                case 2:
                    n2 = c2
                    c.innerHTML = n2;
                    c.setAttribute("href", l2);

                    setTimeout(goback, 2500);
                    break;

                case 3:
                    n3 = c3
                    c.innerHTML = n3;
                    c.setAttribute("href", l3);

                    setTimeout(goback, 5000);
                    break;
                case 4:
                    n4 = c4
                    c.innerHTML = n4;
                    c.setAttribute("href", l4);

                    setTimeout(goback, 6000);
                    break;
                case 5:
                    n5 = c5
                    c.innerHTML = n5;
                    c.setAttribute("href", l5);

                    setTimeout(goback, 4000);
                    break;
                case 6:
                    n6 = c6
                    c.innerHTML = n6;
                    c.setAttribute("href", l6);

                    setTimeout(goback, 4000);
                    break;
            }

            if (counter == limit) {
                counter = 0;
            }

            counter = counter + 1;
            c.style.marginLeft = "0px";
        }
    </script>

</head>

<body onload="init();">
    <div class="big_wrapper">
        <header>
            <div class="header_row_1">
                <div class="row_1_left_side">
                    <p class="quote">
                        <?php echo ($quote) ?>
                    </p>
                </div>

                <div class="row_1_right_side">
                    <li class="top_right_links_container">
                        <div class="skew1"><a href="../../user/SecureLogoutPanel/">logout</a></div>
                    </li>
                    <li class="top_right_links_container">
                        <div class="skew1"><a href="#">link 1</a></div>
                    </li>
                    <li class="top_right_links_container">
                        <div class="skew1"><a href="#">link 2</a></div>
                    </li>
                    <li class="top_right_links_container">
                        <div class="skew1"><a href="#">Gallery</a></div>
                    </li>
                    <li class="top_right_links_container">
                        <div class="skew1"><a href="#">About us</a></div>
                    </li>
                    <div class="top_right_links_container">
                        <div class="skew1 special_about_skew">
                            <a href="#" class="special_about_a">Contact us</a>
                        </div>
                        <div class="top_about_dropdown">
                            <div class="inner_about_container">
                                <div class="mb">
                                    <div class="tittle_image">
                                        <div class="tittle_image_container">
                                            <a href="https://www.facebook.com/profile72">
                                                <img src="../../global/images/basit_dp.jpg" title="mustafa basit" /> </a>
                                        </div>
                                    </div>
                                    <li class="tag_name">
                                        <div class="tag_name_inner"> Mustafa Basit </div>
                                    </li>
                                    <p class="tag_msg">Mustafa Basit is PG student
                                        at islamic university, he loves to spend his time in learning web tecnologies,
                                        like node.js, MEAN Stack. From the beginning he was intrested in web,
                                        development, both front-end as well as back-end, and want to be a full stack
                                        developer.
                                    </p>
                                    <p class="catch_him">
                                        <b>catch him on - </b>
                                        <a href="https://www.facebook.com/profile72"><img title="Facebook" src="../../global/images/fb_square.png" alt=""></a>
                                        <a href="https://www.instagram.com/mustafa._.basit/"><img title="Instagram" src="../../global/images/insta_square.png" alt=""></a>
                                        <a href="https://twitter.com/Mustafa_Basit74?lang=en"><img title="Twitter" src="../../global/images/twitter_square.png" alt=""></a>
                                        <a href="mailto:mailtobasit74@gmail.com"><img title="Email" src="../../global/images/email_square.png" alt=""></a>
                                    </p>
                                </div>
                                <div class="jh">
                                  
                                    <div class="tittle_image">
                                        <div class="tittle_image_container">
                                            <a href=" https://www.facebook.com/wasitshafiwani">
                                                <img src="../../global/images/wasit_dp.jpg" title="wasit shafi" /> </a>
                                        </div>
                                    </div>
                                    <li class="tag_name">
                                        <div class="tag_name_inner"> Wasit Shafi </div>
                                    </li>
                                    <p class="tag_msg">Wasit Shafi is PG student
                                        at Jamia Millia Islamia, he loves to spend his time in learning web
                                        tecnologies,
                                        like node.js, MEAN Stack. From the beginning he was intrested in web,
                                        development, both front-end as well as back-end, and want to be a full stack
                                        developer.
                                    </p>
                                    <p class="catch_him">
                                        <b>catch him on - </b>
                                        <a href="https://www.facebook.com/wasitshafiwani"><img title="Facebook" src="../../global/images/fb_square.png" alt=""></a>
                                        <a href="https://www.instagram.com/wasitshafi/"><img  title="Instagram" src="../../global/images/insta_square.png" alt=""></a>
                                        <a href="https://twitter.com/Wasitshafi?lang=en"><img  title="Twitter" src="../../global/images/twitter_square.png" alt=""></a>
                                        <a href="mailto:wasitshafi700@gmail.com"><img title="Email"  src="../../global/images/email_square.png" alt=""></a>
                                    </p>
                                </div>
                                <div class="iq">
                                   
                                    <div class="tittle_image">
                                        <div class="tittle_image_container">
                                            <a href="https://www.facebook.com/profile.php?id=100008071606891">
                                                <img src="../../global/images/admin.png" title="admin" /> </a>
                                        </div>
                                    </div>
                                    <li class="tag_name">
                                        <div class="tag_name_inner"> iqbal sonaullah </div>
                                    </li>
                                    <p class="tag_msg">Iqbal Sonaullah is research
                                        student at Jamia Millia Islamia, he loves to spend his time in learning web
                                        tecnologies,
                                        like node.js, MEAN Stack. From the beginning he was intrested in web,
                                        development, both front-end as well as back-end, and want to be a full stack
                                        developer.
                                    </p>
                                    <p class="catch_him">
                                        <b>catch him on - </b>
                                        <a href="https://www.facebook.com/profile.php?id=100008071606891"><img title="Facebook" src="../../global/images/fb_square.png" alt=""></a>
                                        <a href="https://www.instagram.com/Iqbal/"><img  title="Instagram" src="../../global/images/insta_square.png" alt=""></a>
                                        <a href="https://twitter.com/IqbalSonaullah?lang=en"><img  title="Twitter" src="../../global/images/twitter_square.png" alt=""></a>
                                        <a href="mailto:iqbalsonaullah@gmail.com"><img  title="Email" src="../../global/images/email_square.png" alt=""></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="header_row_2">
                <div class="ribbon_wrapper">
                    <ul>
                        <li class="ribbon_li1">
                            <span class="ribbon_ques1">IN FOCUS </span>
                        </li>
                        <li class="ribbon_li2">
                            <a id="a1" href="<?php echo ($links[0]) ?>" class="ribbon_ans1">
                                <?php echo ($captions[0]) ?> </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="header_row_3">
                <div class="inner_header_row_3">
                    <a href="#" class="row_3_name">IQBAL SONAULLAH</a>
                    <p class="row_3_quote"><span>I Mean You No Offense</span></p>
                </div>
            </div>
            <div class="header_row_4">
                <div class="in_fourth_line_li_holder">
                    <li class="in_fourth_line_li"><a href="../AddWriter/" class="in_fourth_line_anchor">Add Writer</a></li>
                    <li class="in_fourth_line_li"><a href="../AddArticle/" class="in_fourth_line_anchor">Add Article</a></li>
                    <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor active">Society</a></li>
                    <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">feedback</a></li>
                    <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">literature</a></li>
                    <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">sports</a></li>
                    <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">Education</a></li>
                    <li class="in_fourth_line_li drop_li">
                        <a href="#" class="in_fourth_line_anchor">more</a>
                        <div class="dropdown">
                            <span class="arrow"></span>
                            <span class="arrow_border"></span>
                            <div class="dropdown_content_holder">
                                <a href="#" class="dropdown_anchor" title="Get Popular News and Updates">Iqbal
                                    Sonaullah</a>
                                <a href="#" class="dropdown_anchor" title="view site map">Umaira Gul</a>
                                <a href="#" class="dropdown_anchor" title="All stuff for Developers">zubair Ahmad</a>
                                <a href="#" class="dropdown_anchor" title="User log in ">mushtaq ahamd malla</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">waseem ahmad</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">mudasir amin</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">adil shafi</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">abid bhat</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">mujeeb hussain</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">muneeb hussain</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">basharat ali</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">yasir bashir</a>
                                <a href="#" class="dropdown_anchor" title="Tag your friends">mirza gowhar yassin shah</a>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </header>
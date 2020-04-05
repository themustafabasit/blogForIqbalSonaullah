        <!-- *********************copy next part of code from user master nav*************************************************************   -->
        <html>

        <head>
            <link rel="stylesheet" type="text/css" media="screen" href="./global/MasterCSS/masterStructure.css">
            <div id="preloader_screen"><img src="./global/images/preloader_by_dmytro drapey.gif" id="preloader_giff" /> </div>
            <script>
                document.getElementById("preloader_screen").style.width = window.innerWidth;
            </script>
            <title>Iqbal Sonaullah</title>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes" />
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
            <link rel="stylesheet" type="text/css" media="screen" href="./global/MasterCSS/masterRibbon.css">
            <link href="https://fonts.googleapis.com/css?family=IM+Fell+Double+Pica|Timmana+ZCOOL+KuaiLe" rel="stylesheet">
            <link rel="stylesheet" type="text/css" media="screen" href="./global/MasterCSS/masterNav.css">
            <link rel="stylesheet" type="text/css" media="screen" href="./global/MasterCSS/masterFooter.css">

            <link rel="stylesheet" type="text/css" media="screen" href="./global/css/homePage.css">

            <script type="text/javascript" src="./global/MasterJS/preloader.js"></script>
            <?php
            require './global/connection.php';
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
                                <div class="skew1"><a href="./user/Login/">login</a></div>
                            </li>
                            <li class="top_right_links_container">
                                <div class="skew1"><a href="#">download</a></div>
                            </li>
                            <li class="top_right_links_container">
                                <div class="skew1"><a href="#">link 2</a></div>
                            </li>
                            <li class="top_right_links_container">
                                <div class="skew1"><a href="#">Gallery</a></div>
                            </li>
                            <li class="top_right_links_container">
                                <div class="skew1"><a href="./AboutUs/">About us</a></div>
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
                                                        <img src="./global/images/basit_dp.jpg" title="Mustafa Basit" /> </a>
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
                                                <a href="https://www.facebook.com/profile72"><img title="Facebook" src="./global/images/fb_square.png" alt=""></a>
                                                <a href="https://www.instagram.com/mustafa._.basit/"><img title="Instagram" src="./global/images/insta_square.png" alt=""></a>
                                                <a href="https://twitter.com/Mustafa_Basit74?lang=en"><img title="Twitter" src="./global/images/twitter_square.png" alt=""></a>
                                                <a href="mailto:mailtobasit74@gmail.com"><img title="Email" src="./global/images/email_square.png" alt=""></a>
                                            </p>
                                        </div>
                                        <div class="jh">
                                        
                                            <div class="tittle_image">
                                                <div class="tittle_image_container">
                                                    <a href=" https://www.facebook.com/wasitshafiwani">
                                                        <img src="./global/images/wasit_dp.jpg" title="Wasit Shafi" /> </a>
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
                                                <a href="https://www.facebook.com/wasitshafiwani"><img title="Facebook" src="./global/images/fb_square.png" alt=""></a>
                                                <a href="https://www.instagram.com/wasitshafi/"><img  title="Instagram" src="./global/images/insta_square.png" alt=""></a>
                                                <a href="https://twitter.com/Wasitshafi?lang=en"><img  title="Twitter" src="./global/images/twitter_square.png" alt=""></a>
                                                <a href="mailto:wasitshafi700@gmail.com"><img title="Email"  src="./global/images/email_square.png" alt=""></a>
                                            </p>
                                        </div>
                                        <div class="iq">
                                        
                                            <div class="tittle_image">
                                                <div class="tittle_image_container">
                                                    <a href="https://www.facebook.com/profile.php?id=100008071606891">
                                                        <img src="./global/images/admin.png" title="Iqbal Sonaullah" /> </a>
                                                </div>
                                            </div>
                                            <li class="tag_name">
                                                <div class="tag_name_inner">iqbal sonaullah </div>
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
                                                <a href="https://www.facebook.com/profile.php?id=100008071606891"><img title="Facebook" src="./global/images/fb_square.png" alt=""></a>
                                                <a href="https://www.instagram.com/Iqbal/"><img  title="Instagram" src="./global/images/insta_square.png" alt=""></a>
                                                <a href="https://twitter.com/IqbalSonaullah?lang=en"><img  title="Twitter" src="./global/images/twitter_square.png" alt=""></a>
                                                <a href="mailto:iqbalsonaullah@gmail.com"><img  title="Email" src="./global/images/email_square.png" alt=""></a>
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
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">Questions</a></li>
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">Politics</a></li>
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor active">Society</a></li>
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">literature</a></li>
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">sports</a></li>
                            <li class="in_fourth_line_li"><a href="#" class="in_fourth_line_anchor">Education</a></li>
                            <li class="in_fourth_line_li"><a  href="./user/login/" class="in_fourth_line_anchor">login</a></li>
                            <li class="in_fourth_line_li drop_li">
                                <a href="#" class="in_fourth_line_anchor">members</a>
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







                <script type="text/javascript">
                    setTimeout(change_first, 6000);

                    function change_first() {
                        var a, b;
                        a = document.getElementById('div1');
                        b = document.getElementById('div2');
                        a.style.left = '-100%';
                        b.style.left = '0%';
                        setTimeout(change2, 4000);
                    }

                    function change2() {
                        var a, b;
                        a = document.getElementById('div2');
                        b = document.getElementById('div3');
                        a.style.top = '100%';
                        b.style.top = '0%';
                        setTimeout(change3, 4000);
                    }

                    function change3() {
                        var a, b;
                        a = document.getElementById('div3');
                        b = document.getElementById('div4');
                        a.style.left = '100%';
                        b.style.left = '0%';
                        setTimeout(set_all_others_position, 2000);
                        setTimeout(remove_last_image, 4000);

                    }


                    function set_all_others_position() {
                        var a, b, c;
                        a = document.getElementById('div1');
                        b = document.getElementById('div2');
                        c = document.getElementById('div3');
                        a.style.left = '100%';
                        b.style.left = '100%';
                        b.style.top = '0';
                        c.style.left = '0';
                        c.style.top = '-100%';
                    }

                    function remove_last_image() {
                        var a, b;
                        a = document.getElementById('div4');
                        b = document.getElementById('div1');
                        a.style.left = '-100%';
                        b.style.left = '0%';
                        setTimeout(change_first, 4000);

                    }
                </script>


                <!-- **********************************************************************************   -->

                <section class="site_main ">
                    <article class=article_container>



                        <div class="slider_wrapper">
                            <div>
                                <div class="slider_image_container">
                                    <div id="slider_special_div" class="slider_image_holder">

                                        <div id="div1">
                                            <img id="img1" class="img1" src="./user/images/homepageslider.jpg" alt="">

                                            <div class="slider_span_block">
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_by" title="Article By">IQBAL SONAULLAH</span>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <a href="#" class="slider_block_caption">Kashmir University: Campus of the dead</a>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_heading">Does She Mean It</span>
                                                    <span class="slider_block_date">August 13 , 2018</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="div2">
                                            <img id="img1" class="img1" src="./user/images/library 2.jpg" alt="">

                                            <div class="slider_span_block">
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_by" title="Article By">IQBAL SONAULLAH</span>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <a href="#" class="slider_block_caption">DEATH IS OUR ONLY AAZADI: THE STORY OF A KASHMIRI</a>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_heading">Does She Mean It</span>
                                                    <span class="slider_block_date">August 13 , 2018</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="div3">
                                            <img id="img1" class="img1" src="./user/images/egypt.jpg" alt="">

                                            <div class="slider_span_block">
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_by" title="Article By">IQBAL SONAULLAH</span>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <a href="#" class="slider_block_caption">How the Egypt’s Judiciary is Aiding the Sisi Regime to Maintain its Oppression</a>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_heading">Does She Mean It</span>
                                                    <span class="slider_block_date">August 13 , 2018</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="div4">
                                            <img id="img1" class="img1" src="./user/images/morning.jpg" alt="">

                                            <div class="slider_span_block">
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_by" title="Article By">IQBAL SONAULLAH</span>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <a href="#" class="slider_block_caption">An Unusual Morning</a>
                                                </div>
                                                <div class="slider_block_fix">
                                                    <span class="slider_block_heading">Does She Mean It</span>
                                                    <span class="slider_block_date">August 13 , 2018</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>
















                        <div class="global_block_title "><span>Editor's Choice</span></div>
                        <div class="global_block editors_choice">
                            <div class="flex_block flex_A">
                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/conflict.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Modern conflicts: A case against forgiveness </span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>


                            <div class="flex_block flex_b">


                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/egypt.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Palestine’s best hope lies in Turkey</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/politics.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Thy Chicken, Thy Tomatoes</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>




                        <!--  copy of above global block, and invert of flex_a , flex_b  -->






                        <div class="global_block_title"><span>Most Liked</span></div>
                        <div class="global_block most_liked">



                            <div class="flex_block flex_b">


                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/psl.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">This PSL, Lest Change Our Approach</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/rose.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Kashmir Resistance At Crossroads</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>




                            </div>
                            <div class="flex_block flex_A">
                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/palestine-turkey.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Palestine’s best hope lies in Turkey</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!--  copy of above global block, upto yet************  -->

                        <div class="global_block_title"><span>All Time Best</span></div>
                        <div class="global_block all_time_best">
                            <div class="flex_block flex_b">
                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/j1.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">DEATH IS OUR ONLY AAZADI: THE STORY OF A KASHMIRI</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/politics.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Modern conflicts: A case against forgiveness</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex_block flex_b">
                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/uok.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">DEATH IS OUR ONLY AAZADI: THE STORY OF A KASHMIRI</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/egypt.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Kashmir’s old story of death and denial</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex_block flex_b">
                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/education.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Kashmir Resistance At Crossroads</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <div class="block">
                                    <a href="#">
                                        <img src="./user/images/conflict.jpg" alt="">
                                        <div class="span_block">
                                            <div class="block_fix">
                                                <span class="block_by" title="Article By">IQBAL SONAULLAH</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_caption">Kashmir’s old story of death and denial</span>
                                            </div>
                                            <div class="block_fix">
                                                <span class="block_heading">Does She Mean It</span>
                                                <span class="block_date">August 13 , 2018</span>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>








                    </article>
                </section>








                <!-- *********************copy next part of code from user master footer*************************************************************   -->








                <div class="main_footer">
                    <div class="all_level_holder">

                        <div class="level_1_footer">
                            <div class="inside_level_1">
                                <div class="footer_container">
                                    <div class="footer_container_heading">blog</div>
                                    <div class="footer_links">
                                        <a href="#">questions</a>
                                        <a href="#">sports</a>
                                        <a href="#">feedback</a>
                                        <a href="#">society</a>
                                        <a href="#">literature</a>
                                        <a href="#">about us</a>
                                        <a href="#">blog</a>
                                    </div>
                                </div>

                                <div class="footer_container">
                                    <div class="footer_container_heading">Resources</div>
                                    <div class="footer_links">
                                        <a href="#">internatioal</a>
                                        <a href="#">rising kashmir</a>
                                        <a href="#">greater kashmir</a>
                                        <a href="#">ndtv</a>
                                        <a href="#">bbc india</a>
                                    </div>
                                </div>

                                <div class="footer_container footer_container_right">
                                    <div class="footer_container_heading">Connect With us</div>
                                    <div class="footer_container_sub_heading">Sign up to our monthly newsletter and keep up-to-date
                                        with what's new, and much more !</div>
                                    <div>
                                        <form action="#" method="post">
                                            <div class="footer_input_holder">
                                                <input class="footer_email" type="email" autocomplete required name="" id="" placeholder="Email Address" />
                                                <input class="footer_submit" type="submit" value="subscribe me" />
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="level_2_footer">
                            <div class="inside_level_2">
                                <div class=social>
                                    <div class="connect_with">
                                        <li>Connect with IQBAL SONAULLAH</li>
                                    </div>
                                    <div class="footer_fB_tw_insta">
                                        <a href="https://www.facebook.com/profile.php?id=100008071606891" target="_blank"><img src="./global/images/facebook_round.png"></a>
                                        <a href="https://twitter.com/iqbalsonaullah?lang=en" target="_blank"><img src="./global/images/twitter_round.png"></a>
                                        <a href="https://www.instagram.com/iqbal/" target="_blank"><img src="./global/images/insta_round.png"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="level_3_footer">
                            <div class="inside_level_3">
                                <div class="meet_dev_heading"><li>MEET DEV ENGINES BEHIND</li></div>
                                <div class=meet_dev>
                                    <a class="wasit" href="https://www.facebook.com/wasitshafiwani"> <img src="./global/images/wasit_dp.jpg" alt="">wasit</a>
                                    <a class="basit" href="https://www.facebook.com/profile72"><img src="./global/images/basit_dp.jpg" alt="">basit</a>
                                    <li class="meet">website designed, developed &amp; maintained by - </li>
                                </div>
                            </div>
                        </div>

                        <div class="level_4_footer">
                            <div class="inside_level_4">
                                <div class=copy_right>
                                    <li>&copy; Copyright 2020 - IQBAL SONAULLAH. All rights reserved. For website information :
                                        <a href="mailto:mailtobasit74@gmail.com">mailtobasit74@gmail.com</a>
                                        <a href="mailto:wasitshafi700@gmail.com">wasitshafi700@gmail.com</a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </body>

        </html>
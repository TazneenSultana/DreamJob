<?php
   session_start();
   session_regenerate_id();
 ?>
<!doctype html>
<html>
    <head>
        <title>Home</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:130px;
                width:1500px;
            }
            #nav1{
               background:lightgray;
               height:39px;
               width:1500px;
               border:4px solid blue;
           }
           #nav2{
               background:linear-gradient(to right,black,grey,lightgrey,white,lightgrey,black);
               width:200px;
               height:1000px;
               border:3px double blue;
               float:left;
               margin-top:30px;
           }
            li.horizontal{
               margin-left:180px;
               display:inline;
               font-size:20px;
               font-style:bold;
               text-align:center;
            }
            li.vertical{
               display:block;
               margin-top:10px;
               font-size:20px;
           }
            li a:hover{
                background:white;
            }

            aside.homead1{
               margin-top:30px;
               float:right;
           }
           aside.homead2{
              margin-top:5px;
              float:right;
           }
           aside.homead3{
              margin-top:5px;
              float:right;
           }
           iframe{
               float:left;
               margin-top:30px;
               border:2px solid black;
               margin-left:60px;
               padding-left:15px;
           }

        </style>
    </head>
    <body>
        <header></header>
        <nav id="nav1">
            <ul>
                <li class="horizontal"><a href="home.php" target="_self">HOME</a></li>
                <li class="horizontal"><a href="about.php" target="_self">ABOUT</a></li>
                <li class="horizontal"><a href="signin.php" target="_self"><?php if(isset($_SESSION['signin'])&&($_SESSION['signin'])) echo $_SESSION['username'];
                                                                                 else echo "SIGN IN";?></a></li>
                <li class="horizontal"><a href="contactus.php" target="_self">CONTACT US</a></li>
                <?php
                 if(isset($_SESSION['signin'])&&($_SESSION['signin']))
                 {
                     $username=$_SESSION['username'];
                    $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                    $query41="select notificationno from logininfo where username='$username'";
                    $result41=mysqli_query($db_handle,$query41) or die("Could not execute");
                    $row41=mysqli_fetch_array($result41);
                    $notificationno=$row41['notificationno'];?>
                         <li class="horizontal"><a href="notification.php" target="_self">NOTIFICATION<span style="color:red;"><?php if($notificationno>0) echo "  $notificationno" ?></span></a></li><?php
                 }
                ?>
            </ul>
        </nav>
        <nav id="nav2">
            <ul>
                <li style="font-size:25px;font-style:bold">DIVISIONAL JOBS</li>
                <li class="vertical"><a href="dhaka.php" target="iframe1">Dhaka</a></li>
                <li class="vertical"><a href="chittagong.php" target="iframe1">Chittagong</a></li>
                <li class="vertical"><a href="rajshahi.php" target="iframe1">Rajshahi</a></li>
                <li class="vertical"><a href="khulna.php" target="iframe1">Khulna</a></li>
                <li class="vertical"><a href="sylhet.php" target="iframe1">Sylhet</a></li>
                <li class="vertical"><a href="barisal.php" target="iframe1">Barisal</a></li>
                <li class="vertical"><a href="rongpur.php" target="iframe1">Rongpur</a></li>
                <li class="vertical"><a href="mymensingh.php" target="iframe1">Mymensingh</a></li>
                <br></br>
                <li style="font-size:25px;font-style:bold">SELECT CATEGORY</li>
                <li class="vertical"><a href="education.php" target="iframe1">Education</a></li>
                <li class="vertical"><a href="medical.php" target="iframe1">Medical</a></li>
                <li class="vertical"><a href="accountingfinance.php" target="iframe1">Accounting/Fin.</a></li>
                <li class="vertical"><a href="bank.php" target="iframe1">Bank/Non-bank Fin. Inst.</a></li>
                <li class="vertical"><a href="engineerarchitect.php" target="iframe1">Engineer/Archi.</a></li>
                <li class="vertical"><a href="traveltourism.php" target="iframe1">Travel/Tourism</a></li>
                <li class="vertical"><a href="garments.php" target="iframe1">Garments/Textile</a></li>
                <li class="vertical"><a href="agro.php" target="iframe1">Agro(Plant/Anim)</a></li>
                <li class="vertical"><a href="media.php" target="iframe1">Media/Ad./Event mg.</a></li>
                <li class="vertical"><a href="marketingsales.php" target="iframe1">Marketing/Sales</a></li>
            </ul>
        </nav>
        <aside class="homead1">
            <img src="robiaddred.png" height="300px" width="250px" border="2px solid black"></img>
        </aside>
        <aside class="homead1">
            <img src="samsungad.jpg" height="300px" width="250px" border="2px solid black"></img>
        </aside>


        <iframe  name="iframe1" src="defaultjobs.php" height="1000px" width="930px"></iframe>


        <aside class="homead2">
            <img src="cokead.jpg" alt="not found" height="300px" width="250px" border="2px solid black"></img>
        </aside>
        <aside class="homead2">
            <img src="bkashadd.jpg" alt="not found" height="300px" width="250px" border="2px solid black"></img>
        </aside>


        <aside class="homead3">
            <img src="frootoadd.jpg" alt="not found" height="300px" width="250px" border="2px solid black"></img>
        </aside>
        <aside class="homead3">
            <img src="merilad.jpg" alt="not found" height="300px" width="250px" border="2px solid black"></img>
        </aside>


        <script>
            var adslideindex1 = adslideindex2=adslideindex3=0;
            showadslides1();
            showadslides2();
            showadslides3();

            function showadslides1() {
                var i;
                var slides1 = document.getElementsByClassName("homead1");

                for (i = 0; i < slides1.length; i++) {
                   slides1[i].style.display = "none";
                }

                adslideindex1++;

                if (adslideindex1> slides1.length) {adslideindex1 = 1}
                slides1[adslideindex1-1].style.display = "block";
                setTimeout(showadslides1, 4000);

            }

            function showadslides2() {
                var i;
                var slides2 = document.getElementsByClassName("homead2");

                for (i = 0; i < slides2.length; i++) {
                   slides2[i].style.display = "none";
                }

                adslideindex2++;

                if (adslideindex2> slides2.length) {adslideindex2 = 1}
                slides2[adslideindex2-1].style.display = "block";
                setTimeout(showadslides2, 5000);

            }

            function showadslides3() {
                var i;
                var slides3 = document.getElementsByClassName("homead3");

                for (i = 0; i < slides3.length; i++) {
                   slides3[i].style.display = "none";
                }

                adslideindex3++;

                if (adslideindex3> slides3.length) {adslideindex3 = 1}
                slides3[adslideindex3-1].style.display = "block";
                setTimeout(showadslides3, 4000);

            }
        </script>

    </body>

</html>

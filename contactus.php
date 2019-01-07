<?php
   session_start();
   session_regenerate_id();
 ?>
<!doctype html>
<html>
    <head>
        <title>Sign In</title>
       <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            #nav1{
               background:lightgray;
               height:50px;
               width:1500px;
               border:4px solid blue;
           }
           li.horizontal{
               margin-left:180px;
               display:inline;
               font-size:20px;
               font-style:bold;
               text-align:center;
            }
            li a:hover{
                background:white;
            }
            span{
               color:darkblue;
            }
            span.right{
               margin-left:20px;
            }
            div{
                margin-left:50px;
                float:left;
            }
            h1{
               background:linear-gradient(to left,darkred,orange,gold,yellow,#ffff99,#ffffcc);
               width:500px;
               color:darkgreen;
               margin-top:15px;
               margin-left:50px;
            }
            h2{
               background:linear-gradient(to left,darkred,orange,gold,yellow,#ffff99,#ffffcc);
               width:500px;
               color:darkgreen;
            }
            #contact1{
                animation-name:rotation;
                animation-duration:2s;
                animation-iteration-count:infinite;
            }
            #contact2{
                animation-name:rotation;
                animation-duration:3s;
                animation-iteration-count:infinite;
            }
            @keyframes rotation{
                20% {transform:rotate(20deg);}
                50% {transform:rotate(-20deg);}
            }
        </style>
    </head>
    <body>
        <header>
        </header>
        <nav id="nav1">
            <ul>
                <li class="horizontal"><a href="home.php" target="_self">HOME</a></li>
                <li class="horizontal"><a href="about.php" target="_self">ABOUT</a></li>
                <li class="horizontal"><a href="signin.php" target="_self"><?php if(isset($_SESSION['signin'])&&($_SESSION['signin'])) echo $_SESSION['username'];
                                                                                 else echo "SIGN IN";?></a></li>
                <li class="horizontal"><a href="contactus.php" target="_self">CONTACT US</a></li>
                <?php
                $username=$_SESSION['username'];
                $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                $query41="select notificationno from logininfo where username='$username'";
                $result41=mysqli_query($db_handle,$query41) or die("Could not execute");
                $row41=mysqli_fetch_array($result41);
                $notificationno=$row41['notificationno'];


                if(isset($_SESSION['signin'])&&($_SESSION['signin']))
                      {?>
                         <li class="horizontal"><a href="notification.php" target="_self">NOTIFICATION<span style="color:red;"><?php if($notificationno>0) echo "  $notificationno" ?></span></a></li><?php
                      }
                ?>
            </ul>
        </nav>
        <img id="contact1" src="contact1.jpg" alt="not found" style="float:right;margin-right:30px;margin-top:70px;"></img><br></br>
        <img id="contact2"src="contact2.jpg" alt="not found" style="float:right;margin-right:30px;margin-top:70px;"></img><br></br>

        <h1>Contact Information</h1>
        <div>
           <span>IP phone:  </span>+88 09612444888 from any number.<br></br>
           <span>T & T Phone :  </span>+880-2-9117179, +880-2-9140345, +880-2-9143104 & +880-2-9144559. <br></br>
           <span>Email:  </span>dreamjob@yahoo.com<br></br><br></br>
           <h2 style="color:green">For Any Sales Query(For Clients Outside Dhaka)</h2><br></br>
           <span>Chittagong:  </span>01811410851<span class="right">  Rajshahi:  </span>01849215992<br></br>
           <span>Sylhet:  </span>01911410851<span class="right">      Mymensing:  </span>01947212992<br></br>
           <span>Barisal:  </span>01711410851<span class="right">     Khulna:  </span>01547213992<br></br>
           <span>Rongpur:  </span>01711410851<span class="right">      Comilla:  </span>01857213992<br></br>
           <h2 style="color:green">Address(Dhaka Branch)</h2>
           B-5, 204 Bir Uttam Shawkat Sarak, Gulshan-1, Dhaka.<br></br><br></br>
           <img src="googlemap.jpg" alt="Google Map Not Found" height="500px" width="500px"></img><br></br>
        </div>
    </body>
</html>

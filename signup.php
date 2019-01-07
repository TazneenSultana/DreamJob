<?php
   session_start();
   session_regenerate_id();
 ?>
<!doctype html>
<html>
    <head>
        <title>Sign Up</title>
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
               margin:110px;
               display:inline;
               font-size:28px;
               font-style:bold;
               text-align:center;
            }
            li a:hover{
                background:white;
            }
           fieldset{
                margin-top:30px;
                margin-left:500px;
                width:500px;
                font-size:20px;
            }
            span.required{
                color:red;
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
            </ul>
        </nav>
        <fieldset>
            <legend style="font-size:30px">Sign Up</legend>
            <form name="signup" action="regestrationcomplete.php" method="POST">
                <pre>
                FULL NAME: <input type="text" name="fullname" value="" required></input><span class="required">*</span>

                USERNAME:  <input type="text" name="username" value="" required></input><span class="required">*</span>

                EMAIL ID:  <input type="email" name="emailid" value=""></input>

                PASSWORD:  <input type="password" name="password" value="" required></input><span class="required">*</span>

                PHONE NO:  <input type="tel" name="phoneno" value=""></input>

                <input type="submit" name="signupbutton" value="Sign Up"></input>

                </pre>
            </form>
        </fieldset>
    </body>
</html>

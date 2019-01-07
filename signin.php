<?php
   session_start();
   session_regenerate_id();
   if(!isset($_SESSION['signin']))
   {
       $_SESSION['signin']=false;
   }
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
                font-size:20px;
                margin-top:50px;
                margin-left:500px;
                width:500px;
            }
            div{
               margin-top:30px;
               margin-left:500px;
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
                <li class="horizontal"><a href="signin.php" target="_self">SIGN IN</a></li>
                <li class="horizontal"><a href="contactus.php" target="_self">CONTACT US</a></li>
            </ul>
        </nav>
        <?php
            if($_SESSION['signin']==true)
            {
                header("location:useraccount.php");
            }
         ?>
        <fieldset>
            <legend style="font-size:30px">Sign In</legend>
            <form name="signin" action="useraccount.php" method="POST">
                <pre>
                    USERNAME:  <input type="text" name="username" value="" required></input><span class="required">*</span>

                    PASSWORD:  <input type="password" name="password" value="" required></input><span class="required">*</span>

                               <input type="submit" name="signinbutton" value="SIGN IN"></input>
                </pre>
            </form>
        </fieldset>
        <div>
            <pre>
                Don't have an account?
                       <a href="signup.php">SIGN UP</a>
            </pre>
        </div>
    </body>
</html>


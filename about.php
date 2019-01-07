<?Php
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
            li.vertical{
                margin-left:70px;
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
        <pre style="font-size:20px;float:left;">
        <img src="doyouneed.png" alt="not found" style="float:right"></img>
        <h1 style="margin-left:80px;width:500px;background:linear-gradient(to left,#8080ff,#ccccff,white,#ccccff,#8080ff);">Why do you need us?</h1>

        Are you jobless at present or just want to get a better-paid job?
        Are you unhappy with your current job and in search of a job that
        matches with your true passion?


        Or you are in search of a skilled employee?


        If the answers of the first three questions are 'yes', then you should take
        a step to solve these problems and change your life.
        Because for getting success these are some important problems to solve.

        <img src="setimg.png" alt="not found" height="300px" width="300px"></img><br></br>
        Dream job is built to show you a way to the solutions of your problems.This website can provide you huge amount of
        informations about different types of jobs. Here you can search jobs by division or by category.You can also create
        your personal account here.

            <h1 id="aboutaccount" style="width:800px;margin-left:80px;background:linear-gradient(to left,#8080ff,#ccccff,white,#ccccff,#8080ff);">What can you do with this account?</h1>
                    <li class="vertical">You can post your resume</li>
                    <li class="vertical">You can apply for any job</li>
                    <li class="vertical">You can post job circular</li>
                    <li class="vertical">You can see who have applied for your job</li>
        </pre>
    </body>
</html>

<?php
    session_start();
    session_regenerate_id();
?>
<!doctype html>
<html>
    <head>
        <title>User Account</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            #navleft{
                height:150px;
                width:200px;
                float:left;
                margin-left:500px;
                margin-right: 50px;
            }
            #navright{
                height:150px;
                width:200px;
                float:right;
                margin-right:525px;
            }
            li{
                display:block;
            }
            li a:hover
            {
                background:white;
            }
       </style>
    </head>
    <body>
        <header>
        </header>
        <?php
          function test_input($data)
          {
              $data=htmlspecialchars($data);
              $data=htmlentities($data);
              $data=strip_tags($data);
              $data=trim($data);
              $data=stripslashes($data);
              return $data;
          }
         if($_SERVER['REQUEST_METHOD']=='POST')
         {
            $username=test_input($_POST['username']);
            $password=test_input($_POST['password']);

            $_SESSION['username']=$username;
           $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Can not connect");


            $sql1="select * from logininfo";
            $result1=mysqli_query($db_handle,$sql1) or die("Could not execute");
            $success=0;

            //fetching notificationno

            $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
            $query41="select notificationno from logininfo where username='$username'";
            $result41=mysqli_query($db_handle,$query41) or die("Could not execute");
            $row41=mysqli_fetch_array($result41);
            $notificationno=$row41['notificationno'];

            //fetching notificationno ended



            while($row1=mysqli_fetch_array($result1))
            {
                 if(($row1['username']==$username)&&($row1['password']==$password))
                 {
                      $_SESSION['signin']=1;
                      $success=true;
                      echo "<pre><div style='margin-top:75px;margin-left:75px;font-size:30px'>
                                 WELCOME $username
                            </div></pre>";
                       ?>
                     <nav id="navleft">
                        <ul>
                            <li><a href="home.php">HOME</a></li><br></br>
                            <li><a href="postresume.php">POST RESUME</a></li><br></br>
                            <li><a href="notification.php">NOTIFICATION  <span style="color:red;"><?php if($notificationno>0) echo $notificationno ?></span></a></li><br></br>
                        </ul>
                     </nav>
                     <nav id="navright">
                        <ul>
                            <li><a href="postjobcircular.php">POST JOB CIRCULAR</a></li><br></br>

                            <li><a href="viewcandidatesresumes.php">VIEW CANDIDATES' RESUMES</a></li><br></br>
                        </ul>
                    </nav>
                    <form name="signoutform" action="signout.php" method="POST">
                            <input style="margin-left:700px;margin-top:50px;" type="submit" name="signoutbutton" value="Sign Out"></input>
                    </form>
                     <?php
                  }
            }
            if(!$success)
            {
                  echo "<pre style='font-size:30px; font-style:bold; margin:75px'>
                        INVALID USERNAME OR PASSWORD.


                        <a href='signin.php'>Go Back</a> to sign in page.
                        </pre>";
            }
            mysqli_close($db_handle);
        }
        else if($_SESSION['signin'])
        {
            $username=$_SESSION['username'];

            //fetching notificationno

            $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
            $query41="select notificationno from logininfo where username='$username'";
            $result41=mysqli_query($db_handle,$query41) or die("Could not execute");
            $row41=mysqli_fetch_array($result41);
            $notificationno=$row41['notificationno'];

            //fetching notificationno ended



            echo "<pre><div style='margin-top:75px;margin-left:75px;font-size:30px'>
                                 WELCOME $username
                        </div></pre>";
            ?>
            <nav id="navleft">
                <ul>
                    <li><a href="home.php">HOME</a></li><br></br>
                    <li><a href="postresume.php">POST RESUME</a></li><br></br>
                    <li><a href="notification.php">NOTIFICATION  <span style="color:red;"><?php if($notificationno>0) echo $notificationno ?></span></a></li><br></br>
                </ul>
            </nav>
            <nav id="navright">
                <ul>
                    <li><a href="postjobcircular.php">POST JOB CIRCULAR</a></li><br></br>

                    <li><a href="viewcandidatesresumes.php">VIEW CANDIDATES' RESUMES</a></li><br></br>
                </ul>
            </nav>
            <form name="signoutform" action="signout.php" method="POST">
                     <input style="margin-left:700px;margin-top:50px;" type="submit" name="signoutbutton" value="Sign Out"></input>
            </form>
            <?php
        }
        ?>
    </body>
</html>

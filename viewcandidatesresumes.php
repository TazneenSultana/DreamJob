<?php
   session_start();
   session_regenerate_id();
 ?>
<!doctype html>
<html>
    <head>
        <title>View Candidates' Resumes</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:130px;
                width:1500px;
            }
            div{
               margin-left:30px;
               margin-top:50px;
               padding:30px;
               height:350px;
               width:180px;
               font-size:17px;
               border:3px solid blue;
               float:left;
               background:linear-gradient(to right,black,grey,lightgrey,white,lightgrey,black);
           }
           img{
              float:left;
              margin-top:50px;
           }
           a:hover{
              background:white;
          }
          iframe{
               float:left;
               margin-top:50px;
               border:2px solid black;
               margin-left:50px;
               padding-left:15px;
           }

        </style>
    </head>
    <body>
        <header>
        </header>
        <div>
            <ul>
                <li><a href="home.php">HOME</a></li><br></br>
                <li><a href="postjobcircular.php">POST JOB CIRCULAR</a></li><br></br>
                <li><a href="postresume.php">POST RESUME</a></li><br></br>
                <li><a href="notification.php">NOTIFICATION</a></li><br></br>
            </ul>
            <form style="margin-left:40px;" action="signout.php" method="POST">
               <input type="submit" name="signoutbutton" value="Sign Out" style="font-size:20px;"></input>
            </form>
        </div>
        <iframe  name="iframe2" src="applicationholder.php" height="1000px" width="800px"></iframe>
        <img src="recruitment.jpg" alt="not found" height="400px" width="350px"></img>

    </body>



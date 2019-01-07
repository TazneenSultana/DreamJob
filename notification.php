<?php
   session_start();
   session_regenerate_id();
   if($_SERVER['REQUEST_METHOD']=='POST')
   {
      $applicantusername=$_POST['applicantusername'];
      $circularid=$_POST['circularid'];
      $interviewdate=$_POST['interviewdate'];
      $interviewtime=$_POST['interviewtime'];
      $interviewplace=$_POST['interviewplace'];
      $additionalinfo=nl2br($_POST['additionalinfo']);

      $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
      $query36="update logininfo set notificationno = notificationno + 1 where username='$applicantusername'";
      $result36=mysqli_query($db_handle,$query36) or die("Could not execute");


      $query37="insert into notification(applicantname,circularid,interviewdate,interviewtime,interviewplace,additionalinfo) values('$applicantusername','$circularid','$interviewdate','$interviewtime','$interviewplace','$additionalinfo');";
      $result37=mysqli_query($db_handle,$query37) or die("Couldn't execute");
      mysqli_close($db_handle);
      ?>
      <html>
           <head>
        <title>Applicant informed</title>
       <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            h1{
              margin-top:100px;
              margin-left:500px;
            }
        </style>
    </head>
    <body>
        <header>
        </header>
        <h1>The Applicant Has Been Informed!</h1>
    </body>
      </html>
      <?php
   }
   else
   {?>
      <html>
           <head>
        <title>Notification</title>
       <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            span{
                color:blue;
            }
            div
            {
                float:right;
                border:3px solid blue;
                margin-top:60px;
                margin-right:100px;
                width:220px;
                height:400px;
                background:linear-gradient(to right,black,grey,lightgrey,white,lightgrey,black);
            }
        </style>
    </head>
    <body>
        <header></header>
        <div>
            <ul>
                <li><a href="home.php">HOME</a></li><br></br>
                <li><a href="postjobcircular.php">POST JOB CIRCULAR</a></li><br></br>
                <li><a href="postresume.php">POST RESUME</a></li><br></br>
                <li><a href="viewcandidatesresumes.php">VIEW CANDIDATES' RESUMES</a></li><br></br>
            </ul>
            <form style="margin-left:40px;" action="signout.php" method="POST">
               <input type="submit" name="signoutbutton" value="Sign Out" style="font-size:20px;"></input>
            </form>
        </div>
    <h2 style="color:black; background:yellow;width:250px;">Notifications</h2>
    <?php
    $username=$_SESSION['username'];
    $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
    $query38="select * from notification where applicantname='$username' order by notificationid desc";
    $result38=mysqli_query($db_handle,$query38) or die("Could not execute1");
    while($row38=mysqli_fetch_array($result38))
    {
        $circularid=$row38['circularid'];
        $interviewdate=$row38['interviewdate'];
        $interviewtime=$row38['interviewtime'];
        $interviewplace=$row38['interviewplace'];
        $additionalinfo=$row38['additionalinfo'];

        $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
        $query39="select institutionname,post from jobnews  where id='$circularid'";
        $result39=mysqli_query($db_handle,$query39) or die("Could not execute2");

        $row39=mysqli_fetch_array($result39);

        $institutionname=$row39['institutionname'];
        $post=$row39['post'];
        mysqli_close($db_handle);
        ?>
        <span>Inst. Name : </span><?php echo $institutionname ?><br></br>
        <span>Post : </span><?php echo $post ?><br></br>
        <span>Date of interview : </span><?php echo $interviewdate ?><br></br>
        <span>Time of interview : </span><?php echo $interviewtime ?><br></br>
        <span>Place of interview : </span><?php echo $interviewplace ?><br></br>
        <span>Additional info. : </span><?php echo $additionalinfo ?><br></br>
        <hr></hr>
    </body>
</html>
        <?php
    }
    $db_handle=mysqli_connect("localhost","root","","dreamjob");
    $query40="update logininfo set notificationno = 0 where username='$username'";
    $result40=mysqli_query($db_handle,$query40) or die("Could not execute3");
 }

 ?>

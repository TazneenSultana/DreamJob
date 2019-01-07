<?php
   session_start();
   session_regenerate_id();

   function test_input($data)
   {
      $data=htmlspecialchars($data);
      $data=htmlentities($data);
      $data=strip_tags($data);
      $data=trim($data);
      $data=stripslashes($data);
      return $data;
   }

   if(($_SESSION['signin']==true)&&($_SERVER['REQUEST_METHOD']=='POST'))
   {
       $applicantusername=$_SESSION['username'];
       $circularid=test_input($_POST['circularid']);

       $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
       $sql25="insert into applicationholder(circularid,applicantusername) values('$circularid','$applicantusername');";
       $result25=mysqli_query($db_handle,$sql25) or die("Could not execute");
       mysqli_close($db_handle);
   }
   else
   {
       header("location:signin.php");
   }
?>

<html>
    <head>
        <title>Apply</title>
       <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            h1{
              margin-top:100px;
              margin-left:420px;
            }
            a{
              margin-left:700px;
            }
            form{
              margin-left:700px;
            }
        </style>
    </head>
    <body>
        <header>
        </header>
        <h1>Your Application Is Received Successsfully!</h1>
        <a href="home.php">HOME</a><br></br>
        <form action="signout.php" method="POST">
            <input type="submit" name="signoutbutton" value="Sign Out"></input>
        </form>
    </body>
</html>

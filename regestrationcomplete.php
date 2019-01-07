<!doctype html>
<html>
    <head>
        <title>Regestration Complete</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
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
                $fullname=test_input($_POST['fullname']);
                $username=test_input($_POST['username']);
                $emailid=test_input($_POST['emailid']);
                $password=test_input($_POST['password']);
                $phoneno=test_input($_POST['phoneno']);
            }
            $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");


           $already_regestered=0;
           $sql2="select username from logininfo";
           $result2=mysqli_query($db_handle,$sql2) or die("Could not execute");
           while($row2=mysqli_fetch_array($result2))
           {
              if($row2['username']==$username)
              {
                 echo"<pre style='font-size:30px;font-style:bold;margin-top:65px'>
               Sorry, this username is already registered. Try another one.

                           <a href='signup.php'>Go Back</a> to sign up page.
                 </pre>";
                 $already_regestered=1;
                 die();
              }

           }
           if(!$already_regestered)
           {
                $sql3="insert into logininfo(fullname,username,emailid,password,phoneno) values('$fullname','$username','$emailid','$password','$phoneno');";
                $result3=mysqli_query($db_handle,$sql3) or die("Could not execute this");
                if($result3)
                {
                     echo "<pre style='font-size:30px;font-style:bold;margin-top:65px'>
                     Your registration is successful.

                     Now you are a member of Dream Job.

                     Want to know what can you do with this account?
                                      <a href='about.php'>Click Here</a>


                        <a href='home.php'>HOME</a>                    <a href='signin.php'>SIGN IN</a>
                           </pre>";
                }
            }
            mysqli_close($db_handle);
         ?>
    </body>
</html>



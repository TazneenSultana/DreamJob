<?php
   session_start();
   session_regenerate_id();
 ?>
 <!doctype html>
 <html>
    <head>
        <style>
            div{
               font-size:20px;
            }
            span{
               color:darkblue;
            }
        </style>
    </head>
    <body>
    <?php
       if($_SERVER['REQUEST_METHOD']=='POST')
       {
           $circularid=$_POST['circularid'];
           $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
            $sql42="select * from jobnews where id='$circularid'";
            $result42=mysqli_query($db_handle,$sql42) or die("Could not execute");
            $row42=mysqli_fetch_array($result42);

            $id=$row42['id'];
            $logo=$row42['logo'];
            $institutionname=$row42['institutionname'];
            $post=$row42['post'];
            $eligibility=$row42['eligibility'];
            $experience=$row42['experience'];
            $salary=$row42['salary'];
            $lastdatetoapply=$row42['lastdatetoapply'];
            $region=$row42['region'];
            $category=$row42['category'];
            $additionaldescription=nl2br($row42['additionaldescription']);
            echo "<img src='$logo' style='float:left' height='50' width='50'><span style='margin-left:30px;font-size:25px;font-style:bold'>$institutionname</span><br>";
            ?>
            <div>
            <br></br>
            <span>Post: </span><?php echo $post;?><br></br>
            <span>Eligibility: </span><?php echo $eligibility; ?><br></br>
            <span>Experience: </span><?php echo $experience; ?><br></br>
            <span>Salary: </span><?php echo $salary; ?><br></br>
            <span>Deadline: </span><?php echo $lastdatetoapply; ?><br></br>
            <span>More Information: </span><?php echo $additionaldescription; ?><br></br>
            <?php
        }
             ?>
    </body>
</html>

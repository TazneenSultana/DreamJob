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
            p{
               font-size:40px;
               font-style:bold;
               margin-left:370px;
               margin-top:5px;
               color:yellow;
               animation-name: example;
               animation-duration: 2s;
               animation-iteration-count:infinite;
               text-shadow:2px 2px;
            }
            @keyframes example {
                     0%   {color: blue;}
                      25% {color: gold;}
                      50% {color: red;}
                      100% {color: orange;}
            }

        </style>
    </head>
    <body>
            <p>Hot Jobs</p>
            <?php
                $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                $sql4="select * from jobnews";
                $result4=mysqli_query($db_handle,$sql4) or die("Could not execute");
                while($row4=mysqli_fetch_array($result4))
                {
                    $id=$row4['id'];
                    $logo=$row4['logo'];
                    $institutionname=$row4['institutionname'];
                    $post=$row4['post'];
                    $eligibility=$row4['eligibility'];
                    $experience=$row4['experience'];
                    $salary=$row4['salary'];
                    $lastdatetoapply=$row4['lastdatetoapply'];
                    $region=$row4['region'];
                    $category=$row4['category'];
                    $additionaldescription=$row4['additionaldescription'];
                    echo "<img src='$logo' style='float:left' height='50' width='50'><span style='margin-left:30px;font-size:25px;font-style:bold'>$institutionname</span><br>";
                    ?>
                    <div>
                    <br></br>
                    <span>Post: </span><?php echo $post;?><br></br>
                    <span>Eligibility: </span><?php echo $eligibility; ?><br></br>
                    <span>Experience: </span><?php echo $experience; ?><br></br>
                    <span>Salary: </span><?php echo $salary; ?><br></br>
                    <span>Deadline: </span><?php echo $lastdatetoapply; ?><br></br>
                    <form name="description" action='description.php' target="_blank" method="POST">
                        <input type="submit" name="descriptionbutton" value="Description"></input>
                        <input type="hidden" name="circularid" value=<?php echo $id ?>></input>
                    </form>
                    <form name="applyform" action="applybutton.php" method="POST" target="_blank" style="margin-top:10px;"><!--target attribute use na korle applybutton.php iframe er vetor open hoy.-->
                       <input type="submit" name="applybutton" value="Apply Online" style="background:lightgreen;font-size:15px;"></input><br></br>
                       <input type="hidden" name="circularid" value=<?php echo $id ?>></input>
                    </form>
                    <hr></hr>
                    </div>
                    <?php
                }
                mysqli_close($db_handle);
            ?>

    </body>
</html>

<!doctype html>
<html>
    <header>
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
               margin-left:320px;
               margin-top:5px;
               color:yellow;
               animation-name: example;
               animation-duration: 4s;
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
    </header>
    <body>
        <p>Jobs in Medical Sector</p>
        <?php
                $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                $sql14="select * from jobnews where category='Medical'";
                $result14=mysqli_query($db_handle,$sql14) or die("Could not execute");
                while($row14=mysqli_fetch_array($result14))
                {
                    $id=$row14['id'];
                    $logo=$row14['logo'];
                    $institutionname=$row14['institutionname'];
                    $post=$row14['post'];
                    $eligibility=$row14['eligibility'];
                    $experience=$row14['experience'];
                    $salary=$row14['salary'];
                    $lastdatetoapply=$row14['lastdatetoapply'];
                    $region=$row14['region'];
                    $category=$row14['category'];
                    echo "<img src='$logo' style='float:left'><span style='margin-left:30px;font-size:32px;font-style:bold'>$institutionname</span><br>";
                    ?>
                    <div>
                    <br></br>
                    <span>Post: </span><?php echo $post;?><br></br>
                    <span>Eligibility: </span><?php echo $eligibility; ?><br></br>
                    <span>Experience: </span><?php echo $experience; ?><br></br>
                    <span>Salary: </span><?php echo $salary; ?><br></br>
                    <span>Deadline: </span><?php echo $lastdatetoapply; ?><br></br>
                    <form name="applyform" action="applybutton.php" method="POST" target="_blank"><!--target attribute use na korle applybutton.php iframe er vetor open hoy.-->
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



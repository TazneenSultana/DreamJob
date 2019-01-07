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
               margin-left:370px;
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
        <p>Jobs in Barisal</p>
        <?php
                $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                $sql8="select * from jobnews where region='Barisal'";
                $result8=mysqli_query($db_handle,$sql8) or die("Could not execute");
                while($row8=mysqli_fetch_array($result8))
                {
                    $id=$row8['id'];
                    $logo=$row8['logo'];
                    $institutionname=$row8['institutionname'];
                    $post=$row8['post'];
                    $eligibility=$row8['eligibility'];
                    $experience=$row8['experience'];
                    $salary=$row8['salary'];
                    $lastdatetoapply=$row8['lastdatetoapply'];
                    $region=$row8['region'];
                    $category=$row8['category'];
                    echo "<img src='$logo' style='float:left' height='50' width='50'><span style='margin-left:30px;font-size:32px;font-style:bold'>$institutionname</span><br>";
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


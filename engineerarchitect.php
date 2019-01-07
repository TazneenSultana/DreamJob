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
        <p>Jobs in Eng./Archi. Sector</p>
        <?php
                $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                $sql17="select * from jobnews where category='Engineer/Architect'";
                $result17=mysqli_query($db_handle,$sql17) or die("Could not execute");
                while($row17=mysqli_fetch_array($result17))
                {
                    $id=$row17['id'];
                    $logo=$row17['logo'];
                    $institutionname=$row17['institutionname'];
                    $post=$row17['post'];
                    $eligibility=$row17['eligibility'];
                    $experience=$row17['experience'];
                    $salary=$row17['salary'];
                    $lastdatetoapply=$row17['lastdatetoapply'];
                    $region=$row17['region'];
                    $category=$row17['category'];
                    echo "<img src='$logo' style='float:left' height='50' width='50'><span style='margin-left:30px;font-size:32px;font-style:bold'>$institutionname</span><br>";
                    ?>
                    <div>
                    <br></br>
                    <span>Post: </span><?php echo $post;?><br></br>
                    <span>Eligibility: </span><?php echo $eligibility; ?><br></br>
                    <span>Experience: </span><?php echo $experience; ?><br></br>
                    <span>Salary: </span><?php echo $salary; ?><br></br>
                    <span>Deadline: </span><?php echo $lastdatetoapply; ?><br></br>
                    <hr></hr>
                    </div>
                    <?php
                }
                mysqli_close($db_handle);
            ?>
    </body>
</html>



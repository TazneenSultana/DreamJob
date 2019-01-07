<?php
   session_start();
   session_regenerate_id();
 ?>
 <!doctype html>
 <html>
     <head>
         <style>
             h1{
               margin-left:220px;
            }
            h2{
              margin-left:150px;
            }
            span{
               font-size:30px;
               color:blue;
               margin-left:30px;
            }
            span.resume{
               font-size:20px;
               color:blue;
            }
            #propic{
               margin-left:30px;
            }
            span.circular{
               color:black;
            }
            div{
               color:black;
               font-size:20px;
            }
         </style>
     </head>
     <body>
          <h1>You Posted This Circular</h1>
          <?php
            $employerusername=$_SESSION['username'];

            $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
            $sql26="select id,institutionname,post from jobnews where employerusername='$employerusername'";
            $result26=mysqli_query($db_handle,$sql26) or die("Could not execute");
            while($row26=mysqli_fetch_array($result26))
            {
                $circularid=$row26['id'];
                ?><span class="circular">Inst:</span><span><?php echo $row26['institutionname'];?></span><br>
                <span class="circular">Post : </span><span><?php echo $row26['post']; ?></span><br>
                <h2>People who have shown interest for this job : </h2>
            <?php
                $sql27="select applicationid,applicantusername from applicationholder where circularid='$circularid'";
                $result27=mysqli_query($db_handle,$sql27) or die("Could not execute");
                while($row27=mysqli_fetch_array($result27))
                {
                    $applicantusername=$row27['applicantusername'];
                    $applicationid=$row27['applicationid'];
                    $sql28="select * from resumes where username='$applicantusername'";
                    $result28=mysqli_query($db_handle,$sql28) or die("Could not execute 28th query");
                    while($row28=mysqli_fetch_array($result28))
                    {
                        $profilepicture=$row28['profilepicture'];?>
                        <div>
                        <span id="propic"><?php echo "<img src='$profilepicture' height='180px' width='150px'>";?><br></br></span>
                        <span class="resume">Name : </span><?php echo $row28['fullname']."<br><br>";?>
                        <span class="resume">Father's Name : </span><?php echo $row28['fathername']."<br><br>";?>
                        <span class="resume">Mother's Name : </span><?php echo $row28['mothername']."<br><br>";?>
                        <span class="resume">Date of Birth : </span><?php echo $row28['dateofbirth']."<br><br>";?>
                        <span class="resume">Gender : </span><?php echo $row28['gender']."<br><br>";?>
                        <span class="resume">Nationality : </span><?php echo $row28['nationality']."<br><br>";?>
                        <span class="resume">Religion : </span><?php echo $row28['religion']."<br><br>";?>
                        <span class="resume">Highest Education : </span><?php echo $row28['highesteducation']."<br><br>";?>
                        <span class="resume">GPA/CGPA : </span><?php echo $row28['gpacgpa']."<br><br>";?>
                        <span class="resume">Experience : </span><?php echo $row28['experience']."<br><br>";?>
                        <span class="resume">Email : </span><?php echo $row28['email']."<br><br>";?>
                        <span class="resume">Contact No: </span><?php echo $row28['contactno']."<br><br>";?>

                        <form name="pdf" action="pdfresume.php" method="POST" target="_blank" style="margin-left:30px">
                            <input type="submit" name="pdfresume" value="See PDF Resume" style="background:lightgreen;font-size:15px;"></input><br></br>
                             <input type="hidden" name="applicantusername" value=<?php echo $applicantusername ?>></input>
                       </form>
                       <form name="informapplicant" action="notification.php" method="POST" target="_blank">
                            <br></br> If you want to take his/her interview fill out the following forms and let him/her know.<br></br>
                           <span class="resume">Date of interview: </span><input type="date" name="interviewdate"></input><br></br>
                           <span class="resume">Time of interview: </span><input type="time" name="interviewtime"></input><br></br>
                           <span class="resume">Place of interview: </span><input type="text" name="interviewplace"></input><br></br>
                           <span class="resume">Additional info.: </span><textarea name="additionalinfo" rows="5" cols="70"></textarea><br></br>
                           <input type="submit" name="inform applicant" value="Inform Applicant" style="background:lightgreen;font-size:15px;margin-left:20px;"></input>
                           <input type="hidden" name="applicantusername" value=<?php echo $applicantusername ?>></input>
                           <input type="hidden" name="circularid" value=<?php echo $circularid ?>></input>
                       </form>
                       <hr></hr> <br><br>
                      </div>
                      <?php
                    }
                }
            }
         ?>
     </body>
 </html>

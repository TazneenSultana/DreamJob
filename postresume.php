<?php
    session_start();
    session_regenerate_id();
?>
<!doctype html>
<html>
    <head>
        <title>POST RESUME</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            #div1{
               margin-left:30px;
               margin-top:70px;
               padding:30px;
               height:350px;
               width:180px;
               font-size:17px;
               border:3px solid blue;
               float:left;
               background:linear-gradient(to right,black,grey,lightgrey,white,lightgrey,black);
           }
           #div2{
               margin-left:600px;
               margin-top:10px;
               font-size:20px;
               color:red;
           }
           pre{
               height:1150px;
               width:700px;
               border: 5px double blue;
               margin-left:110px;
               margin-top:70px;
               font-size:20px;
               float:left;
           }
           input.resume
           {
               width:300px;
               font-size:15px;
           }
           img{
              float:right;
              margin-top:50px;
           }
           p{
              margin-bottom:1050px;
              float:center;
          }
          a:hover{
            background:white;
          }
          span.required{
            color:red;
          }
        </style>
    </head>
    <body>
        <header></header>
        <div id="div1">
            <ul>
                <li><a href="home.php">HOME</a></li><br></br>
                <li><a href="postjobcircular.php">POST JOB CIRCULAR</a></li><br></br>
                <li><a href="viewcandidatesresumes.php">VIEW CANDIDATES' RESUMES</a></li><br></br>
                <li><a href="notification.php">NOTIFICATION</a></li><br></br>
            </ul>
            <form style="margin-left:40px;" action="signout.php" method="POST">
               <input type="submit" name="signoutbutton" value="Sign Out" style="font-size:20px;"></input>
            </form>
        </div>
        <div id="div2">
           <?php
              if($_SERVER['REQUEST_METHOD']=='POST')
              {
                  echo "Your Resume Has Been Posted Successfully!<br>";
              }
            ?>
       </div>
        <pre>
        <form name="resumeform" action="postresume.php" method="POST" enctype="multipart/form-data">
        <span style="margin-right:50px;color:blue;font-size:20px">Post PDF Resume : </span><input type="file" name="pdfresume"></input><br></br>
        PROFILE PICTURE:<span>      </span><input class="resume" type="file" name="image"></input><br></br>
        FULL NAME:<span>            </span><input class="resume" type="text" name="fullname" value="" required></input><span class="required">*</span><br></br>
        FATHER'S NAME:<span>        </span><input class="resume" type="text" name="fathername" value=""></input><br></br>
        MOTHER'S NAME:<span>        </span><input class="resume" type="text" name="mothername" value=""></input><br></br>
        DATE OF BIRTH:<span>        </span><input class="resume" type="date" name="dateofbirth"></input><br></br>
        GENDER:<span>               </span><input class="resume" type="text" name="gender" value=""></input><br></br>
        NATIONALITY:<span>          </span><input class="resume" type="text" name="nationality" value=""></input><br></br>
        RELIGION:<span>             </span><input class="resume" type="text" name="religion" value=""></input><br></br>
        HIGHEST EDUCATION:<span>    </span><input class="resume" type="text" name="highesteducation" value="" required></input><span class="required">*</span><br></br>
        GPA/CGPA:<span>             </span><input class="resume" type="float" name="gpacgpa" value="" required></input><span class="required">*</span><br></br>
        EXPERIENCE(if any):<span>   </span><input class="resume" type="text" name="experience" value=""></input><br></br>
        EMAIL:<span>                </span><input class="resume" type="text" name="email" value="" required></input><br><span class="required"></span></br>
        CONTACT NO:<span>           </span><input class="resume" type="text" name="contactno" value="" required></input><span class="required">*</span><br></br>

                           <input type="submit" name="postresumebutton" value="POST RESUME" style="font-size:20px;background:lightgreen"></input><br></br>
        </form>
        </pre>
        <img src="myresume.png" alt="not found" height="200px" width="300px"></img>
        <img src="resume.png" alt="not found" height="300px" width="300px"></img>
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
               $username=$_SESSION['username'];
               if(isset($_FILES['image']))
               {
                   $profilepicture=$_FILES['image']['name'];
               }
               if(isset($_FILES['pdfresume']))
               {
                   $pdfresume=$_FILES['pdfresume']['name'];
               }
               $fullname=test_input($_POST['fullname']);
               $fathername=test_input($_POST['fathername']);
               $mothername=test_input($_POST['mothername']);
               $dateofbirth=test_input($_POST['dateofbirth']);
               $gender=test_input($_POST['gender']);
               $nationality=test_input($_POST['nationality']);
               $religion=test_input($_POST['religion']);
               $highesteducation=test_input($_POST['highesteducation']);
               $gpacgpa=test_input($_POST['gpacgpa']);
               $experience=test_input($_POST['experience']);
               $email=test_input($_POST['email']);
               $contactno=test_input($_POST['contactno']);

               $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
               $sql23="insert into resumes(username,profilepicture,fullname,fathername,mothername,dateofbirth,gender,nationality,religion,highesteducation,gpacgpa,experience,email,contactno,PDF) values('$username','$profilepicture','$fullname','$fathername','$mothername','$dateofbirth','$gender','$nationality','$religion','$highesteducation','$gpacgpa','$experience','$email','$contactno','$pdfresume');";
               $result23=mysqli_query($db_handle,$sql23) or die("Could not execute");
           }
        ?>
    </body>
</html>

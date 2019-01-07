<?php
   session_start();
   session_regenerate_id();
 ?>
<!doctype html>
<html>
    <head>
        <title>POST JOB CIRCULAR</title>
        <style>
            header{
                background-image:url("headerimage.jpg");
                border:5px double grey;
                height:200px;
                width:1500px;
            }
            #div1{
               margin-left:30px;
               margin-top:60px;
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
               margin-top:20px;
               font-size:20px;
               color:red;
           }
           pre{
               height:1200px;
               width:700px;
               border: 5px double blue;
               margin-left:110px;
               margin-top:30px;
               font-size:20px;
               float:left;
           }
           input.circular
           {
               width:300px;
               font-size:15px;
           }
           option.circular
           {
               width:300px;
           }
           img{
              float:right;
              margin-top:50px;
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
                <li><a href="postresume.php">POST RESUME</a></li><br></br>
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
                  echo "Your Job Circular Has Been Posted Successfully!<br>";
              }
            ?>
       </div>
        <pre>
        <form name="jobcircularform" action="postjobcircular.php" method="POST" enctype="multipart/form-data">
        INSTITUTION LOGO:<span>       </span><input class="circular" type="file" name="logo"></input><br></br>
        INSTITUTION NAME:<span>       </span><input class="circular" type="text" name="institutionname" value="" required></input><span class="required">*</span><br></br>
        POST:<span>                   </span><input class="circular" type="text" name="post" value="" required></input><span class="required">*</span><br></br>
        ELIGIBILITY:<span>            </span><input class="circular" type="text" name="eligibility" value="" required></input><span class="required">*</span><br></br>
        EXPERIENCE:<span>             </span><input class="circular" type="text" name="experience"></input><br></br>
        SALARY:<span>                 </span><input class="circular" type="text" name="salary" value=""></input><br></br>
        LAST DATE TO APPLY:<span>     </span><input class="circular" type="text" name="lastdatetoapply" value=""></input><br></br>
        REGION:<span>                 </span><select class="circular" name="region" required><option value="Dhaka">Dhaka</option><option value="Chittagong">Chittagong</option><option value="Rashahi">Rajshahi</option><option value="Khulna">Khulna</option><option value="Barisal">Barisal</option><option value="Sylhet">Sylhet</option><option value="Rongpur">Rongpur</option><option value="Mymensingh">Mymensingh</option></select><span class="required">*</span><br></br>
        CATEGORY:<span>               </span><select class="circular" name="category" required><option value="Education">Education</option><option value="Medical">Medical</option><option value="Accounting/Finance">Accounting/Finance</option><option value="Bank">Bank</option><option value="Engineer/Architect">Engineer/Architect</option><option value="Travel/Tourism">Travel/Tourism</option><option value="Garments">Garments</option><option value="Agro">Agro</option><option value="Media">Media</option><option value="Marketing/Sales">Marketing/Sales</option></select><span class="required">*</span><br></br>
        DESCRIPTION:<span>     </span><textarea name="description" rows="20" cols="50"></textarea><br></br>


                        <input type="submit" name="postjobcircularbutton" value="POST JOB CIRCULAR" style="font-size:20px;background:lightgreen"></input><br></br>
        </form>
        </pre>
        <img src="employeewanted.jpg" alt="not found" height="300px" width="300px"></img>
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
                 $employerusername=$_SESSION['username'];
                 if($_FILES['logo'])
                 {
                     $logo=$_FILES['logo']['name'];
                 }
                 $institutionname=test_input($_POST['institutionname']);
                 $post=test_input($_POST['post']);
                 $eligibility=test_input($_POST['eligibility']);
                 $experience=test_input($_POST['experience']);
                 $salary=test_input($_POST['salary']);
                 $lastdatetoapply=test_input($_POST['lastdatetoapply']);
                 $region=test_input($_POST['region']);
                 $category=test_input($_POST['category']);
                 $additionaldescription=nl2br(test_input($_POST['description']));

                 $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
                 $sql24="insert into jobnews(logo,institutionname,post,eligibility,experience,salary,lastdatetoapply,region,category,additionaldescription,employerusername) values('$logo','$institutionname','$post','$eligibility','$experience','$salary','$lastdatetoapply','$region','$category','$additionaldescription','$employerusername');";
                 $result24=mysqli_query($db_handle,$sql24) or die("Could not execute");

                  mysqli_close($db_handle);
            }

         ?>
    </body>
</html>

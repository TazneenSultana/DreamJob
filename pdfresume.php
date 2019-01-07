<?php
   session_start();
   session_regenerate_id();

   if($_SERVER['REQUEST_METHOD']=='POST')
   {
       $applicantusername=$_POST['applicantusername'];

       $db_handle=mysqli_connect("localhost","root","","dreamjob") or die("Could not connect");
       $sql35="select PDF from resumes where username='$applicantusername'";
       $result35=mysqli_query($db_handle,$sql35) or die("Could not execute");

       while($row35=mysqli_fetch_array($result35))
       {
            $pdf=$row35['PDF'];
            $pdfname=$row35['PDF'];
            header('Content-type: application/pdf');
            header('Content-Disposition: inline;filename="'    . $pdfname .    '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            @readfile($pdf);
       }
   }

 ?>

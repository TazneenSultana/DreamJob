<?php
   session_start();
   session_regenerate_id();
   $_SESSION['signin']=false;
   header("location:signin.php");
 ?>


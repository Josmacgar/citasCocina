<?php
  session_start();
  if(isset($_SESSION)) {
     $_SESSION = array();
     session_destroy();
    //   header("Location:../index.php");
      echo "<script type=\"text/javascript\">window.location.href = \"/citascocina/index.php\";</script>";
   }
?>
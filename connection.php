<?php

$username="root";
$password="";
$server="localhost";
$db="signup";

$con=mysqli_connect($server,$username,$password,$db);
if($con)
{
  ?>
  <!-- <script type="text/javascript">
    alert("connected successfully");
  </script> -->
  <?php
}
else
{
  ?>
  <!-- <script type="text/javascript">
    alert("not connected");
  </script> -->
  <?php
}



 ?>

<?php
 session_start();

 if(!isset($_SESSION['username'])){
   echo "you are logged out";
   header('location:login.php');
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php  include 'links.php'; ?>
    <style >
      <?php include 'css/styles.css'; ?>
    </style>
  </head>
  <body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
     <!-- form-group// -->

      <div class="form-group">
        <button  name="submit" type="submit" class="btn btn-primary btn-block"><a name="submit" href="logout.php" style="color:white;"> Log Out </a> </button>
      </div> <!-- form-group// -->
<h1>hello this is <?php echo $_SESSION['username'];?></h1>
  </form>
  </body>
</html>

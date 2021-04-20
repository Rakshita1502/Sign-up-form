<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    include 'links.php'; ?>
    <style media="screen">
      <?php include'css/styles.css'; ?>
    </style>
  </head>
  <body>

  <?php

  include 'connection.php';

  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $emailsearch="select * from signin where email='$email'";
    $query=mysqli_query($con,$emailsearch);

    $emailcount=mysqli_num_rows($query);

    if($emailcount){
      $emailpass=mysqli_fetch_assoc($query);

      $dbpass=$emailpass['password'];

      $_SESSION['username']=$emailpass['name'];

      $check=password_verify($password,$dbpass);

      if($check){
        echo "login successfull";
        ?>
        <script type="text/javascript">
          location.replace("home.php");
        </script>
        <?php
      }else{
        echo "incorrect password";
      }
    }else{
      echo "invalid email";
    }

  }

   ?>
    <div class="container">
    <br>

    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
    	<h4 class="card-title mt-3 text-center">Create Account</h4>
    	<!-- <p class="text-center">Get started with your free account</p> -->
    	<p>
    		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
    		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
    	</p>
    	<p class="divider-text">
            <span class="bg-light">OR</span>
        </p>


    	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    	 <!-- form-group// -->
        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
    		 </div>
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
        </div> <!-- form-group// -->

        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    		</div>
            <input name="password" class="form-control" placeholder=" Password" type="password" required>
        </div> <!-- form-group// -->

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary btn-block"> Login Now  </button>
        </div> <!-- form-group// -->
        <p class="text-center">Dont have an account? <a href="login.php">Sign In</a> </p>
    </form>
    </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

    <br><br>


  </body>
</html>

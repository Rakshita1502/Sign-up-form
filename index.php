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

    if(isset($_POST['submit']))
    {
      $username=mysqli_real_escape_string($con,$_POST['name']);
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $phone=mysqli_real_escape_string($con,$_POST['phone']);
      $password=mysqli_real_escape_string($con,$_POST['password']);
      $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

      $pass=password_hash($password,PASSWORD_BCRYPT);
      $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

      $emailquery="select * from signin where email='$email'";
      $query=mysqli_query($con,$emailquery);

      $emailcount=mysqli_num_rows($query);

      if($emailcount>0){
        ?>
        <script type="text/javascript">
          alert("email already exists");
        </script>
        <?php
      }
      else{
        if($password===$cpassword){

          $insertquery="insert into signin(name,email, phone, password,cpassword) values('$username','$email','$phone','$pass','$cpass')";
          $iquery=mysqli_query($con,$insertquery);
          if($iquery)
          {
            ?>
            <script type="text/javascript">
              alert("inserted successfully");
            </script>
            <?php
          }
          else
          {
            ?>
            <script type="text/javascript">
              alert("not inserted");
            </script>
            <?php
          }

        }else{
          ?>
          <script type="text/javascript">
            alert("password not matching");
          </script>
          <?php
        }
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


    	<form action="" method="POST">
    	<div class="form-group input-group">
    		<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
    		</div>
            <input name="name" class="form-control" placeholder="Full name" type="text" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
    		 </div>
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
    		</div>

        	<input name="phone" class="form-control" placeholder="Phone number" type="text" required>
        </div>
        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    		</div>
            <input name="password" class="form-control" placeholder="Create password" type="password" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
        	<div class="input-group-prepend">
    		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    		</div>
            <input name="cpassword" class="form-control" placeholder="Repeat password" type="password" required>
        </div> <!-- form-group// -->
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary btn-block"> Create Account  </button>
        </div> <!-- form-group// -->
        <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
    </form>
    </article>
    </div> <!-- card.// -->

    </div>
    <!--container end.//-->

    <br><br>


  </body>
</html>

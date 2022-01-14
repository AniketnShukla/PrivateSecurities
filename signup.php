<?php
$same = true;

if(isset($_POST['uname']) && isset($_POST['password'])){
  $con = mysqli_connect('localhost', 'root','manager', 'secdev', 3307 );

  if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
  }

  $name = $_POST['uname'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];

  if($pass == $cpass){
    $s = "select * from signup where name = '$name'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1){
      echo "Username already taken";
    }
    else{
      $reg = "insert into signup(Name, Password) values ('$name' , '$pass')";
      mysqli_query($con, $reg);
      echo "
      <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
    </symbol>
    <div class='alert alert-success d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
    <div>
    Registration Successful
    </div>
  </div>";
      header('location:login.php');
    }
    }
  else{
    $same = false;
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./signup.css">
    <title>Sign Up</title>
  </head>
  <body>
<?php require 'partials/_nav.php' ?>
<div class="container" >
<form action="/dmp/signup.php" method="post">

  <div class="mb-3">
    <label class="form-label">Username
    </label>
    <input name='uname' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input name='password' type="password" class="form-control" id="exampleInputPassword1" required>
    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>

    <label for="cpassword" class="form-label">Confirm Password</label>
    <input name='cpassword' type="password" class="form-control" id="exampleInputPassword1">
    <?php 
    if($same == false){
      echo "<p>Passwords do not match.</p>";
    }
    ?>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="bt">Submit</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
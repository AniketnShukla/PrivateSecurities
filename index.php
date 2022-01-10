<?php
$insert = false;
if(isset($_POST['name'])){
    //Set Connection variables
    $server = "localhost";
    $username = "root";
    $password = "manager";
    $database = "trip";

    // Create a database Connection
    $con = mysqli_connect($server, $username, $password, $database, 3307);

    //Check for Connection Success
    if(!$con){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to the server";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;


    //Execute teh query
    if($con->query($sql) == true){ 
        // echo "SUccessfully inserted";

        //Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        $not_insert = true;
    }

    // Close the database connection 
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <title>Welcome to Trip Form</title>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <img src="bg.jpg" alt="" class="image" >
    <div class="container">
        <h1>SecDev</h1>
        <p>Enter details </p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thank you for submitting the form. Glad to have you joining the trip.</p>";    
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <textarea name ="desc" id="desc" placeholder="Enter Other Info Here" cols="20" rows="5" >
            </textarea>
            <div class="btngroup">
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
            </div>
        </form> 
    </div>
    <script src="index.js"></script>

</body>
</html>
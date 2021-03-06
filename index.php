<?php
$insert = false;
if(isset($_POST['ID'])){
    //Set Connection variables
    $server = "localhost";
    $username = "root";
    $password = "manager";
    $database = "secdev";

    // Create a database Connection
    $con = mysqli_connect($server, $username, $password, $database, 3307);

    //Check for Connection Success
    if(!$con){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    // echo "Success connecting to the server";

    // Collect post variables
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $DOJ = $_POST['DOJ'];
    $Pincode = $_POST['Pincode'];
    $Branch_ID = $_POST['Branch_ID'];
    $Location = $_POST['Location'];
    $Client_ID = $_POST['Client_ID'];
    $sql = "INSERT INTO `secdev`.`personnel` (`ID`, `Name`, `Gender`, `Date of Joining`, `Pincode`, `Branch_ID`, `Location`, `Client_ID`) VALUES ('$ID', '$Name', '$Gender', '$DOJ', '$Pincode', '$Branch_ID', '$Location', '$Client_ID');";
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
            <input type="text" name="ID" id="name" placeholder="Enter ID">
            <input type="text" name="Name" id="age" placeholder="Enter  Name">
            <input type="text" name="Gender" id="gender" placeholder="Enter Gender">
            <input type="date" name="DOJ" id="email" placeholder="Enter Date of joining">
            <input type="text" name="Pincode" id="phone" placeholder="Enter Branch Pincode ">
            <input type="text" name="Branch_ID" id="phone" placeholder="Enter your Branch ID">
            <input type="text" name="Location" id="phone" placeholder="Enter your Client Location">
            <input type="text" name="Client_ID" id="phone" placeholder="Enter your CLient ID">
            <div class="btngroup">
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
            </div>
        </form> 
    </div>
    <script src="index.js"></script>

</body>
</html>
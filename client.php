<?php
$insert = false;
if(isset($_POST['Client_ID'])){
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
    $Client_ID = $_POST['Client_ID'];
    $Client_Name = $_POST['Client_Name'];
    $Client_Location = $_POST['Client_Location'];
    $Resource_ID = $_POST['Resource_ID'];    $sql = "INSERT INTO `secdev`.`client` (`Client ID`, `Name`, `Client Location`, `Resource_ID`) VALUES ('$Client_ID', '$Client_Name', '$Client_Location', '$Resource_ID');";
    // echo $sql;


    //Execute teh query
    if($con->query($sql) == true){ 
        // echo "SUccessfully inserted";
            
        echo "
        <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
      </symbol>
      <div class='alert alert-success d-flex align-items-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
      <div>
      Successfully inserted
      </div>
    </div>";
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
    <title>Secdev</title>
</head>
<body>
    <?php require 'partials/_nav.php' ?>

    <img src="bg.jpg" alt="" class="image" >
    <div class="container">
        <h1>SecDev</h1>
        <p>Enter Client details </p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thank you for submitting the form. Glad to have you joining the trip.</p>";    
        }
        ?>

        <form action="client.php" method="post">
            <input type="text" name="Client_ID" id="name" placeholder="Enter Client ID">
            <input type="text" name="Client_Name" id="age" placeholder="Enter Client Name">
            <input type="text" name="Client_Location" id="gender" placeholder="Enter Client Location">
            <input type="text" name="Resource_ID" id="phone" placeholder="Enter Resouce ID ">
            <div class="btngroup">
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
            </div>
        </form> 
    </div>
    <script src="index.js"></script>

</body>
</html>
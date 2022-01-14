<?php
require 'partials/_nav.php';
?>
<?php

$con = new mysqli('localhost', 'root', 'manager', 'secdev', 3307);

if(isset($_GET['sp'])){
$id = $_GET['sp'];
$type = $_GET['sp'];
$cid = $_GET['sp'];   
$pr = $_GET['sp'];   

echo $id;


$sql = "SELECT * FROM `equipment` WHERE `equipment`.`ID` = '$id' OR `Type` = '$type' OR `Client_ID` = '$cid' OR `Price` = '$pr';";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
foreach ($row as $i) {
    // process element here
    echo $i.' ';
}
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="speedtest.css">
    <title>Document</title>
</head>
<body>
    <div class="overall">
        <div class="sea" id="s">

        <form action="/dmp/assignequipment.php" method="get">
        <input type="text" name="sp" placeholder="Search" >
            <button class="search" id="s"wa>Search</button> 
         </form>   
        </div>
        <?php 
if(isset($_GET['sp'])){
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result); 
    if($row){
echo '
         <div class="container">
         <div class="child0">
         <a href="/dmp/assignequipment.php?sp='.($id-1).'"><button>Prev</button></a>
         </div>
             <div class="child1">
                <h1>
                '.$row['Type'] .'
                </h1>
                <img src="/dmp/partials/user.png" alt="image">
             </div>
             <div class="child2">
                <h1>Details</h1>

                <p>ID: <br><div class="result">'.$row['ID'] .'</div></p>
                <p>Name: <br><div class="result">'.$row['Type'] .'</div></p>
                <p>Gender: <br><div class="result">'.$row['Client_ID'] .'</div></p>
                <p>Price: <br><div class="result">'.$row['Price'] .'</div></p>
            </div>
            <div class="child3">
            <a href="/dmp/assignequipment.php?sp='.($id+1).'"><button>Next</button></a>
            </div>
            ';
}
else{
    echo '
    <div class="container" id="nf">
        <div >Enter Valid Input</p>
    </div>
    ';
}
}
?>
        </div>
    </div>    

    


    <script>
 /*       console.log($id);
        searches = document.getElementsByClassName('search');
        Array.from(searches).forEach((element)=>{
           element.addEventListener("click", (e) =>{
               console.log("here");
            sno = e.target.id;
               console.log(sno);
           })
        })*/
    </script>
</body>
</html>
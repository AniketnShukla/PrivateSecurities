<?php

require 'partials/_nav.php';

$update=false;
$delete=false;
if($update){
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
}
if($delete){
  echo "
  <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
  <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
</symbol>
<div class='alert alert-success d-flex align-items-center' role='alert'>
<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
<div>
Successfully deleted.
</div>
</div>";
}

$con = new mysqli('localhost', 'root', 'manager', 'secdev', 3307);

    if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
       $delete=true;
      $sql =  "DELETE FROM `client` WHERE `client`.`Client ID` = '$sno';";
        $result = mysqli_query($con, $sql);
    }

    if(isset($_POST['snoEdit'])){
        //Update the record
        $SNO = $_POST['snoEdit'];
        $Client_ID = $_POST['id'];
        $Client_Name = $_POST['nme'];
        $loc = $_POST['loc'];
        $res = $_POST['res'];   
         $sql = "UPDATE `Client` SET `Client ID` = '$Client_ID', `Name` = '$Client_Name', `Client Location` = '$loc', `Resource_ID` = '$res' WHERE `Client`.`Client ID` = '$Client_ID';";
        $con->query($sql);
        if($con->query($sql) == true){ 
            $update=true;

   }
}

$con = new mysqli('localhost', 'root', 'manager', 'secdev', 3307);

?>
<div class="container">
<style>
  .thea{
    color:white; 
    font-size:1.2rem; 
    font-weight: bolder;
  
  }
  button{
    border-radius: 5px;
    background-color: #334066 !important;
  }
  button:hover{
    background-color: grey !important;
  }
  .td{
    display:flex; 
    flex-direction: row; 
    padding: 5px; 
    align-items:center; 
    justify-content: center;
  }
  .myTable{
    font-size:1.2rem; 
    text-align: center;
    border: 4px solid pink; 
    padding-top: 5px; 
    border-radius: 10px; 
    background-color: black;
    
  }
  .p{
    font-size: 1.2rem;
  }



</style>
  <h1>SecDev Pvt Ltd</h1>
  <p class="p">Client Details</p>

<table class="table myTable" id="myTable">
  <thead class="thea">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client ID</th>
      <th scope="col">Name</th>
      <th scope="col">Client Location</th>
      <th scope="col">Resource ID</th>
</tr>
  </thead>
  <tbody>
      <?php
  $sql = "SELECT * FROM `client`";
  $sno=0;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
    $sno = $sno + 1;
    echo "<tr>
    <th scope='row'>".$sno."</th>
    <td scope='row'>".$row['Client ID']."</td>
    <td>".$row['Name']."</td>
    <td>".$row['Client Location']."</td>
    <td>".$row['Resource_ID']."</td>
    <td class='td'><button class='edit btn btn-sm btn-primary' id=".$row['Client ID'].">Edit</button> 
    <button class='delete btn btn-sm btn-primary' id=d".$row['Client ID'].">Delete</button>
  </tr>";
}
?>
</tbody>
</table>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  
  </head>
  <body>

<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="container">
      <form action="read_client.php" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">
            <input type="text" name="id" id="id" placeholder="Enter Client ID">
            <input type="text" name="nme" id="nme" placeholder="Enter Client Name">
            <input type="text" name="loc" id="loc" placeholder="Enter Client Location ">
            <input type="text" name="res" id="res" placeholder="Enter your Resource ID">
            <div class="btngroup">
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
            </div>
        </form>   
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
     
    $(document).ready( function(){
        $('#myTable').DataTable();
    });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e)=> {
            console.log("edit ", );
            tr = e.target.parentNode.parentNode;
            _id = tr.getElementsByTagName("td")[0].innerText;
            _name = tr.getElementsByTagName("td")[1].innerText;
            _loc = tr.getElementsByTagName("td")[2].innerText;
            _res = tr.getElementsByTagName("td")[3].innerText;
            console.log(_id , _name, _loc, _res);
            id.value = _id;
            nme.value = _name;
            loc.value = _loc;
            res.value = _res;
            console.log(nme.value);
            res.value = _res;
            snoEdit.value= e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
        }) 
    })

    deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e)=> {
            console.log("edit ", );
            sno = e.target.id.substr(1,);

            if(confirm("Are you sure you want to delete")){
                window.location = `/dmp/read_client.php?delete=${sno}`;
                //Create a dorm and use post request to submit a form
            }
        }) 
    })
    </script>
  </body>
</html>
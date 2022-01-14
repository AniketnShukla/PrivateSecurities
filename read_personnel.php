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
      // $sql =  "DELETE FROM `personnel` WHERE `personnel`.`ID` = $sno;";
      $sql = "DELETE FROM `personnel` WHERE `personnel`.`ID` = $sno;";
        $result = mysqli_query($con, $sql);
    }

    if(isset($_POST['snoEdit'])){
        //Update the record
        $SNO = $_POST['snoEdit'];
        $id = $_POST['id'];
        $name = $_POST['nme'];
        $gen = $_POST['gender'];   
        $doj = $_POST['DOJ'];   
        $pin = $_POST['pincode'];   
        $bid = $_POST['bid'];   
        $loc = $_POST['location'];   
        $cid = $_POST['cid'];   
         $sql = "UPDATE `personnel` SET `ID` = '$id', `Name` = '$name',`Gender` = '$gen' ,`Date of Joining` = '$doj' ,`Pincode` = '$pin', `Branch_ID` = '$bid',`Location` = '$loc', `Client_ID` = '$cid'  WHERE `personnel`.`ID` = '$id';";
 
        if($con->query($sql) == true){ 
            $update=true;

   }
    }
 



$con = new mysqli('localhost', 'root', 'manager', 'secdev', 3307);

?>
<style>
  .thea{
    color:aliceblue; 
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
</div>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="checkavailable.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <div class="header">
      <div class="child1">
        <h1>SecDev Pvt Ltd.</h1>
        <p class="p">Personnel Details</p>
      </div>
      <div class="child2">
        <a href="checkavailable.php"><button class="btn btn-sm btn-primary">Check Available</button></a>
      </div>
    </div>  
    
    <table class="table myTable" id="myTable">
      <thead class="thea">
        <tr>
          <th scope="col">#</th>
          <th scope="col" >ID</th>
          <th scope="col">Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Date of Joining</th>
          <th scope="col">Pincode</th>
          <th scope="col">Branch_ID</th>
          <th scope="col">Location</th>
          <th scope="col">Client_ID</th>
    </tr>
      </thead>
      <tbody>
          <?php
      $sql = "SELECT * FROM `personnel`";
      $sno=0;
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>".$sno."</th>
        <td scope='row'>".$row['ID']."</td>
        <td>".$row['Name']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['Date of Joining']."</td>
        <td>".$row['Pincode']."</td>
        <td>".$row['Branch_ID']."</td>
        <td>".$row['Location']."</td>
        <td>".$row['Client_ID']."</td>
        <td class='td'><button class='edit btn btn-sm btn-primary' id=".$row['ID'].">Edit</button> 
        <button class='delete btn btn-sm btn-primary' id=d".$row['ID'].">Delete</button>
      </tr>";
    }
    ?>
    </tbody>
    </table>
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
      <form action="read_personnel.php" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <input type="text" name="id" id="id" placeholder="Enter ID">
            <input type="text" name="nme" id="nme" placeholder="Enter Name">
            <input type="text" name="gender" id="gender" placeholder="Enter Gender">
            <input type="date" name="DOJ" id="doj" placeholder="Enter Date of joining">
            <input type="text" name="pincode" id="pin" placeholder="Enter Branch Pincode ">
            <input type="text" name="bid" id="bid" placeholder="Enter your Branch ID">
            <input type="text" name="location" id="loc" placeholder="Enter your Client Location">
            <input type="text" name="cid" id="cid" placeholder="Enter your CLient ID">
            <div class="btngroup">
            <button class="btn">Submit</button>
            </div>
        </form>   
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
            _gen = tr.getElementsByTagName("td")[2].innerText;
            _doj = tr.getElementsByTagName("td")[3].innerText;
            _pin = tr.getElementsByTagName("td")[4].innerText;
            _bid = tr.getElementsByTagName("td")[5].innerText;
            _loc = tr.getElementsByTagName("td")[6].innerText;
            _cid = tr.getElementsByTagName("td")[7].innerText;
            console.log(_id , _name, _pin);
            id.value = _id;
            nme.value = _name;
            gender.value = _gen;
            doj.value = _doj;
            pin.value = _pin;
            bid.value = _bid;
            loc.value = _loc;
            cid.value = _cid;
            console.log(nme.value);
            snoEdit.value= e.target.id;
            console.log(e.target.id);
            $('#editModal').modal('toggle');
        }) 
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e)=> {
              console.log(deletes);
            console.log("edit ", );
            sno = e.target.id.substr(1,);
            console.log(sno);  
            if(confirm("Are you sure you want to delete")){
                window.location = `/dmp/read_personnel.php?delete=${sno}`;
                //Create a dorm and use post request to submit a form
            }
        }) 
    })
    </script>

  </body>
</html>
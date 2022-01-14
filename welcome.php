<?php

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
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
    <link rel="stylesheet" href="./welcome.css">
    
    <title>Welcome</title>
  </head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Gudea&family=Lato:wght@300&family=Poppins:wght@200&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Gudea&display=swap');

*{
    margin: 0px;
    padding:0px;
    box-sizing: border-box;

}

body{
  background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('/dmp/partials/bg1.jpg');
  background-position: center center;
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat;
  color: white;  
  font-family: 'Lato', sans-serif;
  width:100%;
}

.con{
  /* border: 2px maroon solid; */
  text-align:center;
}

section{

    display: flex;
    flex-direction: column;
    align-items: center;
    /* margin-top: 100px; */
    text-align: center;
    /* border: 2px maroon solid; */

    width: 100%;
    height: 100vh;
    scroll-snap-align: center;

}
#s1{

  margin:10px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 100px;
    text-align: center;
    
    width: 100%;
    /* height: 100vh; */
    scroll-snap-align: center;

}
#s1:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin:90px 190px;
    

}
#s1:before {
    box-shadow: inset 0 0 2000px rgba(255, 255, 255, .1);
}

#s2{

margin-top:-10%; 
  display: flex;
  flex-direction: row;
  align-items:baseline;
  /* margin-top: 100vh; */
  text-align: center;
  width: 100%;
  /* height: 100vh; */
  scroll-snap-align: center;

}
#s2:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin:90px 190px;
    

}
#s2:before {
    box-shadow: inset 0 0 2000px rgba(255, 255, 255, .1);
}


#s1 h1{
    font-size: 4rem;
    font-weight: bolder;
}
#s1 {
    background: inherit;
}

#s1:before {
    background: inherit;
}

#s2 button{
  display: flex;
  align-items: center;
  justify-content: center;
}

.ac{
  color: white !important;
}

p{
  font-size: 1.6rem;
}

</style>
  <body>
<?php require 'partials/_nav.php' ?>
  <div class="container con">
<section id="s1"> 
   <h1>Logged in as <?php echo $_SESSION['username']; ?></h1>
  <p>Guardian – Protect at any cost.<br>
    Advancing Security Worldwide.
  </p></section>



  <section id="s2">
  <div class="accordion bg-dark ac" id="accordionExample">
  <div class="accordion-item bg-dark">
    <h2 class="accordion-header bg-dark" id="headingOne">
      <button class="accordion-button bg-dark ac" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item bg-dark">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed bg-dark ac" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse bg-dark" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item bg-dark">
    <h2 class="accordion-header bg-dark ac" id="headingThree">
      <button class="accordion-button collapsed bg-dark ac" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <!-- <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. -->
        <ul class="dropdown-menu" >
            <li><a class="dropdown-item" href="/dmp/index.php">Personal</a></li>
            <li><a class="dropdown-item" href="/dmp/branch.php">Branch</a></li>
            <li><a class="dropdown-item" href="/dmp/client.php">Client</a></li>
            <li><a class="dropdown-item" href="/dmp/equipment.php">Equipment</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/dmp/ops.php">ops</a></li>
          </ul>
      
      </div>
    </div>
  </div>
</div>
  </section>
  <div id="accordian">
   <div class="list-group">
      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseTwo">
        <i class="fas fa-user-alt"></i>GYM</a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a  href="/dmp/branch.php">brach</a></div>
          </div>
          </div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_gym" class="text-light">VIEW GYMS</a></div>
        </div>

      <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapseThree">
          <i class="fas fa-user-graduate"></i>PAYMENT DEPARTMENT
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=add_payment" class="text-light">ADD PAYMENT AREA</a>
        </div>
        <div class="list-group-item" style="background-color: #303030;">
          <a href="home.php?info=manage_payment" class="text-light">VIEW PAYMENT AREAS</a>
        </div>
        
      </div>
         <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsefive">
        <i class="fas fa-book"></i>MEMBERS</a>
      </div>
      <div id="collapsefive" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_member" class="text-light">ADD MEMBER</a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_member" class="text-light">VIEW MEMBERS</a></div>
        </div>

         <div class="list-group-item bg-dark">
        <a class="collapsed nav-link text-light" data-toggle="collapse" href="#collapsesix">
        <i class="fas fa-users"></i>TRAINERS</a>
      </div>
      <div id="collapsesix" class="collapse" data-parent="#accordion">
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=add_trainer" class="text-light">ADD TRAINER</a></div>
          <div class="list-group-item" style="background-color: #303030;"><a href="home.php?info=manage_trainer" class="text-light">VIEW TRAINERS</a></div>
        </div>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <div class="btngroup">
  <button class="btn" ><a href="index.php" >Contact Us</a></button>
  <button class="btn" ><a href="branch.php" >About Us</a></button>
  <!-- <button class="btn" ><a href="client.php" ></a></button>
  <button class="btn" ><a href="equipment.php" >New Equipment</a></button> -->
  </div>
</div>
  
  </body>
</html>
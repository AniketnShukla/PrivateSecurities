<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/dmp/welcome.php">SecDev</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dmp/welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dmp/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dmp/signup.php">Signup</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Details
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="/dmp/read_personnel.php">Personal</a></li>
            <li><a class="dropdown-item" href="/dmp/read_branch.php">Branch</a></li>
            <li><a class="dropdown-item" href="/dmp/read_client.php">Client</a></li>
            <li><a class="dropdown-item" href="/dmp/read_equipment.php">Equipment</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            New Details
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dmp/index.php">Personal</a></li>
            <li><a class="dropdown-item" href="/dmp/branch.php">Branch</a></li>
            <li><a class="dropdown-item" href="/dmp/client.php">Client</a></li>
            <li><a class="dropdown-item" href="/dmp/equipment.php">Equipment</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/dmp/ops.php">ops</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Search 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dmp/speedtest.php"> Search Personal</a></li>
            <li><a class="dropdown-item" href="/dmp/assignequipment.php">Search Equipment</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Check Availability
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dmp/checkavailable.php"> Available Personal</a></li>
            <li><a class="dropdown-item" href="/dmp/checkequip.php">Available Equipment</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" >
            Logout
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dmp/logout.php">Confirm Logout</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


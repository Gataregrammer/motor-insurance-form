<?php
include_once("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>form 1</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/urisse logo png.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="img/urisse logo png.png"
          height="30"
          alt="Urisse logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="https://urisse.com/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://urisse.com/about-2/">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://urisse.com/services/">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://urisse.com/partners/">Partners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://urisse.com/contact-2/">Contact Us</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<div class="container-fluid">
  <div class="container">
    <br><br><br><br>

    <div class="row">      
      <div class="col">
      </div>
      <div class="col-md-6">
          <center>
        <h4>Payment fee is: <?php
        $fee = $_GET['pay'];

        echo $fee;
        ?>  RWF</h4>
        
        <h4>Insurance Compay is:    <?php
        $comp = $_GET['comp'];

        echo $comp;
        ?></h4>
        <?php
        $selcode = "SELECT * FROM insurance_company WHERE company_name = '$comp'";
        $selcode_res = mysqli_query($conn, $selcode);
        while($coderow = mysqli_fetch_assoc($selcode_res)){
           
            ?>
        
        <h4>Payment Code is:  <?php echo $coderow['company_code'];?></h4>
        <?php
        }
        ?>
        </center>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
  
</div>
<!-- Navbar -->
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>

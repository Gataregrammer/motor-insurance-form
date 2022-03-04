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
        <div class="col-md-12">
            <h2>Insurances</h2>
            <br><br>
            
            
              <table class="table">
             
              <thead>
                
                <tr>
                  
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Tin Number</th>
                  <th scope="col">Id Number</th>
                  <th scope="col">Plate Number</th>
                  <th scope="col">Chassis</th>
                  <th scope="col">Insurance Company</th>
                  <th scope="col">Insurance Type</th>
                  <th scope="col">Use Type</th>
                  <th scope="col">Genre</th>
                  <th scope="col">Car Type</th>
                  <th scope="col">Period</th>
                  <th scope="col">Anne</th>
                  <th scope="col">Carte Joune</th>
                  <th scope="col">Seat</th>
                  <th scope="col">Value</th>
                  <th scope="col">Assurance_date</th>
                </tr>
              </thead>
              <tbody>
              <?php
            $selInsurance = "SELECT * FROM insurances ORDER BY insurance_id  ASC";
            $selInsuranceRes = mysqli_query($conn, $selInsurance);
            while($row = mysqli_fetch_array($selInsuranceRes)){
            ?>
              
                <tr>
                  <th scope="row"><?php echo $row['insurance_id'];?></th>
                  <td><?php echo $row['first_name'];?></td>
                  <td><?php echo $row['last_name'];?></td>
                  <td><?php echo $row['phone_number'];?></td>
                  <td><?php echo $row['email_address'];?></td>
                  <td><?php echo $row['tin_number'];?></td>
                  <td><?php echo $row['id_number'];?></td>
                  <td><?php echo $row['plate_number'];?></td>
                  <td><?php echo $row['chassis'];?></td>
                  <td><?php echo $row['insurance_company'];?></td>
                  <td><?php echo $row['insurance_type'];?></td>
                  <td><?php echo $row['use_type'];?></td>
                  <td><?php echo $row['Genre'];?></td>
                  <td><?php echo $row['car_type'];?></td>
                  <td><?php echo $row['Period'];?></td>
                  <td><?php echo $row['anne'];?></td>
                  <td> <img src="img/<?php echo $row['carte_joune'];?>" height="100" alt=""> </td>
                  <td><?php echo $row['seat'];?></td>
                  <td><?php echo $row['Value'];?></td>
                  <td><?php echo $row['assurance_date'];?></td>
                </tr>
              </tbody>
              <?php
            }
            ?>
            </table>
            
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

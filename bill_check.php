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
          alt="Urisse Logo"
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
    <br><br>

    <?php
    
    $plate_num = $_GET['Plate_number'];
    $sel_info = "SELECT * FROM insurances WHERE plate_number = '$plate_num' ORDER BY insurance_id DESC LIMIT 1";
    $sel_info_res = mysqli_query($conn, $sel_info);

    while($info_rows = mysqli_fetch_assoc($sel_info_res))
    {
    ?>
    

    <div class="row">      
      <div class="col">
          <h4>Personal Information</h4>
          <hr>
          <?php echo 'FIRST NAME: ';echo $info_rows['first_name'];?><br>
          <?php echo 'SECOND NAME: ';echo $info_rows['last_name'];?><br>
          <?php echo 'PHONE NUMBER: ';echo $info_rows['phone_number'];?><br>
          <?php echo 'EMAIL ADDRESS: ';echo $info_rows['email_address'];?><br>
          <?php echo 'ID NUMBER: ';echo $info_rows['id_number'];?><br>
          <?php echo 'TIN NUMBER: ';echo $info_rows['tin_number'];?><br>          
      </div>
      <div class="col">
          <h4>Insurance information</h4>
          <hr>
          <?php echo 'INSURANCE COMPANY:'; echo $info_rows['insurance_company'];?><br>
          <?php echo 'INSURANCE TYPE: ';echo $info_rows['insurance_type'];?><br>
          <?php echo 'MOTOR USE TYPE: ';echo $info_rows['use_type'];?><br>
          <?php echo 'GENRE: ';echo $info_rows['Genre'];?><br>
          <?php echo 'MARQUE: ';echo $info_rows['car_type'];?><br>
          <?php echo 'INSURANCE PERIOD: ';echo $info_rows['Period'];?><br>
          <?php echo 'FABLICATION YEAR: ';echo $info_rows['anne'];?><br>
          <?php echo 'INSURANCE PLACES: ';echo $info_rows['seat'];?><br>
          <?php echo 'CAR VALUE: ';echo $info_rows['Value'];?><br>


      </div>
      <div class="col">
          <h4>Billing Info</h4>  
          <hr>
          <?php
          
          $ins_type = $info_rows['insurance_type'];
          $genre = $info_rows['Genre'];
          $period = $info_rows['Period'];
          $anne = $info_rows['anne'];
          $use_type = $info_rows['use_type'];
          $curyear = date("Y");
          $subst = $curyear - $anne;
          $sitnum = $info_rows['seat'];
          $carval = $info_rows['Value'];
          if($ins_type == 'Contre_tiers')
          {
          $selPay = "SELECT * FROM tarrif WHERE Genre = '$genre' AND use_type = '$use_type'";
          $selPay_res = mysqli_query($conn, $selPay);
          $selPay_resCount = mysqli_num_rows($selPay_res);
          if($selPay_resCount == 0){
            echo 'data not match';
          }
          else{
          while($rowpay = mysqli_fetch_assoc($selPay_res))
          {
            $netPrm = $rowpay['payment'];
            echo 'BASE PRIME: ';echo $netPrm;
            echo '<br>';
          }
          $docfees = 2500;
          $guafound = $netPrm*0.1;
          $drivesft = 7500 * $sitnum;
          $vat = ($netPrm + $docfees + $drivesft)*0.18;
          $total = $netPrm + $docfees + $guafound + $drivesft+$vat;

          

          if($subst >= 10){
            $netPrm = $netPrm * 150/100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $docfees + $drivesft)*0.18;
            $total = $netPrm + $docfees + $guafound + $drivesft+$vat;

            if($period == 12){
              $netPrm = $netPrm * 100 /100;
              echo 'NET PREMIUM: '; echo $netPrm;
              $docfees = 2500;
              $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
              
            }elseif($period == 6){
              echo '<br>';

              $netPrm = $netPrm * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
              
            }elseif($period == 3){

              $netPrm = $netPrm * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }elseif($period == 1){
              $netPrm = $netPrm * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }
          } 
          elseif($subst > 5 && $subst <10){
            $netPrm = $netPrm * 125 /100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $docfees + $drivesft)*0.18;
            $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
            
            if($period == 12){
              $netPrm = $netPrm * 100 /100;
              $docfees = 2500;
              $guafound = $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
              
            }elseif($period == 6){
              $netPrm = $netPrm * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }elseif($period == 3){
              $netPrm = $netPrm * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }elseif($period == 1){

              $netPrm = $netPrm * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
          }
          elseif($subst <= 5){
            $netPrm = $netPrm * 100 /100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $docfees + $drivesft)*0.18;
            $total = $netPrm + $docfees + $guafound + $drivesft+$vat;

            if($period == 12){
              $netPrm = $netPrm * 100 /100;
              $docfees = 2500;
              $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
              
            }elseif($period == 6){
              $netPrm = $netPrm * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }elseif($period == 3){
              $netPrm = $netPrm * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            }
            }elseif($period == 1){
              $netPrm = $netPrm * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $docfees + $drivesft)*0.18;
              $total = $netPrm + $docfees + $guafound + $drivesft+$vat;
              echo '<br>';
              echo 'DOCUMENT FEES: ';echo $docfees;
              echo '<br>';
              echo ' GUARANTY FOUND: ';echo $guafound;
              echo '<br>';
              echo ' DRIVER SAFETY: ';echo $drivesft;
              echo '<br>';
              echo ' VAT: ';echo $vat;
              echo '<br>';
              echo 'WORKING YEAR: ';echo $subst;
              echo '<br>';
              echo ' TOTAL: ';echo $total;
            } 
          }
        }
        }
        else{
          echo 'CAR VALUE: ';echo $carval;
          echo '<br>';
          $selPay = "SELECT * FROM tarrif WHERE Genre = '$genre' AND use_type = '$use_type'";
          $selPay_res = mysqli_query($conn, $selPay);
          $selPay_resCount = mysqli_num_rows($selPay_res);
          if($selPay_resCount == 0){
            echo 'data not match';
          }
          else{
          while($rowpay = mysqli_fetch_assoc($selPay_res))
          {
            $netPrm = $rowpay['payment'];
            $dmvi = $rowpay['dmvi'];
            echo 'BASE PRIME: ';echo $netPrm;
            echo '<br>';
          }
          if($subst >= 10){
            $carval = $carval;
            $dmvi = $dmvi;
            $netPrm = $netPrm * 150/100;
            $netPrmdmvi = $carval*$dmvi*150/100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
            $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;

            if($period == 12){
              $netPrm = $netPrm * 100/100;
              $netPrmdmvi = $netPrmdmvi * 100/100;
              $docfees = 2500;
              $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 6){
              $netPrm = $netPrm * 75/100;
              $netPrmdmvi = $netPrmdmvi * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 3){
              $netPrm = $netPrm * 50/100;
              $netPrmdmvi = $netPrmdmvi * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 1){
              $netPrm = $netPrm * 25/100;
              $netPrmdmvi = $netPrmdmvi * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
          }
          elseif($subst > 5 && $subst <10){
            $carval = $carval;
            $dmvi = $dmvi;
            $netPrm = $netPrm * 125/100;
            $netPrmdmvi = $carval*$dmvi*125/100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
            $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;

            if($period == 12){
              $netPrm = $netPrm * 100/100;
              $netPrmdmvi = $netPrmdmvi * 100/100;
              $docfees = 2500;
              $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 6){
              $netPrm = $netPrm * 75/100;
              $netPrmdmvi = $netPrmdmvi * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 3){
              $netPrm = $netPrm * 50/100;
              $netPrmdmvi = $netPrmdmvi * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 1){
              $netPrm = $netPrm * 25/100;
              $netPrmdmvi = $netPrmdmvi * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
          }

          elseif($subst <= 5){
            $carval = $carval;
            $dmvi = $dmvi;
            $netPrm = $netPrm * 100/100;
            $netPrmdmvi = $carval*$dmvi*100/100;
            $docfees = 2500;
            $guafound = $netPrm*0.1;
            $drivesft = 7500 * $sitnum;
            $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
            $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;

            if($period == 12){
              $netPrm = $netPrm * 100/100;
              $netPrmdmvi = $netPrmdmvi * 100/100;
              $docfees = 2500;
              $guafound = $guafound * 100/100;
              $drivesft = $drivesft * 100/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $guafound;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 6){
              $netPrm = $netPrm * 75/100;
              $netPrmdmvi = $netPrmdmvi * 75/100;
              $docfees = 2500;
              $guafound = $guafound * 75/100;
              $drivesft = $drivesft * 75/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 3){
              $netPrm = $netPrm * 50/100;
              $netPrmdmvi = $netPrmdmvi * 50/100;
              $docfees = 2500;
              $guafound = $guafound * 50/100;
              $drivesft = $drivesft * 50/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
            if($period == 1){
              $netPrm = $netPrm * 25/100;
              $netPrmdmvi = $netPrmdmvi * 25/100;
              $docfees = 2500;
              $guafound = $guafound * 25/100;
              $drivesft = $drivesft * 25/100;
              $vat = ($netPrm + $netPrmdmvi + $docfees + $drivesft)*0.18;
              $total = $netPrm + $netPrmdmvi + $docfees + $guafound + $drivesft + $vat;
              echo 'prime nette: '; echo $netPrm;echo '<br>';
              echo 'prime nette dmvi: '; echo $netPrmdmvi;echo '<br>';
              echo 'Accesories: '; echo $docfees;echo '<br>';
              echo 'Guaranty Found: '; echo $docfees;echo '<br>';
              echo 'SR: '; echo $drivesft;echo '<br>';
              echo 'Total: '; echo $total;echo '<br>';
            }
          }
        }
          

        }

          ?>
      </div>      
    </div>
    <div class="row">
      <center><a  type="button" name="pay" class="btn btn-primary" href="pay.php?comp=<?php echo $info_rows['insurance_company']; ?>&&pay=<?php echo $total;?>">Pay Here</a></center>

    </div>
    <?php
    }      
    ?>
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

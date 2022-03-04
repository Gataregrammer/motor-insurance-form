<?php
include_once("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Fill insurance details</title>
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
          alt="MDB Logo"
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
        <form class="row g-3" method="POST" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-outline">
              <input type="text" name="first_name" id="typeText" class="form-control" required/>
              <label class="form-label" for="typeText">First Name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="text" name="last_name" id="typeText" class="form-control" required/>
              <label class="form-label" for="typeText">Last Name</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="tel" name="phone_number" id="typePhone" class="form-control" required/>
              <label class="form-label" for="typePhone">Phone number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="email" name="email_address" id="typeEmail" class="form-control" />
              <label class="form-label" for="typeEmail">Email Address</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="number" name="tin_number" id="typeNumber" class="form-control" />
              <label class="form-label" for="typeNumber">TIN Number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="number" name="id_number" id="typeNumber" class="form-control" required/>
              <label class="form-label" for="typeNumber">ID Number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="text" name="plate_number" id="typeText" class="form-control" required/>
              <label class="form-label" for="typeNumber">Plate Number</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input type="number" name="chassis_number" id="typeNumber" class="form-control" required/>
              <label class="form-label" for="typeNumber">Chassis</label>
            </div>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="insurance_company" aria-label=".form-select-lg example" required>
                <option selected>Choose Insurance Company</option>
                <?php
                $sel_comp = "SELECT * FROM insurance_company";
                $sel_comp_res = mysqli_query($conn, $sel_comp);
                while($comp_row = mysqli_fetch_array($sel_comp_res))
                {
                ?>
                
                <option value="<?php echo $comp_row['company_name']; ?>"><?php echo $comp_row['company_name']; ?></option>
                <?php
                }
                ?>
              </select>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="insurance_type" aria-label=".form-select-lg example" required>
                <option selected>--Choose Insurance Type--</option>
                <option value="Contre_tiers">Contre-tiers/Assurance</option>
                <option value="Tous-Risques">Tous-Risques/ommonium</option>
              </select>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="use_type" aria-label=".form-select-lg example" required>
                <option selected>--Motor use Type--</option>
                <option value="taxi">Tax</option>
                <option value="Private">Private</option>
              </select>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="Genre" aria-label=".form-select-lg example" required>
            <option selected>--Choose Motor Genre--</option>
                <?php
                $sel_genre = "SELECT * FROM genre";
                $sel_genre_res = mysqli_query($conn, $sel_genre);
                while($genre_row = mysqli_fetch_array($sel_genre_res))
                {
                    
                ?>
               
                <option value="<?php echo $genre_row['genre_name']; ?>"><?php echo $genre_row['genre_name']; ?></option>
                <?php
                }
                ?>
              </select>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="marque" aria-label=".form-select-lg example" required>
                <option selected>--Car Type--</option>
                <?php
                $sel_marque = "SELECT * FROM car_type";
                $sel_marque_res = mysqli_query($conn, $sel_marque);
                while($marque_row = mysqli_fetch_array($sel_marque_res))
                {
                ?>
                <option value="<?php echo $marque_row['type_name']; ?>"><?php echo $marque_row['type_name']; ?></option>
                <?php
                }
                ?>
              </select>
          </div>
          <div class="col-md-6">
            <select class="form-select form-select-lg mb-3" name="period" aria-label=".form-select-lg example" required>
                <option selected>Period</option>
                <option value="1">1 Month</option>
                <option value="3">3 Months</option>
                <option value="6">6 Months</option>
                <option value="12">12 Months</option>
              </select>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
                <input type="number" id="typeNumber" name="anne" class="form-control" required />
                <label class="form-label" for="typeNumber">Anne de fablication</label>
              </div>
          </div>
          <div class="col-md-6">
            <label class="form-label" for="customFile">Upload Carte joune</label>
            <div class="form-outline">
                <input type="file" name="cover_photo" class="form-control" id="customFile" required/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
                <input type="number" id="typeNumber" name="seats" class="form-control" required />
                <label class="form-label" for="typeNumber">seats</label>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
                <input type="number" id="typeNumber" name="value" class="form-control" />
                <label class="form-label" for="typeNumber">Car Value</label>
              </div>
          </div>
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            
          </div>
        </form>
        
        <br><br>
      </div>
      <div class="col">
        <?php
        if(isset($_POST['submit']))
{

  include "db_config.php";
 $img_name = $_FILES['cover_photo']['name']; 
 $img_size = $_FILES['cover_photo']['size']; 
 $tmp_name = $_FILES['cover_photo']['tmp_name']; 
 $error = $_FILES['cover_photo']['error']; 
  

 if ($error ===0)
 {
     if($img_size > 1000000)
     {
      echo '<script typr="text/javascript"> document.location="index.php?
      Large= Photo File size is too large, max is 1 MB"</script>';
     }
     else
     {
         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);
         $allowed_exs = array("jpg","jpeg","png");

         if(in_array($img_ex_lc, $allowed_exs))
         {
             $new_img_name = uniqid("IMG", true).'.'.$img_ex_lc;
             $img_upload_path = 'img/'. $new_img_name;
             move_uploaded_file($tmp_name, $img_upload_path);
           //insert into database
           

            
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone_number = $_POST['phone_number'];
            $email_address = $_POST['email_address'];
            $tin_number = $_POST['tin_number'];
            $id_number = $_POST['id_number'];
            $plate_number = $_POST['plate_number'];
            $chassis_number = $_POST['chassis_number'];
            $insurance_company = $_POST['insurance_company'];
            $insurance_type = $_POST['insurance_type'];
            $use_type = $_POST['use_type'];
            $Genre = $_POST['Genre'];
            $marque = $_POST['marque'];
            $period = $_POST['period'];
            $anne = $_POST['anne'];
            $seats = $_POST['seats'];
            $value = $_POST['value'];

            $query = "INSERT INTO insurances (first_name, last_name, phone_number, email_address, tin_number,
             id_number, plate_number, chassis, insurance_company, insurance_type, use_type, Genre, car_type, Period, anne, carte_joune, seat, value)
              VALUES ('$first_name', '$last_name', '$phone_number', '$email_address', '$tin_number', '$id_number', '$plate_number', '$chassis_number', '$insurance_company',
               '$insurance_type', '$use_type', '$Genre', '$marque', '$period', '$anne','$new_img_name','$seats', $value)";

           $result = mysqli_query($conn, $query);

           if($result)
           {
            echo '<script typr="text/javascript"> document.location="bill_check.php?Plate_number='.$plate_number.'"</script>';    
           }
         }
         else
         {
          echo '<p class="alert-light text-danger text-center py-3">invalid file format,allowed format (jpg,jpeg,png)</p>';

         }
     }

 }

 else
 {
   $em = "unknown error aquired!";
   header("location: index.php?error=$em");  
 }


}
        ?>
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

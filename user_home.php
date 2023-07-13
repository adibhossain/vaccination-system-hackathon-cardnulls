<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['nid']) && isset($_SESSION['user_type'])) {
$user_id=$_SESSION['id'];
$user_name=$_SESSION['user_name'];
$nid=$_SESSION['nid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Vaccination Records</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
			width: 100%;
        }

        .card {
            margin-bottom: 20px;
            margin-left: -35%;
			margin-right: -35%;
        }

        .register-btn {
            margin-bottom: 2%;
			padding: 1.5%;
        }
    </style>
</head>


<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">&nbsp; Vaccine Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
			   <li class="nav-item">
              <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			  <li class="nav-item">
              <a href="logout.php" class="btn btn-danger align-content-end" style="position: absolute;
      top: 0;
      right: 0;
      margin-top: 10px;
      margin-right: 10px;">Logout</a>
            </li>
          </ul>
			
        </div>
      </nav>
    <div class="container">
        <h1 class="text-center mb-4">Medical Vaccination Records</h1>

        <div class="text-center">
            <a href="vaccine_registration.php" class="btn btn-primary register-btn">Register for New Vaccination</a>
        </div>

        <div class="row">
			
      <div class="col-md-6 offset-md-3">
		  <?php
            include_once 'db_conn.php';
            $result = mysqli_query($conn, "SELECT * FROM vaccination where status='0' AND user_id = '$user_id'");
            
            ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
                $subresult = mysqli_query($conn, "SELECT * FROM vaccine where vaccine_id= '$row[vaccine_id]'");
                $subrow = mysqli_fetch_array($subresult);
                $vaccine_id=$row["vaccine_id"];
                $vaccine_name=$subrow["vaccine_name"];
                $vaccination_date=$row["vaccination_date"];
              ?>

		        <div class="card">
              <div class="card-body d-flex justify-content-between">
                <h5 class="card-title">Vaccine: <?php echo $subrow["vaccine_name"]; ?></h5>
                <p class="card-text">Date: <?php echo $row["vaccination_date"]; ?></p>
                <a class="btn btn-primary" onclick="generateForm( '<?php echo $user_name?>' , '<?php echo $nid?>' ,'<?php echo $vaccine_id?>',  '<?php echo $vaccine_name?>' , '<?php echo $vaccination_date?>')">Form</a>
              </div>
            </div>

            <?php
                $i++;
              }
              ?>
            <?php
            } else {
              echo "No result found";
            }
            ?>   


<?php
            include_once 'db_conn.php';
            $result = mysqli_query($conn, "SELECT * FROM vaccination where status='1' AND user_id = '$user_id'");
            
            ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
            <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
                $subresult = mysqli_query($conn, "SELECT * FROM vaccine where vaccine_id = '$row[vaccine_id]' ");
                $subrow = mysqli_fetch_array($subresult);
                $vaccine_id=$row["vaccine_id"];
                $vaccine_name=$subrow["vaccine_name"];
                $vaccination_date=$row["vaccination_date"];
              ?>

		        <div class="card">
              <div class="card-body d-flex justify-content-between">
                <h5 class="card-title">Vaccine: <?php echo $subrow["vaccine_name"]; ?></h5>
                <p class="card-text">Date: <?php echo $row["vaccination_date"]; ?></p>
                <a class="btn btn-primary" onclick="generateCertificate('<?php echo $user_name?>' , '<?php echo $nid?>' ,'<?php echo $vaccine_id?>', '<?php echo $vaccine_name?>' , '<?php echo $vaccination_date?>' )">Certificate</a>
              </div>
            </div>

            <?php
                $i++;
              }
              ?>
            <?php
            } else {
              echo "No result found";
            }
            ?>  

        
      </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
	<!--QR-->
	<script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/dist/qrcode.min.js"
        integrity="sha384-qr4xU7zXUqNoG9CLOu0IdZf+pwRr6ZBNrmmSUjK5G6Vp0t3sp9fjL78mM3oDDrtA"
        crossorigin="anonymous"></script>
	
	<!--html2pdf-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	
	

   <script src="script.js"></script>
	
	
</body>

</html>


<?php 
}else{

header("Location: ../logout.php");

exit();

}

?>
<?php
$insert = false;
if(isset($_POST['name'])){
$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "vaccination_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);


// Collect post variables
$user_name	 = $_POST['name'];
$nid	= $_POST['nid'];
$dob	= $_POST['dob'];
$address = $_POST['address'];
$password	= $_POST['password'];
$user_type = 1;

$sql = "INSERT INTO user ( user_name, nid	dob, address,password, user_type) VALUES ('" . $user_name. "', '" . $nid . "', '" . $address . "', '" .$password. "', '" . $user_type . "')";
 echo $sql;

// Execute the query
if($conn->query($sql) == true){
   echo "Successfully inserted";

   //Flag for successful insertion
  $insert = true;
  echo '<script type="text/javascript">';
  echo ' alert("DONE!")';  //not showing an alert box.
  echo '</script>';

}
else{
  echo "ERROR: $sql <br> $conn->error";
}




$conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #508bfc;
    }
    .header {
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 10px 0;
      background-color: rgba(255, 255, 255, 0.8);
      z-index: 999;
    }
    .header h1 {
      color: #000000;
      font-size: 24px;
      font-weight: bold;
      margin: 0;
    }
    .form-label {
      font-weight: bold;
    }
    .register-container {
      background-color: #ffffff;
      border-radius: 1rem;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>SMART VACCINATION SYSTEM</h1>
  </div>
  
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="register-container">
            <h3 class="mb-5">Register</h3>

            <form class="row g-3 bg-white " action="register.php" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" class="form-control" placeholder="Enter your name" required />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" id="address" class="form-control" placeholder="Enter your address" required />
            </div>
            <div class="mb-3">
              <label for="nid" class="form-label">NID</label>
              <input type="text" id="nid" class="form-control" placeholder="Enter your NID" required />
            </div>
            <div class="mb-3">
              <label for="dob" class="form-label">Date of Birth</label>
              <input type="date" id="dob" class="form-control" required />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Enter your password" required />
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

         </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script src="script.js"></script>
</body>
</html>

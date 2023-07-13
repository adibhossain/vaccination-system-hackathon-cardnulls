<?php
$insert = false;
if(isset($_POST['name'])){
$sname= "localhost";

$unmae= "root";

$password1 = "";

$db_name = "vaccination_db";

$conn = mysqli_connect($sname, $unmae, $password1, $db_name);


// Collect post variables
try {
  // Connect to the database
  $pdo = new PDO("mysql:host=$sname;dbname=$db_name;charset=utf8", $unmae, $password1);

  // Retrieve form data
  $user_name = $_POST['name'];
  $address = $_POST['address'];
  $nid = $_POST['nid'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];
  $user_type = 1;

  // Insert user into the database
  $query = "INSERT INTO user (user_name, address, nid, dob, password, user_type) VALUES (:user_name, :address, :nid, :dob, :password,:user_type)";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':user_name', $user_name);
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':nid', $nid);
  $stmt->bindParam(':dob', $dob);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':user_type', $user_type);
  $stmt->execute();

  // Display success message or perform other actions
  echo 'User registered successfully!';
  header("Location: index.php");
} catch (PDOException $e) {
  // Handle database connection errors
  echo 'Error: ' . $e->getMessage();
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
      background-color: white;
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
      background-color: #0D6EFD;
      border-radius: 1rem;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">&nbsp; User Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
           
			  <li class="nav-item">
              <a href="index.php" class="btn btn-success align-content-end" style="position: absolute;
      top: 0;
      right: 0;
      margin-top: 10px;
      margin-right: 10px;">LogIn</a>
            </li>
          </ul>
			
        </div>
      </nav>
  
  <section class="vh-100" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="register-container">
            <h3 class="mb-5">Register</h3>

            <form class="row g-3 bg-white" action="register.php" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter your name" required name="name" />
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" class="form-control" placeholder="Enter your address" required name="address" />
              </div>
              <div class="mb-3">
                <label for="nid" class="form-label">NID (10 digit)</label>
                <input type="text" id="nid" class="form-control" placeholder="Enter your NID" required name="nid" minlength="10" maxlength="10" required/>
              </div>
              <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" class="form-control" required name="dob" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password"/>
              </div>

              <button class="btn btn-success btn-lg btn-block" type="submit">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script src="script.js"></script>
</body>
</html>

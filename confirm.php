<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['nid']) && isset($_SESSION['user_type'])) {

$sname= "localhost";

$unmae= "root";

$password1 = "";

$db_name = "vaccination_db";

$connection = mysqli_connect($sname, $unmae, $password1, $db_name);


if (isset($_GET['vaccinationId'])) {
    $vaccinationId = $_GET['vaccinationId'];
    $query = "UPDATE vaccination SET status = 1 WHERE vaccine_id = '$vaccinationId'";
  $result = mysqli_query($connection, $query);

  // Close the database connection
  mysqli_close($connection);

  header("Location: admin_home.php");
  exit();
} else {
  // Invalid request
  header("Location: admin_home.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Confirmation</h1>
        <div class="alert alert-success mt-4" role="alert">
            Vaccination confirmed successfully!
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
}else{

header("Location: ../logout.php");

exit();

}

?>
<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['nid']) && isset($_SESSION['user_type'])) {

$sname= "localhost";

$unmae= "root";

$password1 = "";

$db_name = "vaccination_db";

$connection = mysqli_connect($sname, $unmae, $password1, $db_name);

if (isset($_GET['vaccineId'])) {
  $vaccineId = $_GET['vaccineId'];
  
  // Perform the database query to retrieve vaccination record
  $query = "SELECT * FROM vaccination WHERE vaccine_id = '$vaccineId' AND status = 0";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) > 0) {
    // Record found, display the details in the modal
    $row = mysqli_fetch_assoc($result);
    $subquery = "SELECT * FROM user WHERE id = '$row[user_id]'";
    $subresult = mysqli_query($connection, $subquery);
    $subrow = mysqli_fetch_assoc($subresult);
    $userName = $subrow['user_name'];
    $nid = $subrow['nid'];
    $subquery2 = "SELECT * FROM vaccine WHERE vaccine_id = '$row[vaccine_id]'";
    $subresult2 = mysqli_query($connection, $subquery2);
    $subrow2 = mysqli_fetch_assoc($subresult2);

    $vaccineName = $subrow2['vaccine_name'];

    // Close the database connection
    mysqli_close($connection);
  } else {
    // No record found
    // Close the database connection
    mysqli_close($connection);
    header("Location: admin_home.php");
    exit();
  }
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
    <title>Vaccine Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Vaccine Details</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">User Name: <?php echo $userName; ?></h5>
                <p class="card-text">Vaccination ID: <?php echo $vaccineId; ?></p>
                <p class="card-text">Vaccine Name: <?php echo $vaccineName; ?></p>
                <a href="confirm.php?vaccinationId=<?php echo $vaccineId; ?>" class="btn btn-primary">Confirm</a>
            </div>
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
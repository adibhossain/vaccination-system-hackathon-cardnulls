<?php 

include "db_conn.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['nid']) && isset($_SESSION['user_type'])) {


    $host = 'localhost';
    $dbName = 'vaccination_db';
    $username = 'root';
    $password = '';

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

        // Retrieve form data
        $userId = $_SESSION['id'];
        if(isset($_POST['vaccineSelect']))
        $vaccine = $_POST['vaccineSelect'];
        else
        {
            $vaccine= NULL;
            $userId= NULL;
        }
        
        $date = date('y-m-d'); // Current date

        // Insert vaccine into the vaccine table
        $vaccineQuery = "INSERT INTO vaccine (vaccine_name) VALUES (:vaccine)";
        $vaccineStmt = $pdo->prepare($vaccineQuery);
        $vaccineStmt->bindParam(':vaccine', $vaccine);
        $vaccineStmt->execute();

        // Get the last inserted vaccine ID
        $vaccineId = $pdo->lastInsertId();
        $status = 0;
        // Insert vaccination record into the vaccination table
        $vaccinationQuery = "INSERT INTO vaccination (user_id, vaccine_id, vaccination_date, status) VALUES (:userId, :vaccineId, :date, :status)";
        $vaccinationStmt = $pdo->prepare($vaccinationQuery);
        $vaccinationStmt->bindParam(':userId', $userId);
        $vaccinationStmt->bindParam(':vaccineId', $vaccineId);
        $vaccinationStmt->bindParam(':date', $date);
        $vaccinationStmt->bindParam(':status', $status);
        $vaccinationStmt->execute();

        // Display success message or perform other actions
        echo 'Vaccine registered successfully!';

    } catch (PDOException $e) {
        // Handle database connection errors
       // echo 'Error: ' . $e->getMessage();
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Registration</title>
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
        <a class="navbar-brand" href="user_home.php">&nbsp; Home</a>
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

    <div class="container" style="margin-top: 50px;">
        <h2 class="text-center mb-4">Vaccine Registration</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">

            <form action="vaccine_registration.php" method="post">
    <div class="mb-3">
        <label for="vaccineSelect" class="form-label">Select Vaccine:</label>
        <select class="form-select" id="vaccineSelect" name="vaccineSelect"> <!-- Added name attribute -->
            <option selected disabled>Select Vaccine</option>
            <option value="COVID-19">COVID-19</option>
            <option value="Influenza">Influenza</option>
            <option value="Hepatitis B">Hepatitis B</option>
            <option value="Measles">Measles</option>
            <option value="Polio">Polio</option>
            <option value="Tetanus">Tetanus</option>
        </select>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>


<?php 
}else{

header("Location: ../logout.php");

exit();

}

?>
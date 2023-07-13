<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['nid']) && isset($_SESSION['user_type'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Comfirmation</title>
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
        <a class="navbar-brand" href="#">&nbsp; Admin</a>
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
        <h1 class="mb-4">Vaccination Confirmation</h1>
        <form>
            <div class="mb-3">
                <label for="userId" class="form-label">User ID:</label>
                <input type="text" class="form-control" id="userId" name="userId">
            </div>
            <button type="button" class="btn btn-primary" onclick="showConfirmationModal()">Search</button>
        </form>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
					
                    <div class="modal-body">
                        <p><strong>User Name:</strong> <span id="userName"></span></p>
						<p><strong>NID:</strong> <span id="nid"></span></p>
                        <p><strong>Vaccine Name:</strong> <span id="vaccineName"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
	
	
    <script src="script.js"></script>
   

	
</body>

</html>

<?php 
}else{

header("Location: ../logout.php");

exit();

}

?>
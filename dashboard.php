<?php
// Start the session
session_start();

$host = 'localhost';       // Database host
$dbname = 'healthdb';    // Database name
$username = 'root';         // Database username
$password = '';             // Database password

try {
    // Create a new PDO instance and set it as a global variable
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEUS Mobile Health Dashboard</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styles (as given in the previous HTML) */
        body {
            background-color: #2c3e50;
        }
        .sidebar {
            background-color: #1a252f;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }
        .sidebar h5 {
            color: #ffffff;
        }
        .nav-link {
            color: #b0bec5;
        }
        .nav-link.active {
            background-color: #2980b9;
            color: #ffffff;
        }
        .main-content {
            margin-left: 16.67%;
            height: 100vh;
            background: linear-gradient(to bottom, #2c3e50, #34495e);
            color: #ecf0f1;
            overflow-y: auto;
        }
        .card {
            background-color: #3b4d61;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn {
            color: #ffffff;
        }
        .btn-success { background-color: #27ae60; }
        .btn-secondary { background-color: #7f8c8d; }
        .btn-info { background-color: #1abc9c; }
        .btn-warning { background-color: #f39c12; }
        .btn-primary { background-color: #3498db; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="sidebar-sticky pt-3">
                <h5 class="text-center mb-4">DEUS Health Dashboard</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Telemedicine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Health Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Medication Reminders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Health Education</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ml-sm-auto col-lg-10 main-content px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Overview</h1>
            </div>

            <!-- Back Button -->
            <div class="mb-4">
                <a href="index.php" class="btn btn-primary">Back to Home</a>
            </div>

            <!-- Quick Access Cards -->
            <div class="row">
                
                <!-- Telemedicine Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Telemedicine</h5>
                            <p class="card-text">Connect with health professionals for consultations.</p>
                            <a href="#" class="btn btn-success">Start Consultation</a>
                        </div>
                    </div>
                </div>

                <!-- Health Records Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Health Records</h5>
                            <p class="card-text">Manage and view your medical history.</p>
                            <a href="#" class="btn btn-secondary">View Records</a>
                        </div>
                    </div>
                </div>

                <!-- Medication Reminders Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Medication Reminders</h5>
                            <p class="card-text">Set up reminders for your medications.</p>
                            <a href="#" class="btn btn-info">Set Reminder</a>
                        </div>
                    </div>
                </div>

                <!-- Health Education Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Health Education</h5>
                            <p class="card-text">Access resources to improve health knowledge.</p>
                            <a href="#" class="btn btn-warning">View Resources</a>
                        </div>
                    </div>
                </div>

                <!-- Health Facility Locator Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Health Facility Locator</h5>
                            <p class="card-text">Find health facilities near your location.</p>
                            <a href="#" class="btn btn-primary">Locate Facility</a>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Database credentials
$host = 'localhost';  // Database host, e.g., 'localhost' for local server
$dbname = 'healthdb';  // Database name
$username = 'root';  // Database username
$password = '';  // Database password

try {
    // Creating a new PDO instance for database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If there is an error in the connection, it will display the error message
    die("Database connection failed: " . $e->getMessage());
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL to insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    // Execute and check for successful insertion
    if ($stmt->execute()) {
        echo "User registered successfully!";
        // Redirect to login or another page if needed
        // header("Location: login.php");
    } else {
        echo "Error: Could not register user.";
    }
}
?>
<form action="register.php" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>


<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "cyrusrobles";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Make sure the form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Get username and password from the login form
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Check username and password from the students table
$sql = "SELECT * FROM students WHERE username = ? AND password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

// Login successful
if ($result->num_rows === 1) {

    $student = $result->fetch_assoc();

    $_SESSION['username'] = $student['username'];
    $_SESSION['StudentID'] = $student['StudentID'];
    $_SESSION['FirstName'] = $student['FirstName'];
    $_SESSION['LastName'] = $student['LastName'];

    header("Location: home.php");
    exit();

} else {

    echo "<script>
        alert('Invalid Username or Password!');
        window.location='index.php';
    </script>";

    exit();
}

$conn->close();
?>
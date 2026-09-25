<?php

session_start();

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: login.php?error=1");
    exit();
}

$query = "SELECT Id, FirstName, username, password
          FROM students
          WHERE username = ?
          LIMIT 1";

$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Query failed: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    // For passwords stored as normal text
    if ($password === $user['password']) {

        $_SESSION['students_id'] = $user['Id'];
        $_SESSION['FirstName'] = $user['FirstName'];
        $_SESSION['username'] = $user['username'];

        header("Location: welcome.php");
        exit();

    } else {

        header("Location: login.php?error=1");
        exit();
    }

} else {

    header("Location: login.php?error=1");
    exit();
}

$stmt->close();
$conn->close();

?>
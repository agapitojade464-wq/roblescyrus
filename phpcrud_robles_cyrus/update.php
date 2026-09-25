<?php

session_start();

if (!isset($_SESSION['students_id'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$id        = $_POST['Id'] ?? null;
$firstname = trim($_POST['FirstName'] ?? '');
$username  = trim($_POST['username'] ?? '');

if (!$id || $firstname === '' || $username === '') {
    header('Location: welcome.php');
    exit();
}

$query = "UPDATE students SET FirstName = ?, username = ? WHERE Id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $firstname, $username, $id);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location: welcome.php');
exit();

?>
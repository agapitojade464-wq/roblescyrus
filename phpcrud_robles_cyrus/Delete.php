<?php

session_start();

if (!isset($_SESSION['students_id'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $query = "DELETE FROM students WHERE Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header('Location: welcome.php');
exit();

?>
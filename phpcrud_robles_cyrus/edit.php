<?php

session_start();

if (!isset($_SESSION['students_id'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: welcome.php");
    exit();
}

$stmt = $conn->prepare("SELECT Id, FirstName, username FROM students WHERE Id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

if (!$student) {
    header("Location: welcome.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 100vh;">

    <div class="login-box">

        <h2>EDIT STUDENT</h2>

        <form action="update.php" method="POST">

            <input type="hidden" name="Id" value="<?php echo htmlspecialchars($student['Id']); ?>">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input
                    type="text"
                    name="FirstName"
                    class="form-control"
                    value="<?php echo htmlspecialchars($student['FirstName']); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="<?php echo htmlspecialchars($student['username']); ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                SAVE CHANGES
            </button>

            <a href="welcome.php" class="btn btn-secondary">
                BACK
            </a>

        </form>

    </div>

</div>

</body>
</html>
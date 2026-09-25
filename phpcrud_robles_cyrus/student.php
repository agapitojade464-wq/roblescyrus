<?php

session_start();

if (!isset($_SESSION['students_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 100vh;">

    <div class="login-box">

        <h2>ADD STUDENT</h2>

        <form action="insert.php" method="POST">

            <div class="mb-3">

                <label class="form-label">
                    First Name
                </label>

                <input
                    type="text"
                    name="FirstName"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                ADD STUDENT

            </button>

            <a
                href="index.php"
                class="btn btn-secondary">

                BACK

            </a>

        </form>

    </div>

</div>

</body>
</html>
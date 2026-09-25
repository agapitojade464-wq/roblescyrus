<?php

session_start();

// If already logged in, send them straight to the dashboard
if (isset($_SESSION['students_id'])) {
    header("Location: welcome.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="star star1"></div>
<div class="star star2"></div>
<div class="star star3"></div>
<div class="star star4"></div>
<div class="star star5"></div>
<div class="star star6"></div>
<div class="star star7"></div>
<div class="star star8"></div>
<div class="star star9"></div>
<div class="star star10"></div>
<div class="star star11"></div>
<div class="star star12"></div>
<div class="star star13"></div>
<div class="star star14"></div>
<div class="star star15"></div>
<div class="star star16"></div>
<div class="star star17"></div>
<div class="star star18"></div>
<div class="star star19"></div>
<div class="star star20"></div>
<div class="star star21"></div>
<div class="star star22"></div>
<div class="star star23"></div>
<div class="star star24"></div>
<div class="star star25"></div>
<div class="star star26"></div>
<div class="star star27"></div>

<div class="shooting-star"></div>
<div class="shooting-star2"></div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="login-box">

        <h2>ADD STUDENT</h2>

        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success">
                Student added successfully! You can now
                <a href="login.php">log in</a>.
            </div>
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php if ($_GET['error'] === 'taken') { ?>
                    That username is already taken. Please choose another.
                <?php } else { ?>
                    Please fill in all fields.
                <?php } ?>
            </div>
        <?php } ?>

        <form action="insert.php" method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="FirstName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                        <i class="bi bi-eye" id="password-icon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                ADD STUDENT
            </button>

        </form>

        <p style="color: white; text-align: center; margin-top: 15px;">
            Already registered?
            <a href="login.php">Log in here</a>
        </p>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.toggle-password').forEach(function (button) {
    button.addEventListener('click', function () {
        var input = document.getElementById(button.dataset.target);
        var icon = document.getElementById(button.dataset.target + '-icon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });
});
</script>

</body>

</html>
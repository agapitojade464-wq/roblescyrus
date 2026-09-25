<?php
session_start();

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

    <title>Student Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 100vh;">

    <div class="login-box">

        <h2>STUDENT LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <div class="alert alert-danger">
                Invalid username or password.
            </div>

        <?php } ?>

        <form action="check.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>

                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required>
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                        <i class="bi bi-eye" id="password-icon"></i>
                    </button>
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                LOGIN

            </button>

        </form>

        <p style="color: white; text-align: center; margin-top: 15px;">
            Don't have an account?
            <a href="index.php">Add one here</a>
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
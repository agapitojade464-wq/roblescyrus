<?php
include 'database.php';

$query = "SELECT id, firstname, lastname FROM students";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP CRUD</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
        <link rel="stylesheet" href="style.css">
</head>

<body>

<body>

<!-- STARS -->
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

<!-- SHOOTING STARS -->
<div class="shooting-star"></div>
<div class="shooting-star2"></div>
<div class="shooting-star3"></div>

<div class="container mt-5">

    <!-- ADD STUDENT BUTTON -->
    <button
        type="button"
        class="btn btn-primary mb-3"
        data-bs-toggle="modal"
        data-bs-target="#addModal">
        Add Student
    </button>


    <!-- STUDENT TABLE -->
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?php echo htmlspecialchars($row['firstname']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['lastname']); ?>
                </td>

                <td>

                    <!-- EDIT BUTTON -->
                    <button
                        type="button"
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal<?php echo $row['id']; ?>">
                        Edit
                    </button>

                    <!-- DELETE BUTTON -->
                    <a
                        href="delete.php?id=<?php echo $row['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this student?');">
                        Delete
                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>


<!-- ================================================== -->
<!-- ADD STUDENT MODAL -->
<!-- ================================================== -->

<div
    class="modal fade"
    id="addModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="insert.php" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Student
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="firstname"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="lastname"
                            class="form-control"
                            required>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">
                        Add Student
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ================================================== -->
<!-- EDIT MODALS -->
<!-- ================================================== -->

<?php

// Query again for the edit modals
$result2 = $conn->query($query);

while ($row = $result2->fetch_assoc()) {

?>

<div
    class="modal fade"
    id="editModal<?php echo $row['id']; ?>"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="update.php" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Student
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <!-- ID -->
                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo $row['id']; ?>">


                    <!-- FIRST NAME -->
                    <div class="mb-3">

                        <label class="form-label">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="firstname"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['firstname']); ?>"
                            required>

                    </div>


                    <!-- LAST NAME -->
                    <div class="mb-3">

                        <label class="form-label">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="lastname"
                            class="form-control"
                            value="<?php echo htmlspecialchars($row['lastname']); ?>"
                            required>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">
                        SAVE CHANGES
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php } ?>


<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
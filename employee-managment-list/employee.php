<?php
require('./connection.php')
?>

<?php
if (isset($_POST['searchData'])) {
    $search = $_POST['searchId'];

    $query = "SELECT * from management where id = '$search' ";
    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);

    // $name = $result['emp_name'];
    // echo $name;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Employee Management system</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>
<style>
    .btn {
        font-size: 19px;
        width: 100px;
    }

    h2 {
        font-family: 'Times New Roman', Times, serif;
        /* width: 100%; */
    }

    .bord {
        margin-top: 50px;
        border-radius: 10px;
    }
</style>

<body class="bg-info">
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-fluid p-5 text-center">
            <div class="row justify-content-center align-items-center g-2 m-auto">
                <div class="col-md-6 mx-auto p-3 bg-light bord">
                    <form action="#" method="post">
                        <div class="form-container p-3 m-auto">
                            <h2 class="p-2">Employee Data Entry Automation Software</h2>
                            <input class="form-control p-2 m-2" type="text" name="searchId" placeholder="Search ID"
                                value="<?php if (isset($_POST['searchData'])) {
                                            echo $result['id'];
                                        } ?>">

                            <input class="form-control p-2 m-2" type="text" name="name" placeholder="Employee Name"
                                value="<?php if (isset($_POST['searchData'])) {
                                            echo $result['emp_name'];
                                        } ?>">

                            <select class="form-control p-2 m-2" id="gender" name="gender">
                                <option value="Not selected">Select Gender</option>
                                <option value="Male"
                                    <?php if ($result['emp_gender'] == 'Male') {
                                        echo "selected";
                                    }
                                    ?>>Male</option>
                                <option value="Female"
                                    <?php if ($result['emp_gender'] == 'Female') {
                                        echo "selected";
                                    }
                                    ?>>Female</option>
                                <option value="Others"
                                    <?php if ($result['emp_gender'] == 'Others') {
                                        echo "selected";
                                    }
                                    ?>>Others</option>
                            </select>

                            <input class="form-control p-2 m-2" type="text" name="email" placeholder="Email Address"
                                value="<?php if (isset($_POST['searchData'])) {
                                            echo $result['emp_email'];
                                        } ?>">

                            <select class="form-control p-2 m-2" name="department">
                                <option value="Not selected">Select Department</option>
                                <option value="IT"
                                    <?php if ($result['emp_department'] == 'IT') {
                                        echo "selected";
                                    }
                                    ?>>IT</option>

                                <option value="HR"
                                    <?php if ($result['emp_department'] == 'HR') {
                                        echo "selected";
                                    }
                                    ?>>HR</option>

                                <option value="Accounts"
                                    <?php if ($result['emp_department'] == 'Accounts') {
                                        echo "selected";
                                    }
                                    ?>>Accounts</option>

                                <option value="Sales"
                                    <?php if ($result['emp_department'] == 'Sales') {
                                        echo "selected";
                                    }
                                    ?>>Sales</option>

                                <option value="Marketing"
                                    <?php if ($result['emp_department'] == 'Marketing') {
                                        echo "selected";
                                    }
                                    ?>>Marketing</option>

                                <option value="Business Development"
                                    <?php if ($result['emp_department'] == 'Business Development') {
                                        echo "selected";
                                    }
                                    ?>>Business Development</option>
                            </select>

                            <textarea class="form-control p-2 m-2" name="address" placeholder="Address"><?php if (isset($_POST['searchData'])) {echo $result['emp_address'];} ?></textarea> 

                            <button type="submit" class="btn btn-secondary p-2 m-2" name="searchData">Seacrh</button>
                            <button type="submit" class="btn btn-success p-2 m-2" name="save">Save</button>
                            <button type="submit" class="btn btn-warning text-light p-2 m-2" name="modify">Modify</button>
                            <button type="submit" class="btn btn-danger p-2 m-2" name="delete" onclick="return checkDelete()">Delete</button>
                            <button type="reset" class="btn btn-primary p-2 m-2" name="clear">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        function checkDelete() {
            return confirm('are you sure you want to delete this record');
        }
    </script>
</body>

</html>

<?php
if (isset($_POST['save'])) {

    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "INSERT INTO management (emp_name, emp_gender, emp_email, emp_department, emp_address)
    VALUES ('$name', '$gender', '$email', '$department', '$address')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script> alert('Data saved into database') </script>";
    } else {
        echo "<script> alert('failed to save data') </script>";
    }
}
?>


<?php

if (isset($_POST['delete'])) {

    $id = $_POST['searchId'];

    $query = "DELETE FROM management WHERE id = '$id' ";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script> alert('Record deleted') </script>";
    } else {
        echo "<script> alert('Failed to delete') </script>";
    }
}

?>

<?php
if (isset($_POST['modify'])) {

    $id       = $_POST['searchId'];
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "UPDATE management SET emp_name = '$name', emp_gender = '$gender', emp_email = '$email', emp_department = '$department', emp_address = '$address' WHERE id = '$id'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script> alert('Record Updated') </script>";
    } else {
        echo "<script> alert('failed to update') </script>";
    }
}
?>
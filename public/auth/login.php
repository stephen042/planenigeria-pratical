<?php
include "../config/dbcon.php";
include "../config/config.php";

$passwordErr = "";
$stateErr = "";

// Login form
if (isset($_POST['login'])) {

    $state = trim(htmlspecialchars($_POST["state"]));
    $password = trim(htmlspecialchars($_POST["password"]));

    if (!strlen($state) > 3 && empty($state)) {
        return $stateErr = "Please fill in your state and it should be at least 3 characters";

        if (!preg_match("/^[a-zA-Z-' ]*$/", $state)) {
            return $stateErr = "Only letters and white space allowed";
        }
    }

    if (!strlen($password) < 6) {
        return $passwordErr = "Password should be at least 6 characters";
    }

    if (empty($passwordErr) && empty($stateErr)) {
        
        $sql = "SELECT state FROM users WHERE state='$state' ";
        $data = $conn->query($sql);

        var_dump($data);
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - PLANE NIGERIA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo.jpg" rel="icon">
    <link href="../assets/img/logo.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="javascript:void(0);" class="logo d-flex align-items-center w-auto">

                                    <span class="d-none d-lg-block">PLANE Routine Data Management Information System</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <center>
                                            <img src="../assets/img/logo.jpg" class="img-fluid " width="150" height="150" alt="">
                                        </center>

                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your State analysis</h5>
                                        <p class="text-center small">Enter your state & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation"  method="POST">
                                        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">State</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="state" class="form-control" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your State.</div>
                                            </div>
                                            <?php if ($stateErr) { ?>
                                                <em class=" text-danger"><?= $stateErr ?></em>
                                            <?php  } ?>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                            <?php if ($passwordErr) { ?>
                                                <em class=" text-danger"><?= $passwordErr ?></em>
                                            <?php  } ?>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
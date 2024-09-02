<?php
// Disable error reporting for production environment
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();
include "connection.php";

// Initialize response variable
$json_response = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic input validation
    if (empty($email) || empty($password)) {
        $response = [
            'status' => false,
            'message' => 'Email and password are required.'
        ];
        $json_response = json_encode($response);
    } else {
        // Query to check if the user exists
        $sql = "SELECT * FROM partners WHERE email = ? AND account_type = 'SUPERADMIN'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists and the password is correct
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // If passwords are hashed, use password_verify()
            //if (password_verify($password, $user['password'])) {
            if ($password == $user['password']) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['accountType'] = $user['account_type'];

                // Redirect to the admin dashboard
                header("Location: admin-dashboard.php");
                exit();
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Invalid password.'
                ];
                $json_response = json_encode($response);
            }
        } else {
            $response = [
                'status' => false,
                'message' => 'No user found with that email.'
            ];
            $json_response = json_encode($response);
        }

        $stmt->close();
    }
}

$conn->close();

// Display the error message if available
$resp = !empty($json_response) ? json_decode($json_response, true) : null;
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
<title>Admin Login - HRMS Admin Template</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/css/line-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<style>
    .error-button {
        background-color: #ff4c4c;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: default;
    }
</style>
</head>
<body class="account-page">
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
            <div class="account-logo">
                <a href="admin-dashboard.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
            </div>
            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Admin Login</h3>
                    <p class="account-subtitle">Access to the admin dashboard</p>
                    <?php if($resp && !$resp['status']) : ?>
                        <p><button class="error-button"><?php echo $resp['message']; ?></button></p>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="input-block mb-4">
                            <label class="col-form-label">Email Address</label>
                            <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="input-block mb-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <a class="text-muted" href="forgot-password.html">Forgot password?</a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <input class="form-control" type="password" name="password" required>
                                <span class="fa-solid fa-eye-slash" id="toggle-password"></span>
                            </div>
                            <input type="hidden" name="accountType" value="SUPERADMIN">
                        </div>
                        <div class="input-block mb-4 text-center">
                            <button class="btn btn-primary account-btn" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
<?php

$directory = basename($_SERVER["REQUEST_URI"]);
include '../connection.php';
$readlink = "https://localhost/Projects/UniUSSD/article/read";
        // Perform action for exactly one directory after 'views'
$directory = basename($_SERVER["REQUEST_URI"]);

        // Query the database to find the partner based on the directory name
        $sql = "SELECT * FROM content WHERE slug = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $directory);
        $stmt->execute();
        $result = $stmt->get_result();

        // Initialize variables to store the partner details
        //$id = $name = $company_name = $email = $phone_number = $address = $website = $social_media_links = $bio = $status = $profile_image = $account_type = $created_at = $updated_at = "";

        // Check if a matching partner is found
        if ($result->num_rows > 0) {
            // Fetch the partner details
            $partner = $result->fetch_assoc();
            $title = htmlspecialchars($partner["title"]);
            $summary = htmlspecialchars($partner["summary"]);
            $company_name = htmlspecialchars($partner["partner"]);
            $slug = htmlspecialchars($partner["slug"]);
        } else {
            // Redirect to 404 Page
        }

        if (isset($_POST['checksub'])) {
            $phone_number = $_POST['phonenumber'];
            $slug = $_POST['slug'];
        
            // Prepare and execute the SQL query to check the status
            $stmt = $conn->prepare("SELECT status FROM subscribe WHERE msisdn = ?");
            $stmt->bind_param("s", $phone_number);
            $stmt->execute();
            $stmt->bind_result($status);
            $stmt->fetch();
            $stmt->close();
        
            // Check if the status is 1
 
if ($status == 1) {
    session_start();
    $_SESSION['msisdn'] = $phone_number; // Set the session variable

    echo $redirectUrl = $readlink . '/' . $slug;
    // Use header with a properly constructed URL
    header("Location: " . $redirectUrl);

} else {
    echo "<p style='color:red;'>Invalid phone number or account not active.</p>";
}

        }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tedu Blog</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- Site CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net/">
    <link href="https://fonts.bunny.net/css?family=b612-mono:400,400i,700,700i|cabin:400,700|lora:400,400i,700,700i" rel="stylesheet" />

    <!-- Icons fonts-->
    <link href="../assets/css/fontello.css" rel="stylesheet">
</head>
<body class="login-page">
    <header id="header" class="d-lg-block d-none">
        <div class="container">
            <div class="align-items-center w-100 text-center">
                <h1 class="logo navbar-brand"><a class='logo' href='#'>Tedu Blog</a></h1>
            </div>
        </div>
    </header>
    <main id="content">
        <!-- Login Form -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-center mb-4">Read <?php echo $company_name; ?> Content</h1>
                    <div class="form-contact p-4 border rounded">
                        <form action="" method="post">
                            <p><input type="tel" name="phonenumber" placeholder="Enter Your Phone Number" class="form-control" required></p>
                            <input type="hidden" name="slug" value="<?php echo $slug; ?>" class="form-control" required>
                            <p><input name="checksub" type="submit" value="Login" class="btn btn-primary w-100"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Summary -->
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="content-summary p-4 bg-light border rounded">
                    <p>
                        <?php echo $summary; ?>
                    </p>
                    <span>Login above to Read More</span>
                        <!-- More summary content can go here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="mt-5 text-center">
        <div class="container">
            <div class="divider"></div>
            <p>&copy; 2024 Tedu Blog. Designed by <a href="#">Webhook Solutions</a></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>


</html>

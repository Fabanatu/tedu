<?php
include "../connection.php";

// Get the current URL path from the address bar
$parsedUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathSegments = explode("/", trim($parsedUrl, "/"));
$readurl = "https://localhost/Projects/UniUSSD/reads";

// Check if 'views' is present and find its index
$viewsIndex = array_search("views", $pathSegments);

if ($viewsIndex !== false) {
    // Check if there are exactly one or two directories after 'views'
    $directoriesAfterViews = array_slice($pathSegments, $viewsIndex + 1);
    if (count($directoriesAfterViews) === 1) {
        // Perform action for exactly one directory after 'views'
        $directory = basename($_SERVER["REQUEST_URI"]);

        // Query the database to find the partner based on the directory name
        $sql = "SELECT * FROM partners WHERE partner_directory = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $directory);
        $stmt->execute();
        $result = $stmt->get_result();

        // Initialize variables to store the partner details
        $id = $name = $company_name = $email = $phone_number = $address = $website = $social_media_links = $bio = $status = $profile_image = $account_type = $created_at = $updated_at =
            "";

        // Check if a matching partner is found
        if ($result->num_rows > 0) {
            // Fetch the partner details
            $partner = $result->fetch_assoc();

            // Store the partner details in variables
            $id = htmlspecialchars($partner["id"]);
            $name = htmlspecialchars($partner["name"]);
            $company_name = htmlspecialchars($partner["company_name"]);
            $email = htmlspecialchars($partner["email"]);
            $phone_number = htmlspecialchars($partner["phone_number"]);
            $address = htmlspecialchars($partner["address"]);
            $website = htmlspecialchars($partner["website"]);
            $social_media_links = htmlspecialchars(
                $partner["social_media_links"]
            );
            $bio = $partner["bio"];
            $intro_video = $partner["intro_video"];
            $thumbnail_image = $partner["intro_video_thumbnail"];
            $logo = $partner["logo"];
            $status = htmlspecialchars($partner["status"]);
            $profile_image = htmlspecialchars($partner["profile_image"]);
            $account_type = htmlspecialchars($partner["account_type"]);
            $created_at = htmlspecialchars($partner["created_at"]);
            $updated_at = htmlspecialchars($partner["updated_at"]);
        } else {
            // No matching partner found
            $message =
                "No partner found for directory: " .
                htmlspecialchars($directory);
        }
    } elseif (count($directoriesAfterViews) === 2) {
        
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
            // Store the partner details in variables
            $partneremail = htmlspecialchars($partner["partneremail"]);
            $partner = htmlspecialchars($partner["partner"]);
            $reference_id = htmlspecialchars($partner["reference_id"]);
            $banner_image = htmlspecialchars($partner["banner_image"]);
            $content_video = htmlspecialchars($partner["content_video"]);
            $title = htmlspecialchars($partner["title"]);
            $content = $partner["content"];
            $author = htmlspecialchars($partner["author"]);
            $is_featured = $partner["is_featured"];
            $status = $partner["status"];
            $categories = $partner["categories"];
            $tags = $partner["tags"];
            $active_date = htmlspecialchars($partner["active_date"]);
            $uploaded_date = htmlspecialchars($partner["uploaded_date"]);
            $summary = htmlspecialchars($partner["summary"]);
            $created_at = htmlspecialchars($partner["created_at"]);
            $updated_at = htmlspecialchars($partner["updated_at"]);
        } else {
            // No matching partner found
            $message =
                "No partner found for directory: " .
                htmlspecialchars($directory);
        }
    
    } else {
        // Handle other cases or no directories
        echo "There are either no directories or more than two directories after 'views'.";
    }
} else {
    echo "'views' directory is not found in the URL.";
}
// Get the current directory name from the URL

// Close the connection
$stmt->close();

function estimateReadingTime($text) {
    $wordCount = str_word_count($text);
    $wordsPerMinute = 200; // Average reading speed
    $readingTimeMinutes = round($wordCount / $wordsPerMinute);

    return $readingTimeMinutes;
}

?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from merinda-html.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jul 2024 05:13:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tedu | <?php echo $company_name?></title>

        <!-- Meta Description -->
    <meta name="description" content="Explore Tedu for the latest insights on travel, education, and valuable information across various topics. Stay informed and inspired.">
    
    <!-- Meta Keywords (Optional) -->
    <meta name="keywords" content="Travel, Education, Information, Tedu, Learning, Adventure, Knowledge, Tips, Guides">
    
    <!-- Open Graph Tags (for Social Media Sharing) -->
    <meta property="og:title" content="Tedu - Travel, Education, Information, and More">
    <meta property="og:description" content="Explore Tedu for the latest insights on travel, education, and valuable information across various topics. Stay informed and inspired.">
    <meta property="og:image" content="https://example.com/path-to-your-image.jpg">
    <meta property="og:url" content="https://www.tedu.com">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Tags (for Twitter Sharing) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tedu - Travel, Education, Information, and More">
    <meta name="twitter:description" content="Explore Tedu for the latest insights on travel, education, and valuable information across various topics. Stay informed and inspired.">
    <meta name="twitter:image" content="https://example.com/path-to-your-image.jpg">
    <meta name="twitter:site" content="@tedu_blog">
    
    <!-- Canonical Tag -->
    <link rel="canonical" href="https://www.tedu.com">
    
    <!-- Viewport Tag (for Mobile SEO) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">
    
    <!-- Schema.org Structured Data (for Rich Snippets) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Tedu - Travel, Education, Information, and More",
      "description": "Explore Tedu for the latest insights on travel, education, and valuable information across various topics. Stay informed and inspired.",
      "url": "https://www.xxx.com"
    }
    </script>
    
    <!-- Language Tag (for International SEO) -->
    <meta http-equiv="Content-Language" content="en">
        <!--favincon-->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- Bootstrap, Font Awesome, Aminate, Owl Carausel, Normalize CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

        <!-- Site CSS -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/widgets.css" rel="stylesheet">
        <link href="assets/css/color-default.css" rel="stylesheet">
        <link href="assets/css/responsive.css" rel="stylesheet">

        <!-- Bunny fonts-->
        <link rel="preconnect" href="https://fonts.bunny.net/">
        <link href="https://fonts.bunny.net/css?family=b612-mono:400,400i,700,700i|cabin:400,700|lora:400,400i,700,700i" rel="stylesheet" />

        <!-- Icons fonts-->
        <link href="assets/css/fontello.css" rel="stylesheet">

        <!--Poprup-->
        <link href="assets/css/popup.css" rel="stylesheet">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.bpopup.min.js"></script>
        <!--<script>
        $( document ).ready(function() {
            $('#popup_this').bPopup();
        });
        </script>-->
<style>
    .image-wrapper {
    position: relative;
    display: inline-block;
}

.play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
}

    </style>
    </head>
    <body class="home">
        <div class="top-scroll-bar"></div>
        <!--Mobile navigation-->
        <div class="sticky-header fixed d-lg-none d-md-block">
            <div class="text-right">
                <div class="container mobile-menu-fixed pr-5">
                    <h1 class="logo-small navbar-brand"><a class='logo' href='index.html'>Tedu</a></h1>

                    <a class="author-avatar" href="#"><img src="assets/images/author-avata-1.jpg" alt=""></a>

                    <ul class="social-network heading navbar-nav d-lg-flex align-items-center">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                    </ul>

                    <a href="javascript:void(0)" class="menu-toggle-icon">
                        <span class="lines"></span>
                    </a>
                </div>
            </div>

            <div class="mobi-menu">
                <div class="mobi-menu__logo">
                    <h1 class="logo navbar-brand"><a class='logo' href='index.html'>Tedu</a></h1>
                </div>
                <!--<form action="#" method="get" class="menu-search-form d-lg-flex">
                    <input type="text" class="search_field" placeholder="Search..." value="" name="s">
                </form>
                <nav>
                    <ul>
                        <li class="current-menu-item"><a href='index.html'>Home</a></li>
                        <li class="menu-item-has-children"><a href='categories.html'>Categories</a>
                            <ul class="sub-menu">
                                <li><a href='categories.html'>Politics</a></li>
                                <li><a href='categories.html'>Health</a></li>
                                <li><a href='categories.html'>Design</a></li>
                            </ul>
                        </li>
                        <li><a href='typography.html'>Typography</a></li>
                        <li><a href='categories.html'>Politics</a></li>
                        <li><a href='categories.html'>Health</a></li>
                        <li><a href='contact.html'>Contact</a></li>
                    </ul>
                </nav>-->
            </div>
        </div>
        <!--Mobile navigation-->
        <div id="wrapper">
            <header id="header" class="d-lg-block d-none">
                <div class="container">
                    <div class="align-items-center w-100">
                        <h1 class="logo float-left navbar-brand"><a class='logo' href='index.html'>Tedu</a></h1>
                        <br><br>
                        <!--<div class="header-right float-right w-50">
                            <div class="d-inline-flex float-right text-right align-items-center">
                                <ul class="social-network heading navbar-nav d-lg-flex align-items-center">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                                </ul>
                                <ul class="top-menu heading navbar-nav w-100 d-lg-flex align-items-center">
                                    <li><a href="#" class="btn">Contact</a></li>
                                </ul>
                                <a class="author-avatar" href="#"><img src="assets/images/author-avata-1.jpg" alt=""></a>
                            </div>
                            <form action="#" method="get" class="search-form d-lg-flex float-right">
                                <a href="javascript:void(0)" class="searh-toggle">
                                    <i class="icon-search"></i>
                                </a>
                                <input type="text" class="search_field" placeholder="Search..." value="" name="s">
                            </form>
                        </div>-->
                    </div>
                    <!--<div class="clearfix"></div>-->
                </div>
                <!--<nav id="main-menu" class="stick d-lg-block d-none">
                    <div class="container">
                        <div class="menu-primary">
                            <ul>
                                <li class="current-menu-item"><a href='index.html'>Home</a></li>
                                <li class="menu-item-has-children"><a href='categories.html'>Categories</a>
                                    <ul class="sub-menu">
                                        <li><a href='categories.html'>Politics</a></li>
                                        <li><a href='categories.html'>Health</a></li>
                                        <li><a href='categories.html'>Design</a></li>
                                    </ul>
                                </li>
                                <li><a href='typography.html'>Typography</a></li>
                                <li><a href='categories.html'>Politics</a></li>
                                <li><a href='categories.html'>Health</a></li>
                                <li><a href='categories.html'>Design</a></li>
                                <li><a href='categories.html'>Startups</a></li>
                                <li><a href='categories.html'>Culture</a></li>
                                <li><a href='contact.html'>Contact</a></li>
                                <li class="menu-item-has-children"><a href="#">More...</a>
                                    <ul class="sub-menu">
                                        <li><a href='search.html'>Search</a></li>
                                        <li><a href='author.html'>Author</a></li>
                                        <li><a href='404.html'>404</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <span></span>
                        </div>
                    </div>
                </nav>-->
            </header>
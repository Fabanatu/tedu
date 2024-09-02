<?php
session_start();
include "../connection.php";

// Get the current URL path from the address bar
$requestUri = $_SERVER['REQUEST_URI'];
$readurl = "https://localhost/Projects/UniUSSD/article/read";
$authurl = "https://localhost/projects/uniUSSD/article/auth";

// Trim leading and trailing slashes and split the URL into segments
$segments = explode('/', trim($requestUri, '/'));

// Ensure we have at least 3 segments (article, view/read, and xxx)
if (count($segments) >= 3)
{
    // Check the second-to-last segment to determine if it's 'view' or 'read'
    $action = $segments[count($segments) - 2];
    $id = $segments[count($segments) - 1];

    if ($action === 'view'){
        //aggregator
        // Check if the input matches the pattern "text?number"
        if (preg_match('/^[\w-]+\?\d+$/', $id)){
            $page = explode('?', $id);
            $pageno = $page[1]; // this will recieve the page number for pagination as the url will bein this format added '?1'
            //https://localhost/Projects/UniUSSD/article/view/gafar-blog?2
            // you can out further pgination login here and return it in the loop of dive the content for every new page
            //just modify this part alone
            
            $directory = $page[0];
            //$directory = basename($_SERVER["REQUEST_URI"]);
            // Query the database to find the partner based on the directory name
            $sql = "SELECT * FROM partners WHERE partner_directory = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $directory);
            $stmt->execute();
            $result = $stmt->get_result();

            // Initialize variables to store the partner details
            $id = $name = $company_name = $email = $phone_number = $address = $website = $social_media_links = $bio = $status = $profile_image = $account_type = $created_at = $updated_at = "";

            // Check if a matching partner is found
            if ($result->num_rows > 0)
            {
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
                $social_media_links = htmlspecialchars($partner["social_media_links"]);
                $bio = $partner["bio"];
                $intro_video = $partner["intro_video"];
                $thumbnail_image = $partner["intro_video_thumbnail"];
                $logo = $partner["logo"];
                $status = htmlspecialchars($partner["status"]);
                $profile_image = htmlspecialchars($partner["profile_image"]);
                $account_type = htmlspecialchars($partner["account_type"]);
                $created_at = htmlspecialchars($partner["created_at"]);
                $updated_at = htmlspecialchars($partner["updated_at"]);
            }
            else
            {
                // No matching partner found
                $message = "No partner found for directory: " . htmlspecialchars($directory);
            }

            $pageno = $pageno ?: 1;
            $postsPerPage = 10;
            $offset = ($pageno - 1) * $postsPerPage;
            $psql = "SELECT * FROM content WHERE partneremail = ? LIMIT ? OFFSET ?";
            $pstmt = $conn->prepare($psql);
            $pstmt->bind_param("sii", $email, $postsPerPage, $offset);
            $pstmt->execute();
            $result = $pstmt->get_result();
            
        } else {
            // Perform action for exactly one directory after 'views'
            $directory = basename($_SERVER["REQUEST_URI"]);

            // Query the database to find the partner based on the directory name
            $sql = "SELECT * FROM partners WHERE partner_directory = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $directory);
            $stmt->execute();
            $result = $stmt->get_result();

            // Initialize variables to store the partner details
            $id = $name = $company_name = $email = $phone_number = $address = $website = $social_media_links = $bio = $status = $profile_image = $account_type = $created_at = $updated_at = "";

            // Check if a matching partner is found
            if ($result->num_rows > 0)
            {
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
                $social_media_links = htmlspecialchars($partner["social_media_links"]);
                $bio = $partner["bio"];
                $intro_video = $partner["intro_video"];
                $thumbnail_image = $partner["intro_video_thumbnail"];
                $logo = $partner["logo"];
                $status = htmlspecialchars($partner["status"]);
                $profile_image = htmlspecialchars($partner["profile_image"]);
                $account_type = htmlspecialchars($partner["account_type"]);
                $created_at = htmlspecialchars($partner["created_at"]);
                $updated_at = htmlspecialchars($partner["updated_at"]);
            }
            else
            {
                // No matching partner found
                $message = "No partner found for directory: " . htmlspecialchars($directory);
            }

            $sql = "SELECT * FROM content WHERE partneremail = ?"; //This is what is esponsible for the latest posts. adjust it to use the pagination below
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result(); 
    

        }
    }
    elseif ($action === 'read')
    {
        // title page
        

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
        if ($result->num_rows > 0)
        {
            // Fetch the partner details
            $partner = $result->fetch_assoc();
            // Store the partner details in variables
            $partneremail = htmlspecialchars($partner["partneremail"]);
            $company_name = htmlspecialchars($partner["partner"]);
            $reference_id = htmlspecialchars($partner["reference_id"]);
            $banner_image = htmlspecialchars($partner["banner_image"]);
            $content_video = htmlspecialchars($partner["content_video"]);
            $title = htmlspecialchars($partner["title"]);
            $content = $partner["content"];
            $author = htmlspecialchars($partner["author"]);
            $is_featured = $partner["is_featured"];
            $status = $partner["status"];
            $categories = $partner["categories"];
            $slug = $partner["slug"];
            $tags = $partner["tags"];
            $active_date = htmlspecialchars($partner["active_date"]);
            $uploaded_date = htmlspecialchars($partner["uploaded_date"]);
            $summary = htmlspecialchars($partner["summary"]);
            $created_at = htmlspecialchars($partner["created_at"]);
            $updated_at = htmlspecialchars($partner["updated_at"]);
        }
        else
        {
            // No matching partner found
            $message = "No partner found for directory: " . htmlspecialchars($directory);
        }

    }
    else
    {
        // Handle other cases or invalid URL structures
        
    }
}
else
{
    // Handle cases where there are not enough segments in the URL
    echo "The URL does not have enough segments.";
}

// Close the connection
//$stmt->close();
function estimateReadingTime($text)
{
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
    <meta property="og:image" content="../assets/images/path-to-your-image.jpg">
    <meta property="og:url" content="https://www.tedu.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags (for Twitter Sharing) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tedu - Travel, Education, Information, and More">
    <meta name="twitter:description" content="Explore Tedu for the latest insights on travel, education, and valuable information across various topics. Stay informed and inspired.">
    <meta name="twitter:image" content="../assets/images/path-to-your-image.jpg">
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
      "url": "https://www.tedu.com"
    }
    </script>

    <!-- Language Tag (for International SEO) -->
    <meta http-equiv="Content-Language" content="en">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap, Font Awesome, Animate, Owl Carousel, Normalize CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Site CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/widgets.css" rel="stylesheet">
    <link href="../assets/css/color-default.css" rel="stylesheet">
    <link href="../assets/css/responsive.css" rel="stylesheet">

    <!-- Bunny fonts-->
    <link rel="preconnect" href="https://fonts.bunny.net/">
    <link href="https://fonts.bunny.net/css?family=b612-mono:400,400i,700,700i|cabin:400,700|lora:400,400i,700,700i" rel="stylesheet" />

    <!-- Icons fonts-->
    <link href="../assets/css/fontello.css" rel="stylesheet">

    <!-- Popup-->
    <link href="../assets/css/popup.css" rel="stylesheet">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.bpopup.min.js"></script>
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

    <!-- Mobile navigation -->
    <div class="sticky-header fixed d-lg-none d-md-block">
        <div class="text-right">
            <div class="container mobile-menu-fixed pr-5">
                <h1 class="logo-small navbar-brand"><a class='logo' href='../index.html'>Tedu</a></h1>

                <a class="author-avatar" href="#"><img src="../assets/images/author-avata-1.jpg" alt=""></a>

                <!--<ul class="social-network heading navbar-nav d-lg-flex align-items-center">
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                </ul>-->

                <!--<a href="javascript:void(0)" class="menu-toggle-icon">
                    <span class="lines"></span>
                </a>-->
            </div>
        </div>

        <div class="mobi-menu">
            <!--<div class="mobi-menu__logo">
                <h1 class="logo navbar-brand"><a class='logo' href='#'>Tedu</a></h1>
            </div>-->
            <!--<form action="#" method="get" class="menu-search-form d-lg-flex">
                <input type="text" class="search_field" placeholder="Search..." value="" name="s">
            </form>
            <nav>
                <ul>
                    <li class="current-menu-item"><a href='../index.html'>Home</a></li>
                    <li class="menu-item-has-children"><a href='../categories.html'>Categories</a>
                        <ul class="sub-menu">
                            <li><a href='../categories.html'>Politics</a></li>
                            <li><a href='../categories.html'>Health</a></li>
                            <li><a href='../categories.html'>Design</a></li>
                        </ul>
                    </li>
                    <li><a href='../typography.html'>Typography</a></li>
                    <li><a href='../categories.html'>Politics</a></li>
                    <li><a href='../categories.html'>Health</a></li>
                    <li><a href='../contact.html'>Contact</a></li>
                </ul>
            </nav>-->
        </div>
    </div>
    <!-- Mobile navigation -->

    <div id="wrapper">
        <header id="header" class="d-lg-block d-none">
            <div class="container">
                <div class="align-items-center w-100">
                    <h1 class="logo float-left navbar-brand"><a class='logo' href='#'>Tedu</a></h1>
                    <br><br>
                    <!--<div class="header-right float-right w-100">
                        <nav>
                            <ul>
                                <li class="current-menu-item"><a href='../index.html'>Home</a></li>
                                <li class="menu-item-has-children"><a href='../categories.html'>Categories</a>
                                    <ul class="sub-menu">
                                        <li><a href='../categories.html'>Politics</a></li>
                                        <li><a href='../categories.html'>Health</a></li>
                                        <li><a href='../categories.html'>Design</a></li>
                                    </ul>
                                </li>
                                <li><a href='../typography.html'>Typography</a></li>
                                <li><a href='../categories.html'>Politics</a></li>
                                <li><a href='../categories.html'>Health</a></li>
                                <li><a href='../contact.html'>Contact</a></li>
                            </ul>
                        </nav>
                    </div>-->
                    <!--<ul class="social-network float-right d-lg-flex align-items-center">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                    </ul>-->
                </div>
            </div>
        </header>
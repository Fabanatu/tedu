<?php
ob_start();
include 'header.php';

// Start output buffering


// Start the session

function updateViewsCount($conn, $slug) {
    // Prepare the SQL query to update views_count
    $sql = "UPDATE content SET views_count = views_count + 1 WHERE slug = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter
        $stmt->bind_param("s", $slug);
        // Execute the query
        $stmt->execute();
        // Close the statement
        $stmt->close();
    } else {
        // Handle SQL preparation error
        echo "Error preparing SQL statement.";
    }
}

if (!isset($_SESSION['msisdn'])) {
    // User is not logged in

    // Get the full URL path
    $full_url_path = $_SERVER['REQUEST_URI'];
    // Split the URL path into segments
    $url_segments = array_filter(explode('/', $full_url_path));
    // Get the last two segments
    $last_two_segments = array_slice($url_segments, -2);
    // Combine the last two segments to form the redirect URL
    $redirect_url = implode('/', $last_two_segments);
    // URL encode the redirect URL
    $redirect_url_encoded = urlencode($redirect_url);

    // Redirect to the login page and pass the current URL as a parameter
    header("Location: $authurl/$slug");
    exit(); // Ensure no further script is executed
}
updateViewsCount($conn, $slug);
// SQL query to select top 10 most-read posts
$msql = "SELECT * FROM content WHERE partneremail = ? ORDER BY views_count DESC LIMIT 10";
$mstmt = $conn->prepare($msql);
$mstmt->bind_param("s", $partneremail);
$mstmt->execute();
$mresult = $mstmt->get_result();

ob_end_flush();

?>
<main id="content">
    <div class="content-widget">
        <div class="container">
            <div class="row">
<div class="col-md-8">


</br>

<div class="box box-author m_b_2rem">
    <figure>
        <!-- Display video and autoplay on load -->
        <video width="100%" height="auto" controls autoplay muted>
            <source src="../../<?php echo htmlspecialchars($content_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </figure>
</div>


                    <h4 class="spanborder">
                        <span><?php echo $title; ?></span>
                    </h4>
                    <article class="row">
    <div class="col-md-12">
        <div class="align-self-center">
        <?php echo $content; ?>
        </div>
    </div>
                    </article>

                    <!--<ul class="page-numbers heading">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="page-numbers" href="#">4</a></li>
                        <li><a class="page-numbers" href="#">5</a></li>
                        <li><a class="page-numbers" href="#">...</a></li>
                        <li><a class="page-numbers" href="#">98</a></li>
                        <li>
                            <a class="next page-numbers" href="#"><i class="icon-right-open-big"></i></a>
                        </li>
                    </ul>-->
                </div>
                <!-- col-md-8 -->
                <div class="col-md-4 pl-md-5 sticky-sidebar">
    <div class="sidebar-widget latest-tpl-4">
        <h5 class="spanborder widget-title">
            <span>Most Read Posts</span>
        </h5>
        <ol>
            <?php 
            $count = 1;
            while($row = $mresult->fetch_assoc()): ?>
                <li class="d-flex">
                    <div class="post-count"><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?></div>
                    <div class="post-content">
                        <a href="<?php echo $readurl; ?>/<?php echo htmlspecialchars($row['slug']); ?>">
                            <h5 class="entry-title mb-3">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h5>
                        </a>
                        <div class="entry-meta align-items-center">
                            <span><?php echo htmlspecialchars($row['summary']); ?></span></br>
                            <span><?php echo htmlspecialchars($row['author']); ?> in <?php echo htmlspecialchars($row['categories']); ?></span></br>
                            <span>Written at <?php echo date('M d, Y', strtotime($row['created_at'])); ?></span>
                            <span class="middotDivider"></span>
                            <span class="readingTime" title="<?php echo estimateReadingTime($row['content']); ?> min read">
                                <?php echo estimateReadingTime($row['content']); ?> min read
                            </span></br>
                            <span class="readingTime"><?php echo $row['views_count'] * 5; ?> views</span>
                        </div>
                        <a href="<?php echo $readurl; ?>/<?php echo htmlspecialchars($row['slug']); ?>" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </li>
            <?php 
            $count++;
            endwhile; ?>
        </ol>
    </div>
</div>

                <!-- col-md-4 -->
            </div>
        </div>
        <!--content-widget-->
    </div>
    <!--<div class="content-widget">
    <div class="container">
        <div class="sidebar-widget ads">
            <a href="#"><img src="assets/images/ads/ads-2.png" alt="ads"></a>
        </div>
        <div class="hr"></div>
    </div>
    </div> content-widget-->
</main>
<?php
  include 'footer.php';
  ?>

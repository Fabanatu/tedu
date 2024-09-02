<?php

include 'header.php';

//$partner = $result->fetch_assoc();

//var_dump($partner);

////most read sidebar

// SQL query to select top 10 most-read posts
$msql = "SELECT * FROM content WHERE partneremail = ? ORDER BY views_count DESC LIMIT 10";
$mstmt = $conn->prepare($msql);
$mstmt->bind_param("s", $email);
$mstmt->execute();
$mresult = $mstmt->get_result();

?>
<main id="content">
    <div class="content-widget">
        <div class="container">
            <div class="row">
<div class="col-md-8">
<div class="row">
    <!-- Left Column: Image -->
    <div class="col-md-4">
        <div class="align-self-center">
            <!-- Image -->
            <div class="image-container" style="text-align: center;">
    <img alt="author avatar" src="../../<?php echo htmlspecialchars($logo, ENT_QUOTES, 'UTF-8'); ?>" 
         class="avatar img-fluid rounded-circle" 
         style="width: 70%; max-width: 100px; height: auto; display: block; margin: 0 auto;" />
</div>


        </div>
    </div>

    <!-- Right Column: Biography -->
    <div class="col-md-8">
        <div class="align-self-center">
            <h3 class="entry-title mb-3"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h3>
            <div class="entry-excerpt">
                <p>
                <?php echo $bio; ?>
                </p>
                <div class="content-social-author">
                <a class="author-social" href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                </a>
                <a class="author-social" href="tel:<?php echo htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
            </div>
        </div>
    </div>
</div>

</br>

                    <div class="box box-author m_b_2rem">
                        <figure>
                            <?php if (!empty($thumbnail_image)) : ?>
                            <!-- Display video with thumbnail -->
                            <video width="100%" height="auto" controls poster="../<?php echo htmlspecialchars($thumbnail_image, ENT_QUOTES, 'UTF-8'); ?>">
                                <source src="../../<?php echo htmlspecialchars($intro_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                            <?php else : ?>
                            <!-- Display just the video if no thumbnail is available -->
                            <video width="100%" height="auto" controls>
                                <source src="../../<?php echo htmlspecialchars($intro_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                            <?php endif; ?>
                        </figure>
                    </div>

                    <h4 class="spanborder">
                        <span>Latest Posts</span>
                    </h4>
                    <article class="row">
                        <!-- First Column -->
                        <?php
// Assuming $result is the database query result set
while ($partner = $result->fetch_assoc()) {
    $partneremail = htmlspecialchars($partner["partneremail"]);
    $partnerName = htmlspecialchars($partner["partner"]);
    $reference_id = htmlspecialchars($partner["reference_id"]);
    $banner_image = htmlspecialchars($partner["banner_image"]);
    $content_video = htmlspecialchars($partner["content_video"]);
    $title = htmlspecialchars($partner["title"]);
    $content = htmlspecialchars($partner["content"]);
    $author = htmlspecialchars($partner["author"]);
    $is_featured = htmlspecialchars($partner["is_featured"]);
    $status = htmlspecialchars($partner["status"]);
    $slug = htmlspecialchars($partner["slug"]);
    $tags = htmlspecialchars($partner["tags"]);
    $active_date = htmlspecialchars($partner["active_date"]);
    $uploaded_date = htmlspecialchars($partner["uploaded_date"]);
    $summary = htmlspecialchars($partner["summary"]);
    $readminute = estimateReadingTime($content);
    $created_at = htmlspecialchars($partner["created_at"]);
    $updated_at = htmlspecialchars($partner["updated_at"]);
?>

<a href='<?php echo $readurl; ?>/<?php echo $slug; ?>'>
    <div class="col-md-6">
        <div class="align-self-center">
            <!-- Image with Play Icon -->
            <div class="image-wrapper" style="position: relative; width: 100%; padding-top: 100%; overflow: hidden;">
                <img src="../../<?php echo $banner_image; ?>" alt="<?php echo $title; ?>" 
                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" 
                     class="img-fluid mb-3" />
                <!-- Play Icon -->
                <span class="play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-play-circle" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM6.271 5.055a.5.5 0 0 1 .789-.407l4.5 3.145a.5.5 0 0 1 0 .824l-4.5 3.145A.5.5 0 0 1 6 11.145V5.5a.5.5 0 0 1 .271-.445z"/>
                    </svg>
                </span>
            </div>
            <div class="capsSubtle mb-2"><?php echo ($author) ? "Editors' Pick" : ""; ?></div>
            <h3 class="entry-title mb-3"><a href='<?php echo $readurl; ?>/<?php echo $slug; ?>'><?php echo $title; ?></a></h3>
            <div class="entry-excerpt">
                <p>
                    <?php echo $summary; ?>
                </p>
            </div>
            
            <div class="entry-meta align-items-center">
                <?php echo $author; ?> @ <?php echo $partnerName; ?><br />
                <span><?php echo date('F d, Y', strtotime($uploaded_date)); ?></span>
                <span class="middotDivider"></span>
                <span class="readingTime" title="3 min read"><?php echo $readminute; ?> min read</span>
            </div>
        </div>
    </div>
</a>


<?php
}
?>

                    </article>

                    <?php
// Assuming $pageno is set, and $conn, $email are initialized properly

$pageno = $pageno ?: 1; // Default to page 1 if no page number is provided
$postsPerPage = 10;
$offset = ($pageno - 1) * $postsPerPage;

// Query to get the total count of content entries for the partner
$totalPostsQuery = "SELECT COUNT(*) AS total FROM content WHERE partneremail = ?";
$totalStmt = $conn->prepare($totalPostsQuery);
$totalStmt->bind_param("s", $email);
$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalPosts = $totalResult->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalPosts / $postsPerPage);

// Define the number of pages to show around the current page
$pagesToShow = 5;

// Calculate start and end page numbers
$startPage = max(1, $pageno - floor($pagesToShow / 2));
$endPage = min($totalPages, $pageno + floor($pagesToShow / 2));

// Adjust start and end page numbers if they go out of bounds
if ($endPage - $startPage < $pagesToShow - 1) {
    $startPage = max(1, $endPage - $pagesToShow + 1);
}

?>

<ul class="page-numbers heading">
    <?php if ($pageno > 1): ?>
        <!-- Previous page link -->
        <li><a class="prev page-numbers" href="?<?php echo ($pageno - 1); ?>"><i class="icon-left-open-big"></i></a></li>
    <?php endif; ?>

    <?php if ($startPage > 1): ?>
        <!-- Link to the first page -->
        <li><a class="page-numbers" href="?1">1</a></li>
        <?php if ($startPage > 2): ?>
            <!-- Ellipsis before the current page range -->
            <li><a class="page-numbers" href="#">...</a></li>
        <?php endif; ?>
    <?php endif; ?>

    <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
        <?php if ($i == $pageno): ?>
            <!-- Current page -->
            <li><span aria-current="page" class="page-numbers current"><?php echo $i; ?></span></li>
        <?php else: ?>
            <!-- Other pages -->
            <li><a class="page-numbers" href="?<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($endPage < $totalPages): ?>
        <?php if ($endPage < $totalPages - 1): ?>
            <!-- Ellipsis after the current page range -->
            <li><a class="page-numbers" href="#">...</a></li>
        <?php endif; ?>
        <!-- Link to the last page -->
        <li><a class="page-numbers" href="?<?php echo $totalPages; ?>"><?php echo $totalPages; ?></a></li>
    <?php endif; ?>

    <?php if ($pageno < $totalPages): ?>
        <!-- Next page link -->
        <li><a class="next page-numbers" href="?<?php echo ($pageno + 1); ?>"><i class="icon-right-open-big"></i></a></li>
    <?php endif; ?>
</ul>

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

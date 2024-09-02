<?php
  include 'header.php';
  ?>
<main id="content">
    <div class="content-widget">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="post-author row-flex">
                            <div class="author-img">
                                <img alt="author avatar" src="../<?php echo htmlspecialchars($logo, ENT_QUOTES, 'UTF-8'); ?>" class="avatar" />
                            </div>
                            <div class="author-content">
                                <div class="top-author">
                                    <h5 class="heading-font">
                                        <a href="#" rel="author" title="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></a>
                                    </h5>
                                </div>
                                <p><?php echo $bio; ?></p>
                                <div class="content-social-author">
                                    <a class="author-social" href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a>
                                    <a class="author-social" href="tel:<?php echo htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($phone_number, ENT_QUOTES, 'UTF-8'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Section -->
                    <div class="box box-author m_b_2rem">
                        <figure>
                            <?php if (!empty($thumbnail_image)) : ?>
                            <!-- Display video with thumbnail -->
                            <video width="100%" height="auto" controls poster="../<?php echo htmlspecialchars($thumbnail_image, ENT_QUOTES, 'UTF-8'); ?>">
                                <source src="../<?php echo htmlspecialchars($intro_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                            <?php else : ?>
                            <!-- Display just the video if no thumbnail is available -->
                            <video width="100%" height="auto" controls>
                                <source src="../<?php echo htmlspecialchars($intro_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" />
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
                        <a href='read.php'>
                            <div class="col-md-6">
                            <div class="align-self-center">
                                <!-- Image with Play Icon -->
                                <div class="image-wrapper">
                                    <img src="assets/images/thumb/thumb-800x495.jpg" alt="Sample Image" class="img-fluid mb-3" />
                                    <!-- Play Icon -->
                                    <span class="play-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-play-circle" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM6.271 5.055a.5.5 0 0 1 .789-.407l4.5 3.145a.5.5 0 0 1 0 .824l-4.5 3.145A.5.5 0 0 1 6 11.145V5.5a.5.5 0 0 1 .271-.445z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="capsSubtle mb-2">Editors' Pick</div>
                                <h3 class="entry-title mb-3"><a href="single.html">Home Internet Is Becoming a Luxury for the Wealthy</a></h3>
                                <div class="entry-excerpt">
                                    <p>
                                        And black on meretriciously regardless well fearless irksomely as about hideous wistful bat less oh much and occasional useful rat darn jeepers far.
                                    </p>
                                </div>
                                <div class="entry-meta align-items-center">
                                    <a href="author.html">Dave Gershgorn</a> in <a href="archive.html">OneZero</a><br />
                                    <span>May 21</span>
                                    <span class="middotDivider"></span>
                                    <span class="readingTime" title="3 min read">5 min read</span>
                                    <span class="svgIcon svgIcon--star">
                                        <svg class="svgIcon-use" width="15" height="15">
                                            <path
                                                d="M7.438 2.324c.034-.099.09-.099.123 0l1.2 3.53a.29.29 0 0 0 .26.19h3.884c.11 0 .127.049.038.111L9.8 8.327a.271.271 0 0 0-.099.291l1.2 3.53c.034.1-.011.131-.098.069l-3.142-2.18a.303.303 0 0 0-.32 0l-3.145 2.182c-.087.06-.132.03-.099-.068l1.2-3.53a.271.271 0 0 0-.098-.292L2.056 6.146c-.087-.06-.071-.112.038-.112h3.884a.29.29 0 0 0 .26-.19l1.2-3.52z"
                                            ></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </a>
                    </article>

                    <ul class="page-numbers heading">
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
                    </ul>
                </div>
                <!-- col-md-8 -->
                <div class="col-md-4 pl-md-5 sticky-sidebar">
                    <div class="sidebar-widget latest-tpl-4">
                        <h5 class="spanborder widget-title">
                            <span>Recent Posts</span>
                        </h5>
                        <ol>
                            <li class="d-flex">
                                <div class="post-count">01</div>
                                <div class="post-content">
                                    <h5 class="entry-title mb-3"><a href="single.html">President and the emails. Who will guard the guards?</a></h5>
                                    <div class="entry-meta align-items-center">
                                        <a href="author.html">Alentica</a> in <a href="archive.html">Police</a><br />
                                        <span>May 14</span>
                                        <span class="middotDivider"></span>
                                        <span class="readingTime" title="3 min read">3 min read</span>
                                        <span class="svgIcon svgIcon--star">
                                            <svg class="svgIcon-use" width="15" height="15">
                                                <path
                                                    d="M7.438 2.324c.034-.099.09-.099.123 0l1.2 3.53a.29.29 0 0 0 .26.19h3.884c.11 0 .127.049.038.111L9.8 8.327a.271.271 0 0 0-.099.291l1.2 3.53c.034.1-.011.131-.098.069l-3.142-2.18a.303.303 0 0 0-.32 0l-3.145 2.182c-.087.06-.132.03-.099-.068l1.2-3.53a.271.271 0 0 0-.098-.292L2.056 6.146c-.087-.06-.071-.112.038-.112h3.884a.29.29 0 0 0 .26-.19l1.2-3.52z"
                                                ></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </li>
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

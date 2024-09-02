<?php
session_start();

// Check if the user is logged in and has an account type of SUPERADMIN or ADMIN
if (!isset($_SESSION['email']) || ($_SESSION['accountType'] !== 'SUPERADMIN' && $_SESSION['accountType'] !== 'ADMIN')) {
    header("Location: logout.php");
    exit();
}

include 'connection.php';

$userdata = $conn->query("SELECT * FROM partners WHERE email = '{$_SESSION['email']}'");
$data = $userdata->fetch_assoc();
$username = $data['password'];//. ' ' . $employee['last_name'];
$company_name = $data['company_name'];
$subcode = $data['subcode'];
$baseurl = 'https://cd.com/projects/uniUSSD/article/view';
$baseviewurl = 'https://cd.com/projects/uniUSSD/article/view';

function isAccountType($accounttype) {
    if ($accounttype == 'SUPERADMIN') {
        return true;
    } else if ($accounttype == 'ADMIN') {
        return false;
    } else {
        return 'nothing';
    }
}
function generateUniqueReferenceId() {
    // Generate a complex unique ID
    $randomBytes = bin2hex(random_bytes(16)); // 32-byte random string
    $timestamp = microtime(true); // High precision timestamp
    $combinedString = $randomBytes . $timestamp;
    $hashedString = hash('sha256', $combinedString); // SHA256 hash for added complexity
    
    // Limit the length of reference_id
    $referenceId = substr($hashedString, 0, 32); // Adjust length as needed

    return $referenceId;
}

function extractKeywords($htmlContent, $numberOfKeywords = 3) {
    // Remove HTML tags
    $textContent = strip_tags($htmlContent);
    
    // Convert text to lowercase and split it into words
    $words = str_word_count(strtolower($textContent), 1);

    // Filter out common words (optional, but improves keyword selection)
    $commonWords = ['the', 'is', 'in', 'and', 'of', 'a', 'to', 'it', 'with', 'as', 'for', 'on', 'that', 'this', 'or', 'you', 'an', 'are'];
    $filteredWords = array_diff($words, $commonWords);

    // Count word frequencies
    $wordFrequencies = array_count_values($filteredWords);

    // Sort words by frequency in descending order
    arsort($wordFrequencies);

    // Get the top n keywords
    $keywords = array_slice(array_keys($wordFrequencies), 0, $numberOfKeywords);

    // Return as a comma-separated string
    return implode(', ', $keywords);
}

function short($longUrl) {
    $bitlyAccessCode = '0b9e095477685b3620a5f6f701ed005ca29b546f';
    $bitlyApiUrl = 'https://api-ssl.bitly.com/v4/shorten';

    // Prepare the payload
    $data = [
        'long_url' => $longUrl
    ];

    // Setup cURL
    $ch = curl_init($bitlyApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $bitlyAccessCode,
        'Content-Type: application/json'
    ]);

    // Execute cURL request
    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return 'cURL Error: ' . $error_msg;
    }

    curl_close($ch);

    // Decode the response
    $response = json_decode($result, true);

    // Check for errors in the API response
    if (isset($response['link'])) {
        return $response['link'];
    } else {
        return 'Error: ' . $response['message'] ?? 'An unknown error occurred.';
    }
}

function generateUniquePartnerDirectory($company_name, $conn) {
    // Convert company name to lowercase and replace spaces with hyphens
    $words = explode(' ', strtolower($company_name));
    $directory = implode('-', array_slice($words, 0, 2));

    // Check if this directory already exists in the database
    $checkDirQuery = "SELECT COUNT(*) FROM partners WHERE partner_directory = ?";
    $stmt = $conn->prepare($checkDirQuery);

    $original_directory = $directory;
    $suffix = 1;
    $count = 0;

    do {
        $stmt->bind_param("s", $directory);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        
        if ($count > 0) {
            // Directory exists, modify it by adding a suffix
            if (count($words) > 2 && $suffix == 1) {
                $directory = implode('-', array_slice($words, 0, 3));
            } else {
                $directory = $original_directory . '-' . $suffix;
                $suffix++;
            }
        }
    } while ($count > 0);

    $stmt->close();
    return $directory;
}

function generatePassword() {
    $length = 8;
    $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789'; // Exclude I, O, 0
    $password = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charactersLength - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

function generateSlug($title, $conn) {
    // Convert title to slug
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));

    // Check if slug already exists in the database
    $sql = "SELECT COUNT(*) AS count FROM content WHERE slug = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    $count = $row['count'] ?? 0; // Fetch count from result

    // If slug exists, append unique identifier
    if ($count > 0) {
        $uniqueId = time(); // Current epoch time
        $slug .= '-' . $uniqueId;
    }

    return $slug;
}

if (isset($_POST['submit'])) {
    $response = ['status' => false, 'message' => ''];

    // Validate entries
    $required_fields = ['name', 'company_name', 'email', 'password', 'account_type', 'phone_number', 'address'];
    $error_message = "";
    $is_valid = true;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $is_valid = false;
            $error_message .= ucfirst(str_replace('_', ' ', $field)) . " is required.<br>";
        }
    }

    if ($is_valid) {
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $email = $_POST['email'];
        $rawp = generatePassword();
        $password = password_hash($rawp, PASSWORD_DEFAULT);
        $account_type = $_POST['account_type'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $social_media_links = $_POST['social_media_links'];
        $bio = $_POST['bio'];
        $status = 'Active';
        $subcode = $_POST['subcode'];
        $price = $_POST['price'];
        $validity = $_POST['validity'];

        // Check if the email already exists
        $checkEmailQuery = "SELECT name FROM partners WHERE email = ?";
        $stmt = $conn->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($existing_name);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            $response['message'] .= "The email $email has already been added under $existing_name. <a href='add-partner.php'>Add new one</a>";
            $is_valid = false; // Mark as invalid to prevent further processing
        } else {
            $stmt->close();

            // Generate partner_id and partner_directory
            $partner_id = uniqid('partner_');
            $partner_directory = generateUniquePartnerDirectory($company_name, $conn);

            // Path to FFmpeg
            $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg.exe";

            // Allowed file types
            $allowed_image_types = ['jpg', 'jpeg', 'png', 'gif'];
            $allowed_video_types = ['mp4', 'avi', 'mov', 'mkv'];

            // Handle profile image upload
            $profile_image = NULL;
            if (!empty($_FILES['profile_image']['name'])) {
                $target_dir = "uploads/";
                $unique_id = uniqid(); // Generate a unique ID
                $imageFileType = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
                $target_file = $target_dir . $unique_id . '.' . $imageFileType;

                if ($_FILES["profile_image"]["size"] <= 20971520) { // 20MB in bytes
                    if (in_array($imageFileType, $allowed_image_types)) {
                        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                            $response['message'] .= "Sorry, there was an error uploading your profile image.<br>";
                            $is_valid = false;
                        } else {
                            $profile_image = $target_file;
                        }
                    } else {
                        $response['message'] .= "Profile image format is not supported.<br>";
                        $is_valid = false;
                    }
                } else {
                    $response['message'] .= "Profile image exceeds the maximum size of 20MB.<br>";
                    $is_valid = false;
                }
            }

            // Handle intro video upload
            $intro_video = NULL;
            $thumbnail = NULL;
            if (!empty($_FILES['intro_video']['name'])) {
                $target_dir = "uploads/videos/";
                $unique_id = uniqid(); // Generate a unique ID
                $videoFileType = strtolower(pathinfo($_FILES['intro_video']['name'], PATHINFO_EXTENSION));
                $target_file = $target_dir . $unique_id . '.' . $videoFileType;

                if ($_FILES["intro_video"]["size"] <= 104857600) { // 100MB in bytes
                    if (in_array($videoFileType, $allowed_video_types)) {
                        if (!move_uploaded_file($_FILES["intro_video"]["tmp_name"], $target_file)) {
                            $response['message'] .= "Sorry, there was an error uploading your intro video.<br>";
                            $is_valid = false;
                        } else {
                            $intro_video = $target_file;

                            // Generate thumbnail using FFmpeg
                            $thumbnail = $target_dir . $unique_id . '_thumbnail.jpg';
                            $command = "$ffmpeg -i $target_file -ss 00:00:01.000 -vframes 1 $thumbnail";

                            exec($command, $output, $return_var);

                            if ($return_var != 0) {
                                $response['message'] .= "Failed to generate video thumbnail.<br>";
                                $thumbnail = NULL; // If thumbnail generation fails, do not store it
                            }
                        }
                    } else {
                        $response['message'] .= "Intro video format is not supported.<br>";
                        $is_valid = false;
                    }
                } else {
                    $response['message'] .= "Intro video exceeds the maximum size of 100MB.<br>";
                    $is_valid = false;
                }
            }

            // Handle logo upload
            $logo = NULL;
            if (!empty($_FILES['logo']['name'])) {
                $target_dir = "uploads/logos/";
                $unique_id = uniqid(); // Generate a unique ID
                $logoFileType = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
                $target_file = $target_dir . $unique_id . '.' . $logoFileType;

                if ($_FILES["logo"]["size"] <= 20971520) { // 20MB in bytes
                    if (in_array($logoFileType, $allowed_image_types)) {
                        if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                            $response['message'] .= "Sorry, there was an error uploading your logo.<br>";
                            $is_valid = false;
                        } else {
                            $logo = $target_file;
                        }
                    } else {
                        $response['message'] .= "Logo format is not supported.<br>";
                        $is_valid = false;
                    }
                } else {
                    $response['message'] .= "Logo exceeds the maximum size of 20MB.<br>";
                    $is_valid = false;
                }
            }

            if ($is_valid) {
                // Prepare the SQL statement with placeholders
                $sql = "INSERT INTO partners (name, company_name, email, password, rawp, account_type, phone_number, address, website, social_media_links, bio, profile_image, intro_video, logo, status, partner_id, partner_directory, intro_video_thumbnail, subcode, productname, price, validity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                // Prepare the statement
                $stmt = $conn->prepare($sql);

                // Bind the parameters to the placeholders
                $stmt->bind_param(
                    "ssssssssssssssssssssss",
                    $name,
                    $company_name,
                    $email,
                    $password,
                    $rawp,
                    $account_type,
                    $phone_number,
                    $address,
                    $website,
                    $social_media_links,
                    $bio,
                    $profile_image,
                    $intro_video,
                    $logo,
                    $status,
                    $partner_id,
                    $partner_directory,
                    $thumbnail,
                    $subcode,
                    $company_name,
                    $price,
                    $validity
                );

                // Execute the statement and handle success or error
                if ($stmt->execute()) {
                    //Send Email to Partner
                    $response['status'] = true;
                    $response['message'] .= "Partner: $name with the email $email has been added successfully. <br> Your Page: <a href='$baseviewurl/$partner_directory'>Click Here</a>";
                } else {
                    $response['message'] .= "Error: " . $stmt->error . "<br>";
                }

                // Close the statement and connection
                $stmt->close();
            }
        }
    } else {
        $response['message'] .= $error_message;
    }
}


if (isset($_POST['submitContent'])) {
    $response = ['status' => false, 'message' => ''];

    // Validate entries
    $required_fields = ['title', 'content', 'date', 'author', 'status', 'activeDate'];
    $error_message = '';
    $is_valid = true;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $is_valid = false;
            $error_message .= ucfirst(str_replace('_', ' ', $field)) . " is required.<br>";
        }
    }

    if ($is_valid) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $author = $_POST['author'];
        $keyword = extractKeywords($content);
        $isFeatured = $_POST['isFeatured'] ?? 0;
        $status = $_POST['status'];
        $categories = isset($_POST['categories']) ? implode(', ', $_POST['categories']) : '';
        $tags = extractKeywords($content);
        $summary = $_POST['summary'] ?? '';
        $active_date = $_POST['activeDate'];


        // Generate a unique reference ID
        $referenceId = generateUniqueReferenceId($conn);

        // Generate slug from title
        $slug = generateSlug($title, $conn);

        // Fetch partners directory based on session email
        $query = "SELECT partner_directory FROM partners WHERE email = '{$_SESSION['email']}'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $partners_directory = $row['partner_directory'];
        } else {
            $partners_directory = '';
        }
        $longUrl = "$baseurl/$partners_directory/$slug";
        $shortUrl = short($longUrl);
        $summary .= ' '.$shortUrl;

        // Handle file uploads
        $bannerImage = '';
        if (isset($_FILES['bannerImage']) && $_FILES['bannerImage']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['bannerImage']['tmp_name'];
            $fileName = $_FILES['bannerImage']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadFileDir = './uploaded_files/';
                $dest_path = $uploadFileDir . uniqid() . '.' . $fileExtension; // Ensure unique file name
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $bannerImage = $dest_path;
                } else {
                    $error_message .= 'Error moving the uploaded file.<br>';
                }
            } else {
                $error_message .= 'Invalid file type. Only JPG, JPEG, PNG, GIF are allowed.<br>';
            }
        }

        // Handle content video upload
        $contentVideo = '';
        if (isset($_FILES['content_video']) && $_FILES['content_video']['error'] == UPLOAD_ERR_OK) {
            $videoTmpPath = $_FILES['content_video']['tmp_name'];
            $videoName = $_FILES['content_video']['name'];
            $videoNameCmps = explode(".", $videoName);
            $videoExtension = strtolower(end($videoNameCmps));
            $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'wmv'];

            if (in_array($videoExtension, $allowedVideoExtensions)) {
                $videoUploadDir = './uploaded_videos/';
                $videoDestPath = $videoUploadDir . uniqid() . '.' . $videoExtension; // Ensure unique file name
                if (move_uploaded_file($videoTmpPath, $videoDestPath)) {
                    $contentVideo = $videoDestPath;
                } else {
                    $error_message .= 'Error moving the uploaded video.<br>';
                }
            } else {
                $error_message .= 'Invalid video file type. Only MP4, AVI, MOV, WMV are allowed.<br>';
            }
        }

        if (empty($error_message)) {
            // Save content to the database using mysqli
            $sql = "INSERT INTO content (partneremail, partner, reference_id, banner_image, content_video, title, content, date, author, keyword, slug, is_featured, status, categories, tags, active_date, uploaded_date, summary)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $currentDateTime = date('Y-m-d H:i:s'); // Current datetime for uploaded_date

                $stmt->bind_param(
                    "ssssssssssssssssss",
                    $_SESSION['email'],
                    $company_name,
                    $referenceId,
                    $bannerImage,
                    $contentVideo,
                    $title,
                    $content,
                    $date,
                    $author,
                    $keyword,
                    $slug,
                    $isFeatured,
                    $status,
                    $categories,
                    $tags,
                    $active_date,
                    $currentDateTime, // uploaded_date
                    $summary
                );

                if ($stmt->execute()) {
                    $response['status'] = true;
                    $response['message'] = 'Content added successfully.';
                } else {
                    $response['message'] = 'Failed to add content: ' . $stmt->error;
                }
                $stmt->close();
            } else {
                $response['message'] = 'Prepare failed: ' . $conn->error;
            }
        } else {
            $response['message'] = $error_message;
        }
    } else {
        $response['message'] = $error_message;
    }
}

    
if (isset($_POST['sendtenancy'])) {
        $response = ['status' => false, 'message' => ''];
    
        // Function to sanitize inputs
        function sanitizeInput($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }
    
        // Sanitize and get the form data
        $recipientEmail = isset($_POST['recipientEmail']) ? sanitizeInput($_POST['recipientEmail']) : '';
        $messageTitle = isset($_POST['messageTitle']) ? sanitizeInput($_POST['messageTitle']) : '';
        $senderName = isset($_POST['senderName']) ? sanitizeInput($_POST['senderName']) : '';
        $senderEmail = isset($_POST['senderEmail']) ? sanitizeInput($_POST['senderEmail']) : '';
        $ccEmail = isset($_POST['ccEmail']) ? sanitizeInput($_POST['ccEmail']) : '';
        $messageBody = isset($_POST['messageBody']) ? sanitizeInput($_POST['messageBody']) : '';
        $attachmentPath = '/documents/Tenant-Assessment-Application-Form.pdf'; // Make sure this path is correct
    
        // Prepare POST data for cURL
        $postData = [
            'senderName' => $senderName,
            'messageTitle' => $messageTitle,
            'messageBody' => $messageBody,
            'senderEmail' => $senderEmail,
            'ccEmail' => $ccEmail,
            'recipientEmail' => $recipientEmail,
            'attachment' => new CURLFile($attachmentPath)
        ];
    
        // Initialize cURL session
        $ch = curl_init();
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://flojonnie.com/SendMail/sendmail.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); // Use $postData directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Execute cURL request
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Decode response from sendmail.php
        $responseData = json_decode($response, true);
    
        // Set response for the current script
        $response = json_encode($responseData);
}

if (isset($_POST['updatepartner'])) {
    $response = ['status' => false, 'message' => ''];

    // Initialize variables with default values
    $name = $website = $social_media_links = $bio = $profile_image = '';
    $partner_id = $_POST['partner_id'];
    $is_valid = true;
    $error_message = "";

    // Validate required fields
    $required_fields = ['bio', 'name'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field]) && !isset($_FILES['profile_image']) && $field != 'profile_image') {
            $is_valid = false;
            $error_message .= ucfirst(str_replace('_', ' ', $field)) . " is required.<br>";
        }
    }

    if ($is_valid) {
        // Collect form data
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $website = isset($_POST['website']) ? $_POST['website'] : '';
        $social_media_links = isset($_POST['social_media_links']) ? $_POST['social_media_links'] : '';
        $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';

        // Handle profile image upload
        if (!empty($_FILES['profile_image']['name'])) {
            $target_dir = "uploads/";
            $unique_id = uniqid(); // Generate a unique ID
            $imageFileType = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
            $target_file = $target_dir . $unique_id . '.' . $imageFileType;

            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $profile_image = $target_file;
                } else {
                    $response['message'] = "Sorry, there was an error uploading your file.";
                    $is_valid = false;
                }
            } else {
                $response['message'] = "File is not an image.";
                $is_valid = false;
            }
        }

        if ($is_valid) {
            // Start building the SQL query dynamically
            $sql = "UPDATE partners SET ";
            $params = [];
            $param_types = '';

            // Add fields to the query and parameters array if they have been provided
            if (!empty($name)) {
                $sql .= "name = ?, ";
                $params[] = $name;
                $param_types .= 's';
            }
            if (!empty($website)) {
                $sql .= "website = ?, ";
                $params[] = $website;
                $param_types .= 's';
            }
            if (!empty($social_media_links)) {
                $sql .= "social_media_links = ?, ";
                $params[] = $social_media_links;
                $param_types .= 's';
            }
            if (!empty($bio)) {
                $sql .= "bio = ?, ";
                $params[] = $bio;
                $param_types .= 's';
            }
            if (!empty($profile_image)) {
                $sql .= "profile_image = ?, ";
                $params[] = $profile_image;
                $param_types .= 's';
            }

            // Remove trailing comma and space, then add the WHERE clause
            $sql = rtrim($sql, ", ");
            $sql .= " WHERE partner_id = ?";

            // Add the partner_id to the parameters array
            $params[] = $partner_id;
            $param_types .= 's';

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind the parameters to the placeholders
                $stmt->bind_param($param_types, ...$params);

                // Execute the statement and handle success or error
                if ($stmt->execute()) {
                    $response['status'] = true;
                    $response['message'] = "Partner has been updated successfully.";
                } else {
                    $response['message'] = "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                $response['message'] = "Error preparing the SQL statement: " . $conn->error;
            }

            // Close the connection
            $conn->close();
        } else {
            $response['message'] = $error_message;
        }
    } else {
        $response['message'] = $error_message;
    }
}
    
// ferch all employees
// Fetch data from the database
if (!isAccountType($_SESSION['accountType'])) {
        $fetchallpartners = $conn->query("SELECT * FROM partners WHERE email = '{$_SESSION['email']}'");
    } else {
        $fetchallpartners = $conn->query("SELECT * FROM partners");
}


if (!isAccountType($_SESSION['accountType'])) {
    $fetchallcontents = $conn->query("SELECT * FROM content WHERE partneremail = '{$_SESSION['email']}'");
} else {
    $fetchallcontents = $conn->query("SELECT * FROM content"); 
}

//Edit Partner
if (!isAccountType($_SESSION['accountType'])) {
    // SQL queries for ADMIN

    // Count all partners
    $queryAllPartners = "SELECT COUNT(*) AS total FROM partners WHERE email = '{$_SESSION['email']}'";
    $resultAllPartners = $conn->query($queryAllPartners);
    $rowAllPartners = $resultAllPartners->fetch_assoc();
    $totalPartners = $rowAllPartners['total'];

    // Count active partners where partneremail matches session email
    $queryActivePartners = "SELECT COUNT(*) AS total_active FROM partners WHERE email = '{$_SESSION['email']}' AND status = 'Active'";
    $resultActivePartners = $conn->query($queryActivePartners);
    $rowActivePartners = $resultActivePartners->fetch_assoc();
    $totalActivePartners = $rowActivePartners['total_active'];

    // Count inactive partners where partneremail matches session email
    $queryInactivePartners = "SELECT COUNT(*) AS total_inactive FROM partners WHERE email = '{$_SESSION['email']}' AND status = 'Inactive'";
    $resultInactivePartners = $conn->query($queryInactivePartners);
    $rowInactivePartners = $resultInactivePartners->fetch_assoc();
    $totalInactivePartners = $rowInactivePartners['total_inactive'];

    // Count all content where partneremail matches session email
    $queryAllContent = "SELECT COUNT(*) AS total_content FROM content WHERE partneremail = '{$_SESSION['email']}'";
    $resultAllContent = $conn->query($queryAllContent);
    $rowAllContent = $resultAllContent->fetch_assoc();
    $totalContent = $rowAllContent['total_content'];

    // Count draft content where partneremail matches session email
    $queryDraftContent = "SELECT COUNT(*) AS total_draft FROM content WHERE partneremail = '{$_SESSION['email']}' AND status = 'draft'";
    $resultDraftContent = $conn->query($queryDraftContent);
    $rowDraftContent = $resultDraftContent->fetch_assoc();
    $totalDraftContent = $rowDraftContent['total_draft'];

    // Count published content where partneremail matches session email
    $queryPublishedContent = "SELECT COUNT(*) AS total_published FROM content WHERE partneremail = '{$_SESSION['email']}' AND status = 'published'";
    $resultPublishedContent = $conn->query($queryPublishedContent);
    $rowPublishedContent = $resultPublishedContent->fetch_assoc();
    $totalPublishedContent = $rowPublishedContent['total_published'];

} else {
    // SQL queries for SUPERADMIN

    // Count all partners
    $queryAllPartners = "SELECT COUNT(*) AS total FROM partners";
    $resultAllPartners = $conn->query($queryAllPartners);
    $rowAllPartners = $resultAllPartners->fetch_assoc();
    $totalPartners = $rowAllPartners['total'];

    // Count active partners
    $queryActivePartners = "SELECT COUNT(*) AS total_active FROM partners WHERE status = 'Active'";
    $resultActivePartners = $conn->query($queryActivePartners);
    $rowActivePartners = $resultActivePartners->fetch_assoc();
    $totalActivePartners = $rowActivePartners['total_active'];

    // Count inactive partners
    $queryInactivePartners = "SELECT COUNT(*) AS total_inactive FROM partners WHERE status = 'Inactive'";
    $resultInactivePartners = $conn->query($queryInactivePartners);
    $rowInactivePartners = $resultInactivePartners->fetch_assoc();
    $totalInactivePartners = $rowInactivePartners['total_inactive'];

    // Count all content
    $queryAllContent = "SELECT COUNT(*) AS total_content FROM content";
    $resultAllContent = $conn->query($queryAllContent);
    $rowAllContent = $resultAllContent->fetch_assoc();
    $totalContent = $rowAllContent['total_content'];

    // Count draft content
    $queryDraftContent = "SELECT COUNT(*) AS total_draft FROM content WHERE status = 'draft'";
    $resultDraftContent = $conn->query($queryDraftContent);
    $rowDraftContent = $resultDraftContent->fetch_assoc();
    $totalDraftContent = $rowDraftContent['total_draft'];

    // Count published content
    $queryPublishedContent = "SELECT COUNT(*) AS total_published FROM content WHERE status = 'published'";
    $resultPublishedContent = $conn->query($queryPublishedContent);
    $rowPublishedContent = $resultPublishedContent->fetch_assoc();
    $totalPublishedContent = $rowPublishedContent['total_published'];
}

if (isset($_POST['sub_report'])) {
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $subcode = $_POST['subcode'];

    $response = ['status' => false, 'message' => ''];

    // Fetch active subscribers
    $activeSubscribersQuery = "SELECT * FROM subscribe WHERE status = 1";
    $activeSubscribersResult = $conn->query($activeSubscribersQuery);

    if ($activeSubscribersResult) {
        $activeSubscribers = $activeSubscribersResult->fetch_all(MYSQLI_ASSOC);
    } else {
        $response['message'] .= "Error fetching active subscribers: " . $conn->error . "<br>";
    }

    // Fetch new subscribers within the date range
    $newSubscribersQuery = "SELECT * FROM subscription WHERE created_at BETWEEN ? AND ?";
    $stmt = $conn->prepare($newSubscribersQuery);
    $stmt->bind_param("ss", $startdate, $enddate);
    $stmt->execute();
    $newSubscribersResult = $stmt->get_result();

    if ($newSubscribersResult) {
        $newSubscribers = $newSubscribersResult->fetch_all(MYSQLI_ASSOC);
    } else {
        $response['message'] .= "Error fetching new subscribers: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

?>



<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 17:12:24 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
<title>UniUSSD - Content Management Platform</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">
<link rel="stylesheet" href="assets/css/material.css">

<link rel="stylesheet" href="assets/plugins/morris/morris.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS (optional, for styling) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
<style>
.alert-custom {
            font-size: 15px; /* Increase font size */
        }
        .table-avatar {
            display: flex;
            align-items: center;
        }
        .table-avatar .avatar {
            margin-right: 10px;
        }
        .table-avatar a {
            color: #000;
            text-decoration: none;
        }
</style>
<script src="https://cdn.tiny.cloud/1/cfn6cq8p2nwahkjxc3hffepptoe8ef7tiiezdi0flkseq0an/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#body',
        menubar: false,
        plugins: 'lists link image table',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: 'https://www.tiny.cloud/css/codepen.min.css',
        setup: function (editor) {
          editor.on('change', function () {
            editor.save(); // Updates the underlying textarea with TinyMCE content
          });
        }
      });
    </script>


</head>
<body>

<div class="main-wrapper">
<div class="header">

<div class="header-left">
<a href="admin-dashboard.php" class="logo">
<img src="assets/img/logo.svg" alt="Logo">
</a>
<a href="admin-dashboard.php" class="logo collapse-logo">
<img src="assets/img/collapse-logo.svg" alt="Logo">
</a>
<a href="admin-dashboard.php" class="logo2">
<img src="assets/img/logo2.png" width="40" height="40" alt="Logo">
</a>
</div>

<a id="toggle_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<div class="page-title-box">
<h3>Webhook Solutions</h3>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

<ul class="nav user-menu">

<!--<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa-solid fa-magnifying-glass"></i>
</a>
<form action="https://smarthr.dreamstechnologies.com/html/template/search.html">
<input class="form-control" type="text" placeholder="Search here">
<button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>
</div>
</li>-->


<li class="nav-item dropdown flag-nav">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
<img src="assets/img/flags/us.png" alt="Flag" height="20"> <span>English</span>
</a>
<!--<div class="dropdown-menu dropdown-menu-right">
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/us.png" alt="Flag" height="16"> English
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/fr.png" alt="Flag" height="16"> French
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/es.png" alt="Flag" height="16"> Spanish
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/de.png" alt="Flag" height="16"> German
</a>
</div>-->
</li>


<!--<li class="nav-item dropdown">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<i class="fa-regular fa-bell"></i> <span class="badge rounded-pill">3</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-03.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-06.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-17.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="chat-block d-flex">
<span class="avatar flex-shrink-0">
<img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>-->


<!--<li class="nav-item dropdown">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<i class="fa-regular fa-comment"></i><span class="badge rounded-pill">8</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Messages</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">Richard Miles </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">John Doe</span>
<span class="message-time">6 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-03.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author"> Tarah Shropshire </span>
<span class="message-time">5 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author">Mike Litorus</span>
<span class="message-time">3 Mar</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img src="assets/img/profiles/avatar-08.jpg" alt="User Image">
</span>
</div>
<div class="list-body">
<span class="message-author"> Catherine Manseau </span>
<span class="message-time">27 Feb</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="chat.html">View all Messages</a>
</div>
</div>
</li>-->

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img src="assets/img/avatar/avatar-27.jpg" alt="User Image">
<span class="status online"></span></span>
<span>Admin</span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="settings.php">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</div>

<style>
        .hidden { display: none; }
    </style>
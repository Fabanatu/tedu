<?php

include 'header.php';

// Initialize variables with default values
$name = $website = $social_media_links = $bio = $profile_image = '';
$intro_video = $logo = $video_thumbnail = '';
$status = $subcode = $price = $validity = '';

$partner_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    if (isset($_POST['update_field'])) {
        $update_field = $_POST['update_field'];

        include 'connection.php';

        if (in_array($update_field, ['profile_image', 'intro_video', 'logo', 'video_thumbnail'])) {
            // Handle file upload
            if (isset($_FILES[$update_field]) && $_FILES[$update_field]['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $fileName = basename($_FILES[$update_field]['name']);
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES[$update_field]['tmp_name'], $filePath)) {
                    $new_value = $filePath;

                    $sql = "UPDATE partners SET $update_field = ? WHERE partner_id = ?";
                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("ss", $new_value, $partner_id);
                        if ($stmt->execute()) {
                            $response = [
                                'status' => true,
                                'message' => ucfirst(str_replace('_', ' ', $update_field)) . " updated successfully. Reload page to update another!"
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => "Error updating " . ucfirst(str_replace('_', ' ', $update_field)) . ": " . $stmt->error
                            ];
                        }
                        $stmt->close();
                    } else {
                        $response = [
                            'status' => false,
                            'message' => "Error preparing SQL statement: " . $conn->error
                        ];
                    }
                } else {
                    $response = [
                        'status' => false,
                        'message' => "Error uploading file."
                    ];
                }
            } else {
                $response = [
                    'status' => false,
                    'message' => "No file selected or error uploading file."
                ];
            }
        } else {
            // Handle text fields
            $new_value = $_POST[$update_field];

            $sql = "UPDATE partners SET $update_field = ? WHERE partner_id = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ss", $new_value, $partner_id);
                if ($stmt->execute()) {
                    $response = [
                        'status' => true,
                        'message' => ucfirst($update_field) . " updated successfully. Reload page to update another!"
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => "Error updating " . ucfirst($update_field) . ": " . $stmt->error
                    ];
                }
                $stmt->close();
            } else {
                $response = [
                    'status' => false,
                    'message' => "Error preparing SQL statement: " . $conn->error
                ];
            }
        }

        $conn->close();
    }
} else {
    // Fetch partner details
    if (!empty($partner_id)) {
        include 'connection.php';

        $sql = "SELECT * FROM partners WHERE partner_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $partner_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $partner = $result->fetch_assoc();
                $name = $partner['name'];
                $website = $partner['website'];
                $social_media_links = $partner['social_media_links'];
                $bio = $partner['bio'];
                $profile_image = $partner['profile_image'];
                $intro_video = $partner['intro_video'];
                $logo = $partner['logo'];
                $video_thumbnail = $partner['video_thumbnail'];
                $status = $partner['status'];
                $subcode = $partner['subcode']; // New field
                $price = $partner['price']; // New field
                $validity = $partner['validity']; // New field
            } else {
                echo '<script type="text/javascript">
                alert("Partner not found. You will be redirected to the logout page.");
                window.location.href = "logout.php";
              </script>';
            }

            $stmt->close();
        } else {
            die("Error preparing the SQL statement: " . $conn->error);
        }
    } else {
        header("Location: logout.php");
    }
}

?>

<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Update Partner</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Update Partner</li>
                    </ul>
                </div>
            </div>
        </div>

        <form id="partner-form" method="post" enctype="multipart/form-data">
            <!-- Dropdown to select field to update -->
            <?php
        if (isset($response)) {
            if ($response['status'] === true) {
                echo '<div class="alert alert-success alert-custom" role="alert">'
                    . $response['message'] .
                    '</div>';
            } else {
                echo '<div class="alert alert-danger alert-custom" role="alert">'
                    . $response['message'] .
                    '</div>';
            }
        }
        ?>
            <h4>Select Field to Update</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-block mb-3">
                        <label for="update_field" class="col-form-label">Field to Update</label>
                        <select id="update_field" name="update_field" class="form-control" onchange="showField()">
                            <option value="">--Select--</option>
                            <option value="name">Name</option>
                            <option value="website">Website</option>
                            <option value="social_media_links">Social Media Links</option>
                            <option value="bio">Bio</option>
                            <option value="profile_image">Profile Image</option>
                            <option value="intro_video">Intro Video</option>
                            <option value="logo">Logo</option>
                            <option value="video_thumbnail">Video Thumbnail</option>
                            <option value="status">Status</option>
                            <option value="subcode">Subscription Code</option> <!-- New field -->
                            <option value="price">Price</option> <!-- New field -->
                            <option value="validity">Validity</option> <!-- New field -->
                        </select>
                    </div>
                </div>
            </div>

            <!-- Dynamic field inputs -->
            <div id="input_field_container"></div>

            <!-- Hidden field for partner_id -->
            <input type="hidden" name="partner_id" value="<?php echo htmlspecialchars($partner_id); ?>">

            <div class="submit-section text-left">
                <button class="btn btn-primary submit-btn" type="submit" name="submit" style="border-radius: 0;">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function showField() {
    var field = document.getElementById('update_field').value;
    var container = document.getElementById('input_field_container');
    container.innerHTML = ''; // Clear previous input

    if (field) {
        // Populate input fields based on selection
        var inputField = '';

        switch (field) {
            case 'name':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Name <span class="text-danger">*</span></label>' +
                             '<input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'website':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Website</label>' +
                             '<input class="form-control" type="url" name="website" value="<?php echo htmlspecialchars($website); ?>">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'social_media_links':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Social Media Links</label>' +
                             '<input class="form-control" type="text" name="social_media_links" value="<?php echo htmlspecialchars($social_media_links); ?>" placeholder="Comma-separated URLs">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'bio':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Bio</label>' +
                             '<textarea class="form-control" name="bio"><?php echo htmlspecialchars($bio); ?></textarea>' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'profile_image':
            case 'intro_video':
            case 'logo':
            case 'video_thumbnail':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Upload File</label>' +
                             '<input type="file" name="' + field + '" class="form-control">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'status':
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Status</label>' +
                             '<input class="form-control" type="text" name="status" value="<?php echo htmlspecialchars($status); ?>">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'subcode': // New field
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Subscription Code</label>' +
                             '<input class="form-control" type="text" name="subcode" value="<?php echo htmlspecialchars($subcode); ?>">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'price': // New field
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Price</label>' +
                             '<input class="form-control" type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($price); ?>">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            case 'validity': // New field
                inputField = '<div class="row">' +
                             '<div class="col-md-12">' +
                             '<div class="input-block mb-3">' +
                             '<label class="col-form-label">Validity</label>' +
                             '<input class="form-control" type="text" name="validity" value="<?php echo htmlspecialchars($validity); ?>">' +
                             '</div>' +
                             '</div>' +
                             '</div>';
                break;
            default:
                inputField = '<div class="alert alert-warning">Unknown field selected.</div>';
                break;
        }

        container.innerHTML = inputField;
    }
}
</script>

<?php include 'footer.php'; ?>

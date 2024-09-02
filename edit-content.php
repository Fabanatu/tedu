<?php

include 'header.php';

// Initialize variables with default values
$reference_id = isset($_REQUEST['reference_id']) ? $_REQUEST['reference_id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    if (isset($_POST['update_field']) && isset($_POST['field_value'])) {
        $update_field = $_POST['update_field'];
        $new_value = $_POST['field_value'];

        include 'connection.php';

        // Update only the selected field
        $sql = "UPDATE content SET $update_field = ? WHERE reference_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $new_value, $reference_id);
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
        $conn->close();
    }
} else {
    // Fetch content details
    if (!empty($reference_id)) {
        include 'connection.php';

        $sql = "SELECT * FROM content WHERE reference_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $reference_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $content = $result->fetch_assoc();
                $banner_image = $content['banner_image'];
                $title = $content['title'];
                $content_text = $content['content'];
                $author = $content['author'];
                $keyword = $content['keyword'];
                $status = $content['status'];
                $is_featured = $content['is_featured'];
                $categories = $content['categories'];
                $summary = $content['summary'];
                $active_date = $content['active_date'];
            } else {
                echo '<script type="text/javascript">
                alert("Content not found. You will be redirected to the logout page.");
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
                    <h3 class="page-title">Update Content</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Update Content</li>
                    </ul>
                </div>
            </div>
        </div>

<form id="updateForm" method="post" action="" enctype="multipart/form-data">
    <!-- Blog Content -->
    <h4>Blog Content</h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="input-block mb-3">
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
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="input-block mb-3">
                <label class="col-form-label">Select Field to Update</label>
                <select id="update_field" class="form-control" onchange="showField()">
                    <option value="">Select Field</option>
                    <option value="title">Title</option>
                    <option value="banner_image">Banner Image</option>
                    <option value="content">Content</option>
                    <option value="author">Author</option>
                    <option value="keyword">Keyword</option>
                    <option value="status">Status</option>
                    <option value="is_featured">Is Featured</option>
                    <option value="categories">Categories</option>
                    <!--<option value="summary">Summary</option>-->
                    <option value="active_date">Active Date</option>
                </select>
            </div>
        </div>
    </div>

    <div id="input_field_container" class="row">
        <!-- Dynamic fields will be populated here -->
    </div>

    <div class="submit-section text-left">
        <button class="btn btn-primary submit-btn" type="submit" name="submitContent" style="border-radius: 0;">Submit</button>
    </div>
</form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/cfn6cq8p2nwahkjxc3hffepptoe8ef7tiiezdi0flkseq0an/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#contentEditor',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });

    function showField() {
        var field = document.getElementById('update_field').value;
        var container = document.getElementById('input_field_container');
        container.innerHTML = ''; // Clear previous input

        if (field) {
            var inputField = '';

            switch (field) {
                case 'title':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Title <span class="text-danger">*</span></label>' +
                                 '<input class="form-control" type="text" name="field_value" value="<?php echo htmlspecialchars($title); ?>" required>' +
                                 '<input type="hidden" name="update_field" value="title">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'banner_image':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Banner Image</label>' +
                                 '<input class="form-control" type="file" name="banner_image" accept="image/*">' +
                                 (<?php echo json_encode(!empty($banner_image)); ?> ? '<img src="<?php echo htmlspecialchars($banner_image); ?>" alt="Current Banner Image" style="width:100px;margin-top:10px;">' : '') +
                                 '<input type="hidden" name="update_field" value="banner_image">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'content':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Content <span class="text-danger">*</span></label>' +
                                 '<textarea class="form-control" id="contentEditor" name="field_value" rows="10" required><?php echo htmlspecialchars($content_text); ?></textarea>' +
                                 '<input type="hidden" name="update_field" value="content">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'author':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Author <span class="text-danger">*</span></label>' +
                                 '<input class="form-control" type="text" name="field_value" value="<?php echo htmlspecialchars($author); ?>" required>' +
                                 '<input type="hidden" name="update_field" value="author">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'keyword':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Keyword</label>' +
                                 '<input class="form-control" type="text" name="field_value" value="<?php echo htmlspecialchars($keyword); ?>">' +
                                 '<input type="hidden" name="update_field" value="keyword">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'status':
                    inputField = '<div class="col-md-6">' +
                                '<div class="input-block mb-3">' +
                                '<label class="col-form-label">Status <span class="text-danger">*</span></label>' +
                                '<select class="form-control" name="field_value">' +
                                '<option value="draft" ' + (<?php echo json_encode($status); ?> === 'draft' ? 'selected' : '') + '>Draft</option>' +
                                '<option value="published" ' + (<?php echo json_encode($status); ?> === 'published' ? 'selected' : '') + '>Published</option>' +
                                '</select>' +
                                '<input type="hidden" name="update_field" value="status">' +
                                '</div>' +
                                '</div>';
                    break;
                case 'is_featured':
                    inputField = '<div class="col-md-6">' +
                                '<div class="input-block mb-3">' +
                                '<label class="col-form-label">Is Featured</label>' +
                                '<select class="form-control" name="field_value">' +
                                '<option value="0" ' + (<?php echo json_encode($is_featured); ?> === '0' ? 'selected' : '') + '>No</option>' +
                                '<option value="1" ' + (<?php echo json_encode($is_featured); ?> === '1' ? 'selected' : '') + '>Yes</option>' +
                                '</select>' +
                                '<input type="hidden" name="update_field" value="is_featured">' +
                                '</div>' +
                                '</div>';
                    break;
                case 'categories':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Categories</label>' +
                                 '<input class="form-control" type="text" name="field_value" value="<?php echo htmlspecialchars($categories); ?>">' +
                                 '<input type="hidden" name="update_field" value="categories">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'summary':
                    inputField = '<div class="col-md-12">' +
                                 '<div class="input-block mb-3">' +
                                 '<label class="col-form-label">Summary <span class="text-danger">*</span></label>' +
                                 '<textarea class="form-control" name="field_value" rows="4" required><?php echo htmlspecialchars($summary); ?></textarea>' +
                                 '<input type="hidden" name="update_field" value="summary">' +
                                 '</div>' +
                                 '</div>';
                    break;
                case 'active_date':
                    inputField = '<div class="col-md-6">' +
                                '<div class="input-block mb-3">' +
                                '<label class="col-form-label">Active Date</label>' +
                                '<input class="form-control" type="date" name="field_value" value="<?php echo htmlspecialchars($active_date); ?>">' +
                                '<input type="hidden" name="update_field" value="active_date">' +
                                '</div>' +
                                '</div>';
                    break;
            }

            container.innerHTML = inputField;

            if (field === 'content') {
                tinymce.init({
                    selector: '#contentEditor',
                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    toolbar_mode: 'floating',
                    setup: function (editor) {
                        editor.on('change', function () {
                            tinymce.triggerSave();
                        });
                    }
                });
            }
        }
    }
</script>

<?php include 'footer.php'; ?>

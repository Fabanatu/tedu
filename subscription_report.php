<?php include 'header.php'; ?>


<?php include 'sidebar.php'; ?>

<div class="page-wrapper">

<div class="content container-fluid pb-0">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Welcome Admin!</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item active">Dashboard</li>
</ul>
</div>
</div>
</div>

<form method="POST" action="">
  <!-- Start Date Input -->
  <div class="form-group">
    <label for="startdate">Start Date:</label>
    <input type="date" name="startdate" class="form-control" id="startdate" required>
  </div>

  <!-- End Date Input -->
  <div class="form-group">
    <label for="enddate">End Date:</label>
    <input type="date" name="enddate" class="form-control" id="enddate" required>
  </div>

  <!-- Dropdown for Subscription Code -->
  <div class="form-group">
    <label for="subcode">Select Subscription Code:</label>
    <select name="subcode" class="form-control" id="subcode" required>
      <option value="">-- Select a Subscription Code --</option>
      <option value="SUB001">SUB001</option>
      <option value="subcode2">Subcode 2</option>
      <option value="subcode3">Subcode 3</option>
      <!-- Add more options as needed -->
    </select>
  </div>

  <!-- Submit Button -->
  <div class="submit-section text-left"> <!-- Aligns the submit button to the left -->
        <button class="btn btn-success" type="submit" name="sub_report" style="border-radius: 0;">Submit</button> <!-- Rectangular button with name attribute -->
    </div>
</form>
<!-- Display Active Subscribers -->
<?php if (isset($activeSubscribers) && count($activeSubscribers) > 0): ?>
        <h3 class="mt-4">Active Subscribers</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activeSubscribers as $subscriber): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($subscriber['id']); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['name']); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['status']); ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Display New Subscribers -->
    <?php if (isset($newSubscribers) && count($newSubscribers) > 0): ?>
        <h3 class="mt-4">New Subscribers</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newSubscribers as $subscriber): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($subscriber['id']); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['name']); ?></td>
                        <td><?php echo htmlspecialchars($subscriber['created_at']); ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="mb-0">
                    &copy; <span id="currentYear"></span> Webhook Solutions. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    // Set the current year
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

<style>
    .footer {
        padding: 10px 0;
        background-color: #f8f9fa;
        border-top: 1px solid #e9ecef;
    }
</style>


</div>
</div>

</div>

</div>

<div class="settings-icon">
<span data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"><i class="las la-cog"></i></span>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>

<script src="assets/js/jquery.slimscroll.min.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>

<script src="assets/plugins/morris/morris.min.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>
<script src="assets/plugins/raphael/raphael.min.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>
<script src="assets/js/chart.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>
<script src="assets/js/greedynav.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>

<script src="assets/js/layout.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>
<script src="assets/js/theme-settings.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>

<script src="assets/js/app.js" type="95b94b1b968dc8f3dc8fe101-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="95b94b1b968dc8f3dc8fe101-|49" defer></script></body>

</html>
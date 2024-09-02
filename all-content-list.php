<?php include 'header.php';?>

<?php include 'sidebar.php';?>

<div class="page-wrapper">

<div class="content container-fluid pb-0">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Contents</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
<li class="breadcrumb-item active">Content List</li>
</ul>
</div>
<div class="col-auto float-end ms-auto">
<a href="add-content.php" class="btn add-btn" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> Add Content</a>
<div class="view-icons">
</div>
</div>
</div>
</div>


<!--<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="input-block mb-3 form-focus">
<input type="text" class="form-control floating">
<label class="focus-label">Employee ID</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="input-block mb-3 form-focus">
<input type="text" class="form-control floating">
<label class="focus-label">Employee Name</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="input-block mb-3 form-focus select-focus">
<select class="select floating">
<option>Select Designation</option>
<option>Web Developer</option>
<option>Web Designer</option>
<option>Android Developer</option>
<option>Ios Developer</option>
</select>
<label class="focus-label">Designation</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="d-grid">
<a href="#" class="btn btn-success w-100"> Search </a>
</div>
</div>
</div>-->




<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="employeeTable" class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Partner</th>
                        <th>Views</th>
                        <th>Uploaded</th>
                        <th class="text-end no-sort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($fetchallcontents->num_rows > 0): ?>
                        <?php while($row = $fetchallcontents->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td><?php echo htmlspecialchars($row['partner']); ?></td>
                                <td><?php echo htmlspecialchars($row['views_count']); ?></td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit-content.php?reference_id=<?php echo $row['reference_id']; ?>"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                            <!--<a class="dropdown-item" href="delete-business.php?id=<?php echo $row['id']; ?>"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>-->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No businesses found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php ?>
        </div>
    </div>
</div>




</div>


<div id="add_employee" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Add Partner</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="row">
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">First Name <span class="text-danger">*</span></label>
<input class="form-control" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Last Name</label>
<input class="form-control" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Username <span class="text-danger">*</span></label>
<input class="form-control" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Email <span class="text-danger">*</span></label>
<input class="form-control" type="email">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Password</label>
<input class="form-control" type="password">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Confirm Password</label>
<input class="form-control" type="password">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Phone </label>
<input class="form-control" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Company</label>
<select class="select">
<option value>Global Technologies</option>
<option value="1">Delta Infotech</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="input-block mb-3">
<label class="col-form-label">Department <span class="text-danger">*</span></label>
<select class="select">
<option>Select Department</option>
<option>Web Development</option>
<option>IT Management</option>
<option>Marketing</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="input-block mb-3">
<label class="col-form-label">Designation <span class="text-danger">*</span></label>
<select class="select">
<option>Select Designation</option>
<option>Web Designer</option>
<option>Web Developer</option>
<option>Android Developer</option>
</select>
</div>
</div>
</div>
<div class="table-responsive m-t-15">
<table class="table table-striped custom-table">
<thead>
<tr>
<th>Module Permission</th>
<th class="text-center">Read</th>
<th class="text-center">Write</th>
<th class="text-center">Create</th>
<th class="text-center">Delete</th>
<th class="text-center">Import</th>
<th class="text-center">Export</th>
</tr>
</thead>
<tbody>
<tr>
<td>Holidays</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Leaves</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Clients</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Projects</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Tasks</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Chats</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Assets</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Timing Sheets</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
</tbody>
</table>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>


<div id="edit_employee" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Employee</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form>
<div class="row">
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">First Name <span class="text-danger">*</span></label>
<input class="form-control" value="John" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Last Name</label>
<input class="form-control" value="Doe" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Username <span class="text-danger">*</span></label>
<input class="form-control" value="johndoe" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Email <span class="text-danger">*</span></label>
<input class="form-control" value="johndoe@example.com" type="email">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Password</label>
<input class="form-control" value="johndoe" type="password">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Confirm Password</label>
<input class="form-control" value="johndoe" type="password">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
<input type="text" value="FT-0001" readonly class="form-control floating">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Phone </label>
<input class="form-control" value="9876543210" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="input-block mb-3">
<label class="col-form-label">Company</label>
<select class="select">
<option>Global Technologies</option>
<option>Delta Infotech</option>
<option selected>International Software Inc</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="input-block mb-3">
<label class="col-form-label">Department <span class="text-danger">*</span></label>
<select class="select">
<option>Select Department</option>
<option>Web Development</option>
<option>IT Management</option>
<option>Marketing</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="input-block mb-3">
<label class="col-form-label">Designation <span class="text-danger">*</span></label>
<select class="select">
<option>Select Designation</option>
<option>Web Designer</option>
<option>Web Developer</option>
<option>Android Developer</option>
</select>
</div>
</div>
</div>
<div class="table-responsive m-t-15">
<table class="table table-striped custom-table">
<thead>
<tr>
<th>Module Permission</th>
<th class="text-center">Read</th>
<th class="text-center">Write</th>
<th class="text-center">Create</th>
<th class="text-center">Delete</th>
<th class="text-center">Import</th>
<th class="text-center">Export</th>
</tr>
</thead>
<tbody>
<tr>
<td>Holidays</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Leaves</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Clients</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Projects</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Tasks</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Chats</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Assets</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
<tr>
<td>Timing Sheets</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
<td class="text-center">
<label class="custom_check">
<input type="checkbox" name="rememberme" class="rememberme">
<span class="checkmark"></span>
</label>
</td>
</tr>
</tbody>
</table>
</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>


<div class="modal custom-modal fade" id="delete_employee" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<div class="form-header">
<h3>Delete Employee</h3>
<p>Are you sure want to delete?</p>
</div>
<div class="modal-btn delete-action">
<div class="row">
<div class="col-6">
<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
</div>
<div class="col-6">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

<div class="settings-icon">
<span data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"><i class="las la-cog"></i></span>
</div>
<script>
    $(document).ready(function() {
        // Destroy any existing DataTable instance to avoid reinitialization errors
        if ($.fn.DataTable.isDataTable('#employeeTable')) {
            $('#employeeTable').DataTable().destroy();
        }

        // Initialize DataTable
        $('#employeeTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": 'no-sort'
            }],
            "searching": true,  // Ensure search functionality is enabled
            "paging": true,     // Enable paging if desired
            "info": true        // Show table info if desired
        });
    });
</script>

</body>

<script src="assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/select2.min.js" type="text/javascript"></script>
<script src="assets/js/moment.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/js/layout.js" type="text/javascript"></script>
<script src="assets/js/theme-settings.js" type="text/javascript"></script>
<script src="assets/js/greedynav.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2258e4cc8c6456a552d797d6-|49" defer></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#employeeTable').DataTable({
            "order": [[1, 'asc']], // Default sorting by Employee ID
            "columnDefs": [
                { "orderable": false, "targets": 'no-sort' } // Disable sorting for the Action column
            ]
        });
    });
</script>
<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 17:13:50 GMT -->
</html>
<?php include 'header.php';?>

<?php include 'sidebar.php';?>


<div class="page-wrapper">

<div class="content container-fluid pb-0">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Employee</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
<li class="breadcrumb-item active">Employee</li>
</ul>
</div>
<div class="col-auto float-end ms-auto">
<a href="add-employee.php" class="btn add-btn" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> Add Employee</a>
<div class="view-icons">
<a href="all-employees.php" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
<a href="all-employees-list.php" class="list-view btn btn-link"><i class="fa-solid fa-bars"></i></a>
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

<div class="row staff-grid-row">

<?php
if ($fetchallemployees->num_rows > 0) {
    // Output data for each row
    while ($row = $fetchallemployees->fetch_assoc()) {
        // Store data in variables
        $fullName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
        $position = htmlspecialchars($row['position']);
        $email = htmlspecialchars($row['email']);
        $avatarUrl = 'assets/img/profiles/avatar-02.jpg'; // Placeholder, adjust as needed

        echo '<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="profile.html" class="avatar"><img src="' . $avatarUrl . '" alt="User Image"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href=""edit-employee.php?$email" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="delete.php?$email" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#">' . $fullName . '</a></h4>
                    <div class="small text-muted">' . $position . '</div>
                </div>
            </div>';
    }
} else {
    echo "No employees found.";
}

?>


</div>
</div>


<div id="add_employee" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Add Employee</h5>
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


<script src="assets/js/jquery-3.7.1.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/jquery.slimscroll.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/select2.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/moment.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/layout.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>
<script src="assets/js/theme-settings.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>
<script src="assets/js/greedynav.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>

<script src="assets/js/app.js" type="2258e4cc8c6456a552d797d6-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2258e4cc8c6456a552d797d6-|49" defer></script></body>

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 17:13:50 GMT -->
</html>
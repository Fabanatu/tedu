<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 17:13:49 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Smarthr - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
<meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
<title>Employees - HRMS admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/line-awesome.min.css">
<link rel="stylesheet" href="assets/css/material.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper">

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

<div class="two-col-bar" id="two-col-bar">
<div class="sidebar sidebar-twocol">
<div class="sidebar-left slimscroll">
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link" id="v-pills-dashboard-tab" title="Dashboard" data-bs-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
<span class="material-icons-outlined">
home
</span>
</a>
<a class="nav-link" id="v-pills-apps-tab" title="Apps" data-bs-toggle="pill" href="#v-pills-apps" role="tab" aria-controls="v-pills-apps" aria-selected="false">
<span class="material-icons-outlined">
dashboard
</span>
</a>
<a class="nav-link active" id="v-pills-employees-tab" title="Employees" data-bs-toggle="pill" href="#v-pills-employees" role="tab" aria-controls="v-pills-employees" aria-selected="false">
<span class="material-icons-outlined">
people
</span>
</a>
<a class="nav-link" id="v-pills-clients-tab" title="Clients" data-bs-toggle="pill" href="#v-pills-clients" role="tab" aria-controls="v-pills-clients" aria-selected="false">
<span class="material-icons-outlined">
person
</span>
</a>
<a class="nav-link" id="v-pills-projects-tab" title="Projects" data-bs-toggle="pill" href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">
<span class="material-icons-outlined">
topic
</span>
</a>
<a class="nav-link" id="v-pills-leads-tab" title="CRM" data-bs-toggle="pill" href="#v-pills-leads" role="tab" aria-controls="v-pills-leads" aria-selected="false">
<span class="material-icons-outlined">
leaderboard
</span>
</a>
<a class="nav-link" id="v-pills-tickets-tab" title="Tickets" data-bs-toggle="pill" href="#v-pills-tickets" role="tab" aria-controls="v-pills-tickets" aria-selected="false">
<span class="material-icons-outlined">
confirmation_number
</span>
</a>
<a class="nav-link" id="v-pills-sales-tab" title="Sales" data-bs-toggle="pill" href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="false">
<span class="material-icons-outlined">
shopping_bag
</span>
</a>
<a class="nav-link" id="v-pills-accounting-tab" title="Accounting" data-bs-toggle="pill" href="#v-pills-accounting" role="tab" aria-controls="v-pills-accounting" aria-selected="false">
<span class="material-icons-outlined">
account_balance_wallet
</span>
</a>
<a class="nav-link" id="v-pills-payroll-tab" title="Payroll" data-bs-toggle="pill" href="#v-pills-payroll" role="tab" aria-controls="v-pills-payroll" aria-selected="false">
<span class="material-icons-outlined">
request_quote
</span>
</a>
<a class="nav-link" id="v-pills-policies-tab" title="Policies" data-bs-toggle="pill" href="#v-pills-policies" role="tab" aria-controls="v-pills-policies" aria-selected="false">
<span class="material-icons-outlined">
verified_user
</span>
</a>
<a class="nav-link" id="v-pills-reports-tab" title="Reports" data-bs-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">
<span class="material-icons-outlined">
report_gmailerrorred
</span>
</a>
<a class="nav-link" id="v-pills-performance-tab" title="Performance" data-bs-toggle="pill" href="#v-pills-performance" role="tab" aria-controls="v-pills-performance" aria-selected="false">
<span class="material-icons-outlined">
shutter_speed
</span>
</a>
<a class="nav-link" id="v-pills-goals-tab" title="Goals" data-bs-toggle="pill" href="#v-pills-goals" role="tab" aria-controls="v-pills-goals" aria-selected="false">
<span class="material-icons-outlined">
track_changes
</span>
</a>
<a class="nav-link" id="v-pills-training-tab" title="Training" data-bs-toggle="pill" href="#v-pills-training" role="tab" aria-controls="v-pills-training" aria-selected="false">
<span class="material-icons-outlined">
checklist_rtl
</span>
</a>
<a class="nav-link" id="v-pills-promotion-tab" title="Promotions" data-bs-toggle="pill" href="#v-pills-promotion" role="tab" aria-controls="v-pills-promotion" aria-selected="false">
<span class="material-icons-outlined">
auto_graph
</span>
</a>
<a class="nav-link" id="v-pills-resignation-tab" title="Resignation" data-bs-toggle="pill" href="#v-pills-resignation" role="tab" aria-controls="v-pills-resignation" aria-selected="false">
<span class="material-icons-outlined">
do_not_disturb_alt
</span>
</a>
<a class="nav-link" id="v-pills-termination-tab" title="Termination" data-bs-toggle="pill" href="#v-pills-termination" role="tab" aria-controls="v-pills-termination" aria-selected="false">
<span class="material-icons-outlined">
indeterminate_check_box
</span>
</a>
<a class="nav-link" id="v-pills-assets-tab" title="Assets" data-bs-toggle="pill" href="#v-pills-assets" role="tab" aria-controls="v-pills-assets" aria-selected="false">
<span class="material-icons-outlined">
web_asset
</span>
</a>
<a class="nav-link" id="v-pills-jobs-tab" title="Jobs" data-bs-toggle="pill" href="#v-pills-jobs" role="tab" aria-controls="v-pills-jobs" aria-selected="false">
<span class="material-icons-outlined">
work_outline
</span>
</a>
<a class="nav-link" id="v-pills-knowledgebase-tab" title="Knowledgebase" data-bs-toggle="pill" href="#v-pills-knowledgebase" role="tab" aria-controls="v-pills-knowledgebase" aria-selected="false">
<span class="material-icons-outlined">
school
</span>
</a>
<a class="nav-link" id="v-pills-activities-tab" title="Activities" data-bs-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">
<span class="material-icons-outlined">
toggle_off
</span>
</a>
<a class="nav-link" id="v-pills-users-tab" title="Users" data-bs-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">
<span class="material-icons-outlined">
group_add
</span>
</a>
<a class="nav-link" id="v-pills-settings-tab" title="Settings" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
<span class="material-icons-outlined">
settings
</span>
</a>
<a class="nav-link" id="v-pills-profile-tab" title="Profile" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
<span class="material-icons-outlined">
manage_accounts
</span>
</a>
<a class="nav-link" id="v-pills-authentication-tab" title="Authentication" data-bs-toggle="pill" href="#v-pills-authentication" role="tab" aria-controls="v-pills-authentication" aria-selected="false">
<span class="material-icons-outlined">
perm_contact_calendar
</span>
</a>
<a class="nav-link" id="v-pills-errorpages-tab" title="Error Pages" data-bs-toggle="pill" href="#v-pills-errorpages" role="tab" aria-controls="v-pills-errorpages" aria-selected="false">
<span class="material-icons-outlined">
announcement
</span>
</a>
<a class="nav-link" id="v-pills-subscriptions-tab" title="Subscriptions" data-bs-toggle="pill" href="#v-pills-subscriptions" role="tab" aria-controls="v-pills-subscriptions" aria-selected="false">
<span class="material-icons-outlined">
loyalty
</span>
</a>
<a class="nav-link" id="v-pills-pages-tab" title="Pages" data-bs-toggle="pill" href="#v-pills-pages" role="tab" aria-controls="v-pills-pages" aria-selected="false">
<span class="material-icons-outlined">
layers
</span>
</a>
<a class="nav-link" id="v-pills-baseui-tab" title="Base UI" data-bs-toggle="pill" href="#v-pills-baseui" role="tab" aria-controls="v-pills-baseui" aria-selected="false">
<span class="material-icons-outlined">
foundation
</span>
</a>
<a class="nav-link" id="v-pills-elements-tab" title="Advanced UI" data-bs-toggle="pill" href="#v-pills-elements" role="tab" aria-controls="v-pills-elements" aria-selected="false">
<span class="material-icons-outlined">
bento
</span>
</a>
<a class="nav-link" id="v-pills-charts-tab" title="Charts" data-bs-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="v-pills-charts" aria-selected="false">
<span class="material-icons-outlined">
bar_chart
</span>
</a>
<a class="nav-link" id="v-pills-icons-tab" title="Icons" data-bs-toggle="pill" href="#v-pills-icons" role="tab" aria-controls="v-pills-icons" aria-selected="false">
<span class="material-icons-outlined">
grading
</span>
</a>
<a class="nav-link" id="v-pills-forms-tab" title="Forms" data-bs-toggle="pill" href="#v-pills-forms" role="tab" aria-controls="v-pills-forms" aria-selected="false">
<span class="material-icons-outlined">
view_day
</span>
</a>
<a class="nav-link" id="v-pills-tables-tab" title="Tables" data-bs-toggle="pill" href="#v-pills-tables" role="tab" aria-controls="v-pills-tables" aria-selected="false">
<span class="material-icons-outlined">
table_rows
</span>
</a>
<a class="nav-link" id="v-pills-documentation-tab" title="Documentation" data-bs-toggle="pill" href="#v-pills-documentation" role="tab" aria-controls="v-pills-documentation" aria-selected="false">
<span class="material-icons-outlined">
description
</span>
</a>
<a class="nav-link" id="v-pills-changelog-tab" title="Changelog" data-bs-toggle="pill" href="#v-pills-changelog" role="tab" aria-controls="v-pills-changelog" aria-selected="false">
<span class="material-icons-outlined">
sync_alt
</span>
</a>
<a class="nav-link" id="v-pills-multilevel-tab" title="Multilevel" data-bs-toggle="pill" href="#v-pills-multilevel" role="tab" aria-controls="v-pills-multilevel" aria-selected="false">
<span class="material-icons-outlined">
library_add_check
</span>
</a>
</div>
</div>
<div class="sidebar-right">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
<p>Dashboard</p>
<ul>
<li><a href="admin-dashboard.html">Admin Dashboard</a></li>
<li><a href="employee-dashboard.html">Employee Dashboard</a></li>
<li><a href="deals-dashboard.html">Deals Dashboard</a></li>
<li><a href="leads-dashboard.html">Leads Dashboard</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-apps" role="tabpanel" aria-labelledby="v-pills-apps-tab">
<p>App</p>
<ul>
<li>
<a href="chat.html">Chat</a>
</li>
<li class="sub-menu">
<a href="#">Calls <span class="menu-arrow"></span></a>
<ul>
<li><a href="voice-call.html">Voice Call</a></li>
<li><a href="video-call.html">Video Call</a></li>
<li><a href="outgoing-call.html">Outgoing Call</a></li>
<li><a href="incoming-call.html">Incoming Call</a></li>
</ul>
</li>
<li>
<a href="calender.html">Calendar</a>
</li>
<li>
<a href="contacts.html">Contacts</a>
</li>
<li>
<a href="inbox.html">Email</a>
</li>
<li>
<a href="file-manager.html">File Manager</a>
</li>
</ul>
</div>
<div class="tab-pane fade show active" id="v-pills-employees" role="tabpanel" aria-labelledby="v-pills-employees-tab">
<p>Employees</p>
<ul>
<li><a href="employees.html" class="active">All Employees</a></li>
<li><a href="holidays.html">Holidays</a></li>
<li><a href="leaves.html">Leaves (Admin) <span class="badge rounded-pill bg-primary float-end">1</span></a></li>
<li><a href="leaves-employee.html">Leaves (Employee)</a></li>
<li><a href="leave-settings.html">Leave Settings</a></li>
<li><a href="attendance.html">Attendance (Admin)</a></li>
<li><a href="attendance-employee.html">Attendance (Employee)</a></li>
<li><a href="departments.html">Departments</a></li>
<li><a href="designations.html">Designations</a></li>
<li><a href="timesheet.html">Timesheet</a></li>
<li><a href="shift-scheduling.html">Shift & Schedule</a></li>
<li><a href="overtime.html">Overtime</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-clients" role="tabpanel" aria-labelledby="v-pills-clients-tab">
<p>Clients</p>
<ul>
<li><a href="clients.html">Clients</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">
<p>Projects</p>
<ul>
<li><a href="projects.html">Projects</a></li>
<li><a href="tasks.html">Tasks</a></li>
<li><a href="task-board.html">Task Board</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-leads" role="tabpanel" aria-labelledby="v-pills-leads-tab">
<p>CRM</p>
<ul>
<li>
<a href="contact-list.html"> Contacts</a>
</li>
<li>
<a href="companies.html">Companies</a>
</li>
<li>
<a href="deals.html"> Deals</a>
</li>
<li>
<a href="leads.html"> Leads </a>
</li>
<li>
<a href="pipeline.html">Pipeline </a>
</li>
<li>
<a href="analytics.html">Analytics</a>
</li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-tickets" role="tabpanel" aria-labelledby="v-pills-tickets-tab">
<p>Tickets</p>
<ul>
<li><a href="tickets.html">Tickets</a></li>
<li><a href="ticket-details.html">Ticket Details</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
<p>Sales</p>
<ul>
<li><a href="estimates.html">Estimates</a></li>
<li><a href="invoices.html">Invoices</a></li>
<li><a href="payments.html">Payments</a></li>
<li><a href="expenses.html">Expenses</a></li>
<li><a href="provident-fund.html">Provident Fund</a></li>
<li><a href="taxes.html">Taxes</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-accounting" role="tabpanel" aria-labelledby="v-pills-accounting-tab">
<p>Accounting</p>
<ul>
<li><a href="categories.html">Categories</a></li>
<li><a href="budgets.html">Budgets</a></li>
<li><a href="budget-expenses.html">Budget Expenses</a></li>
<li><a href="budget-revenues.html">Budget Revenues</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-payroll" role="tabpanel" aria-labelledby="v-pills-payroll-tab">
<p>Payroll</p>
<ul>
<li><a href="salary.html"> Employee Salary </a></li>
<li><a href="salary-view.html"> Payslip </a></li>
<li><a href="payroll-items.html"> Payroll Items </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-policies" role="tabpanel" aria-labelledby="v-pills-policies-tab">
<p>Policies</p>
<ul>
<li><a href="policies.html"> Policies </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
<p>Reports</p>
<ul>
<li><a href="expense-reports.html"> Expense Report </a></li>
<li><a href="invoice-reports.html"> Invoice Report </a></li>
<li><a href="payments-reports.html"> Payments Report </a></li>
<li><a href="project-reports.html"> Project Report </a></li>
<li><a href="task-reports.html"> Task Report </a></li>
<li><a href="user-reports.html"> User Report </a></li>
<li><a href="employee-reports.html"> Employee Report </a></li>
<li><a href="payslip-reports.html"> Payslip Report </a></li>
<li><a href="attendance-reports.html"> Attendance Report </a></li>
<li><a href="leave-reports.html"> Leave Report </a></li>
<li><a href="daily-reports.html"> Daily Report </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab">
<p>Performance</p>
<ul>
<li><a href="performance-indicator.html"> Performance Indicator </a></li>
<li><a href="performance.html"> Performance Review </a></li>
<li><a href="performance-appraisal.html"> Performance Appraisal </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-goals" role="tabpanel" aria-labelledby="v-pills-goals-tab">
<p>Goals</p>
<ul>
<li><a href="goal-tracking.html"> Goal List </a></li>
<li><a href="goal-type.html"> Goal Type </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-training" role="tabpanel" aria-labelledby="v-pills-training-tab">
<p>Training</p>
<ul>
<li><a href="training.html"> Training List </a></li>
<li><a href="trainers.html"> Trainers</a></li>
<li><a href="training-type.html"> Training Type </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-promotion" role="tabpanel" aria-labelledby="v-pills-promotion-tab">
<p>Promotion</p>
<ul>
<li><a href="promotion.html"> Promotion </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-resignation" role="tabpanel" aria-labelledby="v-pills-resignation-tab">
<p>Resignation</p>
<ul>
<li><a href="resignation.html"> Resignation </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-termination" role="tabpanel" aria-labelledby="v-pills-termination-tab">
<p>Termination</p>
<ul>
<li><a href="termination.html"> Termination </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-assets" role="tabpanel" aria-labelledby="v-pills-assets-tab">
<p>Assets</p>
<ul>
<li><a href="assets.html"> Assets </a></li>
</ul>
</div>
<div class="tab-pane fade " id="v-pills-jobs" role="tabpanel" aria-labelledby="v-pills-jobs-tab">
<p>Jobs</p>
<ul>
<li><a href="user-dashboard.html"> User Dasboard </a></li>
<li><a href="jobs-dashboard.html"> Jobs Dasboard </a></li>
<li><a href="jobs.html"> Manage Jobs </a></li>
<li><a href="job-applicants.html"> Applied Jobs </a></li>
<li><a href="manage-resumes.html"> Manage Resumes </a></li>
<li><a href="shortlist-candidates.html"> Shortlist Candidates </a></li>
<li><a href="interview-questions.html"> Interview Questions </a></li>
<li><a href="offer_approvals.html"> Offer Approvals </a></li>
<li><a href="experiance-level.html"> Experience Level </a></li>
<li><a href="candidates.html"> Candidates List </a></li>
<li><a href="schedule-timing.html"> Schedule timing </a></li>
<li><a href="apptitude-result.html"> Aptitude Results </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-knowledgebase" role="tabpanel" aria-labelledby="v-pills-knowledgebase-tab">
<p>Knowledgebase</p>
<ul>
<li><a href="knowledgebase.html"> Knowledgebase </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
<p>Activities</p>
<ul>
<li><a href="activities.html"> Activities </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-activities-tab">
<p>Users</p>
<ul>
<li><a href="users.html"> Users </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
<p>Settings</p>
<ul>
<li><a href="settings.html"> Settings </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
<p>Profile</p>
<ul>
<li><a href="profile.html"> Employee Profile </a></li>
<li><a href="client-profile.html"> Client Profile </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-authentication" role="tabpanel" aria-labelledby="v-pills-authentication-tab">
<p>Authentication</p>
<ul>
<li><a href="index.html"> Login </a></li>
<li><a href="register.html"> Register </a></li>
<li><a href="forgot-password.html"> Forgot Password </a></li>
<li><a href="otp.html"> OTP </a></li>
<li><a href="lock-screen.html"> Lock Screen </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-errorpages" role="tabpanel" aria-labelledby="v-pills-errorpages-tab">
<p>Error Pages</p>
<ul>
<li><a href="error-404.html">404 Error </a></li>
<li><a href="error-500.html">500 Error </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-subscriptions" role="tabpanel" aria-labelledby="v-pills-subscriptions-tab">
<p>Subscriptions</p>
<ul>
<li><a href="subscriptions.html"> Subscriptions (Admin) </a></li>
<li><a href="subscriptions-company.html"> Subscriptions (Company) </a></li>
<li><a href="subscribed-companies.html"> Subscribed Companies</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
<p>Pages</p>
<ul>
<li><a href="search.html"> Search </a></li>
<li><a href="faq.html"> FAQ </a></li>
<li><a href="terms.html"> Terms </a></li>
<li><a href="privacy-policy.html"> Privacy Policy </a></li>
<li><a href="blank-page.html"> Blank Page </a></li>
<li><a href="coming-soon.html">Coming Soon </a></li>
<li><a href="under-maintenance.html">Under Maintanance </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-baseui" role="tabpanel" aria-labelledby="v-pills-baseui-tab">
<p>Base UI</p>
<ul>
<li><a href="ui-alerts.html">Alerts</a></li>
<li><a href="ui-accordion.html">Accordion</a></li>
<li><a href="ui-avatar.html">Avatar</a></li>
<li><a href="ui-badges.html">Badges</a></li>
<li><a href="ui-borders.html">Border</a></li>
<li><a href="ui-buttons.html">Buttons</a></li>
<li><a href="ui-buttons-group.html">Button Group</a></li>
<li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
<li><a href="ui-cards.html">Card</a></li>
<li><a href="ui-carousel.html">Carousel</a></li>
<li><a href="ui-colors.html">Colors</a></li>
<li><a href="ui-dropdowns.html">Dropdowns</a></li>
<li><a href="ui-grid.html">Grid</a></li>
<li><a href="ui-images.html">Images</a></li>
<li><a href="ui-lightbox.html">Lightbox</a></li>
<li><a href="ui-media.html">Media</a></li>
<li><a href="ui-modals.html">Modals</a></li>
<li><a href="ui-notification.html">Notification</a></li>
<li><a href="ui-offcanvas.html">Offcanvas</a></li>
<li><a href="ui-pagination.html">Pagination</a></li>
<li><a href="ui-popovers.html">Popovers</a></li>
<li><a href="ui-progress.html">Progress</a></li>
<li><a href="ui-placeholders.html">Placeholders</a></li>
<li><a href="ui-rangeslider.html">Range Slider</a></li>
<li><a href="ui-spinner.html">Spinner</a></li>
<li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
<li><a href="ui-nav-tabs.html">Tabs</a></li>
<li><a href="ui-toasts.html">Toasts</a></li>
<li><a href="ui-tooltips.html">Tooltips</a></li>
<li><a href="ui-typography.html">Typography</a></li>
<li><a href="ui-video.html">Video</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-elements" role="tabpanel" aria-labelledby="v-pills-elements-tab">
<p>Advanced UI</p>
<ul>
<li><a href="ui-ribbon.html">Ribbon</a></li>
<li><a href="ui-clipboard.html">Clipboard</a></li>
<li><a href="ui-drag-drop.html">Drag & Drop</a></li>
<li><a href="ui-rangeslider.html">Range Slider</a></li>
<li><a href="ui-rating.html">Rating</a></li>
<li><a href="ui-text-editor.html">Text Editor</a></li>
<li><a href="ui-counter.html">Counter</a></li>
<li><a href="ui-scrollbar.html">Scrollbar</a></li>
<li><a href="ui-stickynote.html">Sticky Note</a></li>
<li><a href="ui-timeline.html">Timeline</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-charts" role="tabpanel" aria-labelledby="v-pills-charts-tab">
<p>Charts</p>
<ul>
<li><a href="chart-apex.html">Apex Charts</a></li>
<li><a href="chart-js.html">Chart Js</a></li>
<li><a href="chart-morris.html">Morris Charts</a></li>
<li><a href="chart-flot.html">Flot Charts</a></li>
<li><a href="chart-peity.html">Peity Charts</a></li>
<li><a href="chart-c3.html">C3 Charts</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-icons" role="tabpanel" aria-labelledby="v-pills-icons-tab">
<p>Icons</p>
<ul>
<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
<li><a href="icon-feather.html">Feather Icons</a></li>
<li><a href="icon-ionic.html">Ionic Icons</a></li>
<li><a href="icon-material.html">Material Icons</a></li>
<li><a href="icon-pe7.html">Pe7 Icons</a></li>
<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
<li><a href="icon-themify.html">Themify Icons</a></li>
<li><a href="icon-weather.html">Weather Icons</a></li>
<li><a href="icon-typicon.html">Typicon Icons</a></li>
<li><a href="icon-flag.html">Flag Icons</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-forms" role="tabpanel" aria-labelledby="v-pills-forms-tab">
<p>Forms</p>
<ul>
<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
<li><a href="form-input-groups.html">Input Groups </a></li>
<li><a href="form-horizontal.html">Horizontal Form </a></li>
<li><a href="form-vertical.html"> Vertical Form </a></li>
<li><a href="form-mask.html"> Form Mask </a></li>
<li><a href="form-validation.html"> Form Validation </a></li>
<li><a href="form-select2.html">Form Select2 </a></li>
<li><a href="form-fileupload.html">File Upload </a></li>
<li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
<li><a href="form-wizard.html">Form Wizard</a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-tables" role="tabpanel" aria-labelledby="v-pills-tables-tab">
<p>Tables</p>
<ul>
<li><a href="tables-basic.html">Basic Tables </a></li>
<li><a href="data-tables.html">Data Table </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-documentation" role="tabpanel" aria-labelledby="v-pills-documentation-tab">
<p>Documentation</p>
<ul>
<li><a href="#">Documentation </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-changelog" role="tabpanel" aria-labelledby="v-pills-changelog-tab">
<p>Change Log</p>
<ul>
<li><a href="#"><span>Change Log</span> <span class="badge badge-primary ms-auto">v4.0</span> </a></li>
</ul>
</div>
<div class="tab-pane fade" id="v-pills-multilevel" role="tabpanel" aria-labelledby="v-pills-multilevel-tab">
<p>Multi Level</p>
<ul>
<li class="sub-menu">
<a href="javascript:void(0);">Level 1 <span class="menu-arrow"></span></a>
<ul class="ms-3">
<li class="sub-menu">
<a href="javascript:void(0);">Level 1 <span class="menu-arrow"></span></a>
<ul>
<li><a href="javascript:void(0);">Level 2</a></li>
<li><a href="javascript:void(0);">Level 3</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="javascript:void(0);">Level 2</a></li>
<li><a href="javascript:void(0);">Level 3</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>

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
<a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> Add Employee</a>
<div class="view-icons">
<a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
<a href="employees-list.html" class="list-view btn btn-link"><i class="fa-solid fa-bars"></i></a>
</div>
</div>
</div>
</div>


<div class="row filter-row">
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
</div>

<div class="row staff-grid-row">
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Doe</a></h4>
<div class="small text-muted">Web Designer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Richard Miles</a></h4>
<div class="small text-muted">Web Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Smith</a></h4>
<div class="small text-muted">Android Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Mike Litorus</a></h4>
<div class="small text-muted">IOS Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-11.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Wilmer Deluna</a></h4>
<div class="small text-muted">Team Leader</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-12.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Jeffrey Warden</a></h4>
<div class="small text-muted">Web Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-13.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Bernardo Galaviz</a></h4>
<div class="small text-muted">Web Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-01.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Lesley Grauer</a></h4>
<div class="small text-muted">Team Leader</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Jeffery Lalor</a></h4>
<div class="small text-muted">Team Leader</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-04.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Loren Gatlin</a></h4>
<div class="small text-muted">Android Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-03.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Tarah Shropshire</a></h4>
<div class="small text-muted">Android Developer</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-08.jpg" alt="User Image"></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
</div>
</div>
<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Catherine Manseau</a></h4>
<div class="small text-muted">Android Developer</div>
</div>
</div>
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
<div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="theme-settings-offcanvas">
<div class="sidebar-headerset">
<div class="sidebar-headersets">
<h2>Customizer</h2>
<h3>Customize your overview Page layout</h3>
</div>
<div class="sidebar-headerclose">
<a data-bs-dismiss="offcanvas" aria-label="Close"><img src="assets/img/close.png" alt="Close Icon"></a>
</div>
</div>
<div class="offcanvas-body p-0">
<div data-simplebar class="h-100">
<div class="settings-mains">
<div class="layout-head">
<h5>Layout</h5>
<h6>Choose your layout</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check card-radio p-0">
<input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
<label class="form-check-label avatar-md w-100" for="customizer-layout01">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Vertical</h5>
</div>
<div class="col-4">
<div class="form-check card-radio p-0">
<input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
<label class="form-check-label  avatar-md w-100" for="customizer-layout02">
<img src="assets/img/horizontal.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Horizontal</h5>
</div>
<div class="col-4">
<div class="form-check card-radio p-0">
<input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input">
<label class="form-check-label  avatar-md w-100" for="customizer-layout03">
<img src="assets/img/two-col.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Two Column</h5>
</div>
</div>
<div class="layout-head pt-3">
<h5>Color Scheme</h5>
<h6>Choose Light or Dark Scheme.</h6>
</div>
<div class="colorscheme-cardradio">
<div class="row">
<div class="col-4">
<div class="form-check card-radio p-0">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-orange" value="orange">
<label class="form-check-label  avatar-md w-100 " for="layout-mode-orange">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Orange</h5>
</div>
<div class="col-4">
<div class="form-check card-radio p-0">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-light" value="light">
<label class="form-check-label  avatar-md w-100" for="layout-mode-light">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Light</h5>
</div>
<div class="col-4">
<div class="form-check card-radio dark  p-0 ">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-dark" value="dark">
<label class="form-check-label avatar-md w-100 " for="layout-mode-dark">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Dark</h5>
</div>
<div class="col-4">
<div class="form-check card-radio blue  p-0 ">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-blue" value="blue">
<label class="form-check-label  avatar-md w-100" for="layout-mode-blue">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Blue</h5>
</div>
<div class="col-4">
<div class="form-check card-radio maroon p-0">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-maroon" value="maroon">
<label class="form-check-label  avatar-md w-100 " for="layout-mode-maroon">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Maroon</h5>
</div>
<div class="col-4">
<div class="form-check card-radio purple p-0">
<input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-purple" value="purple">
<label class="form-check-label  avatar-md w-100 " for="layout-mode-purple">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Purple</h5>
</div>
</div>
</div>
<div id="layout-width">
<div class="layout-head pt-3">
<h5>Layout Width</h5>
<h6>Choose Fluid or Boxed layout.</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check card-radio p-0">
<input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid">
<label class="form-check-label avatar-md w-100" for="layout-width-fluid">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Fluid</h5>
</div>
<div class="col-4">
<div class="form-check card-radio p-0 ">
<input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed">
<label class="form-check-label avatar-md w-100 px-2" for="layout-width-boxed">
<img src="assets/img/boxed.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Boxed</h5>
</div>
</div>
</div>
<div id="layout-position">
<div class="layout-head pt-3">
<h5>Layout Position</h5>
<h6>Choose Fixed or Scrollable Layout Position.</h6>
</div>
<div class="btn-group bor-rad-50 overflow-hidden radio" role="group">
<input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
<label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
<input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
<label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
</div>
</div>
<div class="layout-head pt-3">
<h5>Topbar Color</h5>
<h6>Choose Light or Dark Topbar Color.</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check card-radio  p-0">
<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light">
<label class="form-check-label avatar-md w-100" for="topbar-color-light">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Light</h5>
</div>
<div class="col-4">
<div class="form-check card-radio p-0">
<input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark">
<label class="form-check-label  avatar-md w-100" for="topbar-color-dark">
<img src="assets/img/dark.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Dark</h5>
</div>
</div>
<div id="sidebar-size">
<div class="layout-head pt-3">
<h5>Sidebar Size</h5>
<h6>Choose a size of Sidebar.</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check sidebar-setting card-radio  p-0 ">
<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg">
<label class="form-check-label avatar-md w-100" for="sidebar-size-default">
<img src="assets/img/vertical.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Default</h5>
</div>
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0">
<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md">
<label class="form-check-label  avatar-md w-100" for="sidebar-size-compact">
<img src="assets/img/compact.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Compact</h5>
</div>
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0 ">
<input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover">
<label class="form-check-label avatar-md w-100" for="sidebar-size-small-hover">
<img src="assets/img/small-hover.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Small Hover View</h5>
</div>
</div>
</div>
<div id="sidebar-view">
<div class="layout-head pt-3">
<h5>Sidebar View</h5>
<h6>Choose Default or Detached Sidebar view.</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check sidebar-setting card-radio  p-0">
<input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default">
<label class="form-check-label avatar-md w-100" for="sidebar-view-default">
<img src="assets/img/compact.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Default</h5>
</div>
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0">
<input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached">
<label class="form-check-label  avatar-md w-100" for="sidebar-view-detached">
<img src="assets/img/detached.png" alt="Layout Image">
</label>
</div>
<h5 class="fs-13 text-center mt-2">Detached</h5>
</div>
</div>
</div>
<div id="sidebar-color">
<div class="layout-head pt-3">
<h5>Sidebar Color</h5>
<h6>Choose a color of Sidebar.</h6>
</div>
<div class="row">
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light">
<label class="form-check-label  avatar-md w-100" for="sidebar-color-light">
<span class="bg-light bg-sidebarcolor"></span>
</label>
</div>
<h5 class="fs-13 text-center mt-2">Light</h5>
</div>
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark">
<label class="form-check-label  avatar-md w-100" for="sidebar-color-dark">
<span class="bg-darks bg-sidebarcolor"></span>
</label>
</div>
<h5 class="fs-13 text-center mt-2">Dark</h5>
</div>
<div class="col-4">
<div class="form-check sidebar-setting card-radio p-0">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient" value="gradient">
<label class="form-check-label avatar-md w-100" for="sidebar-color-gradient">
<span class="bg-gradients bg-sidebarcolor"></span>
</label>
</div>
<h5 class="fs-13 text-center mt-2">Gradient</h5>
</div>
<div class="col-4 d-none">
<button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient" aria-expanded="false" aria-controls="collapseBgGradient">
<span class="d-flex gap-1 h-100">
<span class="flex-shrink-0">
<span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
<span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
<span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
</span>
</span>
<span class="flex-grow-1">
<span class="d-flex h-100 flex-column">
<span class="bg-light d-block p-1"></span>
<span class="bg-light d-block p-1 mt-auto"></span>
</span>
</span>
</span>
</button>
<h5 class="fs-13 text-center mt-2">Gradient</h5>
</div>
</div>
<div class="collapse d-none" id="collapseBgGradient">
<div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">
<div class="form-check sidebar-setting card-radio">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-1" value="gradient">
<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
<span class="avatar-title rounded-circle bg-vertical-gradient"></span>
</label>
</div>
<div class="form-check sidebar-setting card-radio">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-2" value="gradient-2">
<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
<span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
</label>
</div>
<div class="form-check sidebar-setting card-radio">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-3" value="gradient-3">
<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
<span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
</label>
</div>
<div class="form-check sidebar-setting card-radio">
<input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-4" value="gradient-4">
<label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
<span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
</label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="offcanvas-footer border-top p-3 text-center">
<div class="row">
<div class="col-6">
<button type="button" class="btn btn-light w-100 bor-rad-50" id="reset-layout">Reset</button>
</div>
<div class="col-6">
<a href="https://themeforest.net/item/smarthr-bootstrap-admin-panel-template/21153150" target="_blank" class="btn btn-primary w-100 bor-rad-50">Buy Now</a>
</div>
</div>
</div>
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
<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2258e4cc8c6456a552d797d6-|49" defer></script></body>

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/employees.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 17:13:50 GMT -->
</html>
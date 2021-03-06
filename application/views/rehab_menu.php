<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/2/17
 * Time: 1:58 PM
 */
?>
<nav class="col-12 navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">NC WildLife Rehab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ncwlrMenu" aria-controls="ncwlrMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="ncwlrMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="window.location.reload(false);">Home</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="informationDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Information</a>
                <div class="dropdown-menu" aria-labelledby="informationDrop">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Information/donations')">Donations</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Volunteer/schedule/event')">Events / Appearances</a>
                </div>
            </li>
            <?php if ( !$this->ion_auth->logged_in() ){ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0)" onclick="$('#content').load('Rehab/generalRehabber')">Rehabber List</a>
                </li>
            <?php } ?>
            <?php if ( $this->ion_auth->in_group('volunteer') ){ ?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activity / Intake</a>
                    <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Intake/add_good_samaritan')">Add Good Samaritan</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Intake/intake_animal')">Intake Animal</a>
                    </div>
                </li>
            <?php } ?>
            <?php if ( $this->ion_auth->in_group('volunteer') ){ ?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="volunteerDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Volunteer</a>
                    <div class="dropdown-menu" aria-labelledby="volunteerDrop">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Volunteer/schedule/volunteer')">Volunteer Calendar</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Volunteer/vendorView')">Vendor Information</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Rehab/locateRehabber')">Find Rehabber</a>
                    </div>
                </li>
            <?php } ?>
            <?php if ( $this->ion_auth->logged_in() ){ ?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="chartsDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Charts</a>
                    <div class="dropdown-menu" aria-labelledby="chartsDrop">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Charts/chart/Squirrel')">Squirrel Feeding Chart</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Charts/chart/Opossum')">Opossum Feeding Chart</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Charts/chart/Bunny')">Bunny Feeding Chart</a>
                    </div>
                </li>
            <?php } ?>
            <?php if ( $this->ion_auth->is_admin() ){ ?>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
                    <div class="dropdown-menu" aria-labelledby="adminDrop">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Admin/add_rehabber')">Add Rehabber</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$('#content').load('Admin/manageUsers')">User Manager</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
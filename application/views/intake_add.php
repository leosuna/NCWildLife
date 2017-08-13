<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */

?>

<form class="mt-3">
    <div class="row">
        <div class="form-group col-3">
            <label for="speciesSelection" class="align-content-center">Species</label>
            <select class="form-control" id="speciesSelection">
                <?php
                    foreach ($species->result() as $row)
                    {
                        print "<option>" . $row->species_name . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="ageSelection" class="align-content-center">Age</label>
            <select class="form-control" id="ageSelection">
                <?php
                foreach ($ages->result() as $row)
                {
                    print "<option>" . $row->ages_description . "</option>";
                }
                ?>
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="firstName" class="align-content-center">Good Samaritan First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="First Name">
        </div>
        <div class="form-group col-6">
            <label for="lastName" class="align-content-center">Good Samaritan Last Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <label for="streetAddress" class="align-content-center">Good Samaritan Street Address</label>
            <input type="text" class="form-control" id="streetAddress" placeholder="Street Address">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            <label for="cityName" class="align-content-center">Good Samaritan City</label>
            <input type="text" class="form-control" id="cityName" placeholder="City">
        </div>
        <div class="form-group col-6">
            <label for="stateName" class="align-content-center">Good Samaritan State</label>
            <select class="form-control" id="stateName">
                <?php
                foreach ($states->result() as $row)
                {
                    print "<option>" . $row->state_name . "</option>";
                }
                ?>
            </select>
        </div>
    </div>


</form>
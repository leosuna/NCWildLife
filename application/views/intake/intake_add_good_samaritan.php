<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 9:02 PM
 */
?>
<script type="application/javascript">
    $(document).ready(function() {
        $("#goodSamaritanForm").submit(function(event) {
            event.preventDefault();
            var rdonation;
            var mail;
            if( $("#emailList").is(':checked') ) { mail = "1"; }
            else { mail = "0"; }
            if( $("#donationReceived").is(':checked') ) { rdonation = "1"; }
            else { rdonation = "0"; }
            var e = document.getElementById("stateName");
            var stateValue = e.options[e.selectedIndex].value;
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Intake/addSamaritan",
                dataType: 'json',
                data: {
                    "first":        $("input#firstName").val(),
                    "last":         $("input#lastName").val(),
                    "street":       $("input#streetAddress").val(),
                    "city":         $("input#cityName").val(),
                    "state":        stateValue,
                    "zip":          $("input#zipCode").val(),
                    "email":        $("input#emailAddress").val(),
                    "phone":        $("input#phoneNumber").val(),
                    "donation":     rdonation,
                    "amount":       $("input#donationAmount").val(),
                    "referral":     $("input#referral").val(),
                    "emailList":    mail
                },
                success: function(res) {
                    if (res === "success") {
                        jQuery("div#myStatus").html('<div class="alert alert-success mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("goodSamaritanForm").reset();
                    }
                    else if (res === "duplicate") {
                        jQuery("div#myStatus").html('<div class="alert alert-warning mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Duplicate entry for ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("goodSamaritanForm").reset();
                    }
                    else {
                        jQuery("div#myStatus").html('<div class="alert alert-danger mt-lg-4 col-8 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to add ' + $("input#firstName").val() + ' ' + $("input#lastName").val() + '</div>');
                        document.getElementById("goodSamaritanForm").reset();
                    }
                }
            });
        });
    });
    //$('#goodSamaritanForm').validator();
</script>
<div class="container-fluid col-11">
    <form class="mt-3" id="goodSamaritanForm" name="goodSamaritanForm" data-toggle="validator" role="form">
        <div class="row">
            <div class="form-group col-6">
                <label for="firstName" class="align-content-center control-label">Good Samaritan First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name"  required>
                <div class="invalid-feedback">Please provide a first name</div>
            </div>
            <div class="form-group col-6">
                <label for="lastName" class="align-content-center">Good Samaritan Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" onmouseover="this.focus();" required>
                <div class="invalid-feedback">Please provide a last name</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="streetAddress" class="align-content-center">Good Samaritan Street Address</label>
                <input type="text" class="form-control" id="streetAddress" placeholder="Street Address" onmouseover="this.focus();" required>
            </div>
            <div class="form-group col-6">
                <label for="cityName" class="align-content-center">Good Samaritan City</label>
                <input type="text" class="form-control" id="cityName" placeholder="City" onmouseover="this.focus();" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label for="stateName" class="align-content-center">Good Samaritan State</label>
                <select class="form-control" id="stateName" onmouseover="this.focus();" required>
                    <?php foreach ($states->result() as $row):?>
                        <option value="<?php echo $row->state_id?>"><?php echo $row->state_name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="zipCode" class="align-content-center">Good Samaritan Zip</label>
                <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" onmouseover="this.focus();" required>
            </div>
            <div class="form-group col-3">
                <label for="emailAddress" class="align-content-center">Good Samaritan Email</label>
                <input type="email" class="form-control" id="emailAddress" placeholder="email@domain.com" data-error="Bruh, that email address is invalid" data-feedback="success: 'glyphicon-ok', error: 'glyphicon-remove'" onmouseover="this.focus();" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-3">
                <label for="phoneNumber" class="align-content-center">Good Samaritan Phone</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="XXX-XXX-XXXX" onmouseover="this.focus();" required>
            </div>
        </div>
        <div class="row">
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="donationReceived" type="checkbox" value="Yes" onmouseover="this.focus();">
                    Donation received?
                </label>
            </div>
            <div class="input-group col-3">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" id="donationAmount" placeholder="Amount Received" value="0" onmouseover="this.focus();">
                <span class="input-group-addon">.00</span>
            </div>
            <div class="form-group col-3">
                <label for="referral" class="align-content-center">Who referred you to us?</label>
                <input type="text" class="form-control" id="referral" placeholder="Google, FaceBook, etc..." onmouseover="this.focus();">
            </div>
            <div class="form-check col-3">
                <label class="form-check-label">
                    <input class="form-check-input" id="emailList" type="checkbox" value="1" onmouseover="this.focus();">
                    Would you like to be on our mailing list?
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <input type="submit" id="submitButton">
            </div>
        </div>
    </form>
</div>
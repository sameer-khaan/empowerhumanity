<?php
    include('inc/config.php');
    include('inc/header.php');

    $table = "tbl_users";
    $where = "type in ('admin','member') AND organization_id='".$organizationId."' ORDER BY name";
    $userList = check_table($table,$where);
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-edit icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    New Donor
                    <div class="page-title-subheading">Add Donor Information in system.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>New Donor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="donor_details.php">
                <span>Donors List</span>
            </a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="donor_add" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Donor Name</label>
                                <input type="text" class="form-control-sm form-control" name="name" required>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Contact Number</label>
                                <input type="number" onKeyPress="if(this.value.length==11) return false;" class="form-control-sm form-control" name="contact_number">
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Donation Amount</label>
                                <input type="number" class="form-control-sm form-control" name="donation_amount" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Donation Type</label>
                                <select class="mb-2 form-control-sm form-control" name="donation_type">
                                    <option value="Donation" selected>Donation</option>
                                    <option value="Sadqah">Sadqah</option>
                                    <option value="Zakat">Zakat</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Donation Mode</label>
                                <select class="mb-2 form-control-sm form-control" name="donation_mode">
                                    <option value="Bank Transfer" selected>Bank Transfer</option>
                                    <option value="Self Managed">Self Managed</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Bank (if any)</label>
                                <input type="text" class="form-control-sm form-control" name="bank">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Amount Handler</label>
                                <select class="mb-2 form-control-sm form-control" name="user_id" required>
                                    <option value="" selected>Select</option>
                                    <?php  while($row = mysqli_fetch_assoc($userList)){ ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="hidden" name="organization_id" value="<?php echo $organizationId ?>">
                                <input type="hidden" name="record_inserted_by" value="<?php echo $loggedInPersonId ?>">
                                <label class="error text-danger"></label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
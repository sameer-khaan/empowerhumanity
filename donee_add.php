<?php
    include('inc/config.php');
    include('inc/header.php');

    $sql = "SELECT * FROM tbl_users GROUP BY id ORDER BY type";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_assoc($res)){
        $userList[] = $row;
    }
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-pen icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Donee Entry
                    <div class="page-title-subheading">Add Donee Information in system.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>New Donee</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="full_view.php">
                <span>Donees List</span>
            </a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="donee_add" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label>Name</label>
                                <input type="text" class="form-control-sm form-control" name="name" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Contact Number</label>
                                <input type="text" class="form-control-sm form-control" name="number" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label>CNIC</label>
                                <input type="text" class="form-control-sm form-control" name="cnic">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Head Count</label>
                                <input type="text" class="form-control-sm form-control" name="headcount">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <label>Address</label>
                                <textarea class="form-control-sm form-control" name="address"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="hidden" name="organization_id" value="<?php echo $organizationId ?>">
                                <input type="hidden" name="record_inserted_by" value="<?php echo $loggedInPersonId ?>">
                                <label class="error text-danger"></label>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
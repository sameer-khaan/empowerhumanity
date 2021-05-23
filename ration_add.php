<?php
    include('inc/config.php');
    include('inc/header.php');
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
                    Ration Entry
                    <div class="page-title-subheading">Add Ration Information in system.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Ration Entry</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ration_details.php">
                <span>Ration List</span>
            </a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="ration_add" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>No. of Bags</label>
                                <input type="number" class="form-control-sm form-control" name="total_bags" required>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Status</label>
                                <select class="mb-2 form-control-sm form-control" name="status" required>
                                    <option value="pending" selected>Pending</option>
                                    <option value="received">Received</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Order Date</label>
                                <input type="date" class="form-control-sm form-control" name="order_date" required>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Delivery Date (Expected)</label>
                                <input type="date" class="form-control-sm form-control" name="delivery_date" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-2">
                                <label>Advance</label>
                                <input type="number" class="form-control-sm form-control advance" name="advance" required>
                            </div>
                            
                            <div class="col-md-3 mb-2">
                                <label>Balance</label>
                                <input type="number" class="form-control-sm form-control balance" name="balance">
                            </div>
                            
                            <div class="col-md-3 mb-2">
                                <label>Total Cost</label>
                                <input type="number" class="form-control-sm form-control total_cost" name="total_cost" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 mb-2">
                                <label>Remarks</label>
                                <textarea class="form-control-sm form-control" name="remarks"></textarea>
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
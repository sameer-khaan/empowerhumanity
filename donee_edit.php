<?php
    include('inc/config.php');
    include('inc/header.php');

    if(!isset($_REQUEST['id'])){
        redirect('full_view.php');
        exit();
    }

    $table = "tbl_donees";
    $where = "id = '".$_REQUEST['id']."'";
    $res = check_table($table,$where);
    if(mysqli_num_rows($res) == 0){
        redirect('full_view.php');
        exit();
    }
    $doneesDetail = mysqli_fetch_assoc($res);

    $sql = "SELECT * FROM tbl_users WHERE organization_id='".$organizationId."' GROUP BY id ORDER BY type";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_assoc($res)){
        $userList[] = $row;
    }

    $sql = "SELECT distinct(delivery_status) as 'status' FROM tbl_donees_distribution WHERE delivery_status != ''";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_assoc($res)){
        $statusList[] = $row;
    }

    $table = "tbl_donees_distribution";
    $where = "donee_id = '".$_REQUEST['id']."' ORDER BY delivery_date DESC, organization_id DESC";
    $rationDetail = check_table($table,$where);
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
                    Update Donee Detail
                    <div class="page-title-subheading">Update Donee Information in system.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Update Donee</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="donee_add.php">
                <span>Add New Donee</span>
            </a>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Personal Info</h5>
                    <form id="donee_edit" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label>Name</label>
                                <input type="text" class="form-control-sm form-control" name="name" value="<?php echo $doneesDetail['name'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Contact Number</label>
                                <input type="text" class="form-control-sm form-control" name="number" value="<?php echo $doneesDetail['number'] ?>" required>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label>CNIC</label>
                                <input type="text" class="form-control-sm form-control" name="cnic" value="<?php echo $doneesDetail['cnic'] ?>">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Head Count</label>
                                <input type="text" class="form-control-sm form-control" name="headcount" value="<?php echo $doneesDetail['headcount'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <label>Address</label>
                                <textarea class="form-control-sm form-control" name="address"><?php echo $doneesDetail['address'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="hidden" name="id" value="<?php echo $doneesDetail['id'] ?>">
                                <label class="error text-danger"></label>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Add Ration Detail</h5>
                    <form id="donee_ration_add" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Delivery Date (Expected)</label>
                                <input type="date" class="form-control-sm form-control" name="delivery_date" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Case Reference</label>
                                <input type="text" class="form-control-sm form-control" name="case_reference" value="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Total Bags</label>
                                <input type="number" class="form-control-sm form-control" name="total_donation" value="" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label>Delivery Status</label>
                                <select class="mb-2 form-control-sm form-control" name="delivery_status" required>
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Invalid">Invalid</option>
                                    <option value="No Response">No Response</option>
                                    <option value="Already Received">Already Received</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label>Assign to</label>
                                <select class="form-control-sm form-control" name="delivered_by">
                                    <option value="" selected></option>
                                    <?php  foreach($userList as $value){ ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['name']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <label>Remarks</label>
                                <textarea class="form-control-sm form-control" name="remarks"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="hidden" name="donee_id" value="<?php echo $doneesDetail['id'] ?>">
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
        
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body pt-0">
                    <?php if(isset($_REQUEST['edit_mode'])){ ?>
                    <div class="card-header mb-3">
                        <h5 class="card-title">Edit Ration Details</h5>
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <a href="donee_edit.php?id=<?php echo $_REQUEST['id'] ?>"><button class="btn btn-focus"> Done</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="my-2 table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Delivery Date</th>
                                <th class="text-center">Bags</th>
                                <th>Status</th>
                                <th>Case Reference</th>
                                <th>Assign to</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($rationDetail) > 0){
                                while($row = mysqli_fetch_assoc($rationDetail)){
                                    if($_SESSION['donation']['organization_id'] == $row['organization_id']){
                                    ?>
                                    <tr>
                                        <td><input type="date" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivery_date' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['delivery_date'] ?>"></td>
                                        <td><input style="width:50px" type="text" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='total_donation' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['total_donation'] ?>"></td>
                                        <td>
                                            <select style="width: auto;" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivery_status' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                <option value="<?php echo $row['delivery_status'] ?>" selected><?php echo $row['delivery_status'] ?></option>
                                                <?php  foreach($statusList as $value){ ?>
                                                <option value="<?php echo $value['status'] ?>"><?php echo $value['status'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='case_reference' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['case_reference'] ?>"></td>
                                        <td>
                                            <select style="width: auto;" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivered_by' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                <option value="<?php echo $row['delivered_by'] ?>" selected><?php echo getName($row['delivered_by']) ?></option>
                                                <option value="" style="color:red;">Remove Assignment</option>
                                                <?php  foreach($userList as $value){ ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['name']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><textarea class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='remarks' data-where='id' data-id='<?php echo $row['id'] ?>'><?php echo $row['remarks'] ?></textarea></td>
                                    </tr>
                                    <?php
                                    }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } else { ?>
                    <div class="card-header mb-3">
                        <h5 class="card-title">Ration History</h5>
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <a href="donee_edit.php?id=<?php echo $_REQUEST['id'] ?>&edit_mode=1"><button class="btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-pen btn-icon-wrapper"> </i> Edit Mode</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="my-2 table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Delivery Date</th>
                                <th class="text-center">Bags</th>
                                <th>Status</th>
                                <th>Case Reference</th>
                                <th>Assign to</th>
                                <th>Organization</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($rationDetail) > 0){
                                while($row = mysqli_fetch_assoc($rationDetail)){
                                ?>
                                <tr>
                                    <th><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></th>
                                    <td class="text-center"><?php echo $row['total_donation'] ?></td>
                                    <td><?php echo $row['delivery_status'] ?></td>
                                    <td><?php echo ($_SESSION['donation']['organization_id'] == $row['organization_id'])?$row['case_reference']:'' ?></td>
                                    <td><?php echo ($_SESSION['donation']['organization_id'] == $row['organization_id'])?getName($row['delivered_by']):'' ?></td>
                                    <td><?php echo getNameOrg($row['organization_id']) ?></td>
                                    <td><small><?php echo ($_SESSION['donation']['organization_id'] == $row['organization_id'])?$row['remarks']:'' ?></small></td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
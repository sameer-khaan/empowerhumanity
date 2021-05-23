<?php
    include('inc/config.php');
    include('inc/header.php');
    
    if(!isset($_REQUEST['status'])){
        redirect('assign_to.php?status=Pending');
        exit();
    }

    $table = "tbl_donees a, tbl_donees_distribution b";
    $where = "a.id = b.donee_id AND b.delivery_status = '".$_REQUEST['status']."' AND b.organization_id='".$organizationId."' ORDER BY b.delivery_date DESC";
    $doneesDetail = check_table($table,$where);

    $where = "a.id = b.donee_id AND b.delivery_status like '%pending%' AND b.organization_id='".$organizationId."'";
    $pendingsDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%delivered%' AND b.organization_id='".$organizationId."'";
    $deliveredDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%invalid%' AND b.organization_id='".$organizationId."'";
    $invalidDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%response%' AND b.organization_id='".$organizationId."'";
    $noresponseDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%receive%' AND b.organization_id='".$organizationId."'";
    $alreadyreceivedDetail = check_table($table,$where);

    $sql = "SELECT * FROM tbl_users WHERE organization_id='".$organizationId."' GROUP BY id ORDER BY type";
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
                    <i class="pe-7s-display2 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Manage Deliveries Assignment
                    <div class="page-title-subheading">Rations Assign to Members & Representative to Deliver.</div>
                </div>
            </div>
        </div>
    </div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>Manage Deliveries</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" href="delivery_view.php?status=Pending">
                <span>My Deliveries</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination mb-4">
                        <li class="page-item <?php if($_REQUEST['status'] == 'Pending'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="assign_to.php?status=Pending<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Pending (<?php echo mysqli_num_rows($pendingsDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Delivered'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="assign_to.php?status=Delivered<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Delivered (<?php echo mysqli_num_rows($deliveredDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Invalid'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="assign_to.php?status=Invalid<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Invalid (<?php echo mysqli_num_rows($invalidDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'No Response'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="assign_to.php?status=No Response<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">No Response (<?php echo mysqli_num_rows($noresponseDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Already Received'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="assign_to.php?status=Already Received<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Already Received (<?php echo mysqli_num_rows($alreadyreceivedDetail) ?>)</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body pt-0">
                            <?php if(isset($_REQUEST['edit_mode'])){ ?>
                            <div class="card-header mb-3">
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <a href="assign_to.php?status=<?php echo $_REQUEST['status'] ?>"><button class="btn btn-focus"> Done</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-sm table-bordered" id="myTable1">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Bags</th>
                                        <th>Case Reference</th>
                                        <th>Assign To</th>
                                        <th>Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($doneesDetail) > 0){
                                        while($row = mysqli_fetch_assoc($doneesDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><input type="date" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivery_date' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['delivery_date'] ?>"></th>
                                            <td>
                                                <b><?php echo ucwords($row['name']) ?></b><br>
                                                <small>CNIC: <?php echo $row['cnic'] ?></small>
                                            </td>
                                            <td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['total_donation'] ?></td>
                                            <td><?php echo $row['case_reference'] ?></td>
                                            <td>
                                                <select style="width: auto;" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivered_by' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['delivered_by'] ?>" selected><?php echo getName($row['delivered_by']) ?></option>
                                                    <option value="" style="color:red;">Remove Assignment</option>
                                                    <?php  foreach($userList as $value){ ?>
                                                    <option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['name']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><small><?php echo $row['remarks'] ?></small></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } else { ?>
                            <div class="card-header mb-3">
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <a href="assign_to.php?status=<?php echo $_REQUEST['status'] ?>&edit_mode=1"><button class="btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-pen btn-icon-wrapper"> </i> Edit Mode</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-sm table-striped table-bordered" id="myTable2">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Bags</th>
                                        <th>Case Reference</th>
                                        <th>Assign To</th>
                                        <th>Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($doneesDetail) > 0){
                                        while($row = mysqli_fetch_assoc($doneesDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></th>
                                            <td>
                                                <b><?php echo ucwords($row['name']) ?></b><br>
                                                <small>CNIC: <?php echo $row['cnic'] ?></small>
                                            </td>
                                            <td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['total_donation'] ?></td>
                                            <td><?php echo $row['case_reference'] ?></td>
                                            <td><?php echo getName($row['delivered_by']) ?></td>
                                            <td><small><?php echo $row['remarks'] ?></small></td>
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
    </div>
</div>
<?php
    include('inc/footer.php');
?>
<script type="text/javascript">
	$(function(){
        $('#myTable1').DataTable({
            "aaSorting" : [],
            "pageLength": 50
		});
        $('#myTable2').DataTable({
            "aaSorting" : [],
            "pageLength": 50
		});
	});
</script>
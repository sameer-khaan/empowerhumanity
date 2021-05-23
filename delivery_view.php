<?php
    include('inc/config.php');
    include('inc/header.php');

    if(!isset($_REQUEST['status'])){
        redirect('delivery_view.php?status=Pending');
        exit();
    }

    $table = "tbl_donees a, tbl_donees_distribution b";
    $where = "a.id = b.donee_id AND b.delivery_status = '".$_REQUEST['status']."' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."' ORDER BY b.delivery_date DESC";
    $doneesDetail = check_table($table,$where);

    $where = "a.id = b.donee_id AND b.delivery_status like '%pending%' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."'";
    $pendingsDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%delivered%' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."'";
    $deliveredDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%invalid%' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."'";
    $invalidDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%response%' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."'";
    $noresponseDetail = check_table($table,$where);
    $where = "a.id = b.donee_id AND b.delivery_status like '%receive%' AND b.delivered_by = '".$loggedInPersonId."' AND b.organization_id='".$organizationId."'";
    $alreadyreceivedDetail = check_table($table,$where);

    $sql = "SELECT distinct(delivery_status) as 'status' FROM tbl_donees_distribution WHERE delivery_status != ''";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_assoc($res)){
        $statusList[] = $row;
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
                    My Deliveries
                    <div class="page-title-subheading">Assigned Ration Deliveries.</div>
                </div>
            </div>
        </div>
    </div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <?php if($_SESSION['donation']['type'] == 'admin'){ ?>
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>My Deliveries</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" href="assign_to.php?status=Pending">
                <span>Manage Deliveries</span>
            </a>
        </li>
        <?php } elseif($_SESSION['donation']['type'] == 'member' || $_SESSION['donation']['type'] == 'representative') { ?>
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>My Deliveries</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" href="dashboard.php">
                <span>My Stats</span>
            </a>
        </li>
        <?php } ?>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination mb-4">
                        <li class="page-item <?php if($_REQUEST['status'] == 'Pending'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="delivery_view.php?status=Pending<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Pending (<?php echo mysqli_num_rows($pendingsDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Delivered'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="delivery_view.php?status=Delivered<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Delivered (<?php echo mysqli_num_rows($deliveredDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Invalid'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="delivery_view.php?status=Invalid<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Invalid (<?php echo mysqli_num_rows($invalidDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'No Response'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="delivery_view.php?status=No Response<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">No Response (<?php echo mysqli_num_rows($noresponseDetail) ?>)</a></li>
                        <li class="page-item <?php if($_REQUEST['status'] == 'Already Received'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="delivery_view.php?status=Already Received<?php if(isset($_REQUEST['edit_mode'])){ echo '&edit_mode=1'; }?>">Already Received (<?php echo mysqli_num_rows($alreadyreceivedDetail) ?>)</a></li>
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
                                        <a href="delivery_view.php?status=<?php echo $_REQUEST['status'] ?>"><button class="btn btn-focus"> Done</button></a>
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
                                        <th>Status</th>
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
                                                <small>CNIC: <input type="text" class="form-control-sm form-control updateInput" data-table='tbl_donees' data-field='cnic' data-where='id' data-id='<?php echo $row['donee_id'] ?>' value="<?php echo $row['cnic'] ?>"></td></small>
                                            </td>
                                            <td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['total_donation'] ?></td>
                                            <td>
                                                <select style="width: auto;" class="form-control-sm form-control updateInput" data-table='tbl_donees_distribution' data-field='delivery_status' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['delivery_status'] ?>" selected><?php echo $row['delivery_status'] ?></option>
                                                    <?php  foreach($statusList as $value){ ?>
                                                    <option value="<?php echo $value['status'] ?>"><?php echo $value['status'] ?></option>
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
                                        <a href="delivery_view.php?status=<?php echo $_REQUEST['status'] ?>&edit_mode=1"><button class="btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-pen btn-icon-wrapper"> </i> Edit Mode</button></a>
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
                                        <th>Status</th>
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
                                            <th scope="row"><?php echo $row['delivery_status'] ?></th>
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
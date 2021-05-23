<?php
    include('inc/config.php');
    include('inc/header.php');

    $table = "tbl_donors";
    $where = "organization_id='".$organizationId."' ORDER BY date DESC";
    $donorDetail = check_table($table,$where);

    $table = "tbl_users";
    $where = "type in ('admin','member') AND organization_id='".$organizationId."' ORDER BY name";
    $res = check_table($table,$where);
    while($row = mysqli_fetch_assoc($res)){
        $userList[] = $row;
    }
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cash icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Donors Detail
                    <div class="page-title-subheading">Complete list of our donors.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Funds</div>
                        <div class="widget-subheading">Amount Collection</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><span><?php echo total_funds() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Utilization</div>
                        <div class="widget-subheading">Amount Spent</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success"><span><?php echo utilize_funds() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">In Hand</div>
                        <div class="widget-subheading">Amount Left</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary"><span><?php echo total_funds() - utilize_funds() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider mt-0" style="margin-bottom: 10px;"></div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Donors List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="donor_add.php">
                <span>Add New Donor</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body pt-0">
                            <?php if(isset($_REQUEST['edit_mode'])){ ?>
                            <div class="card-header mb-3">
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <a href="donor_details.php"><button class="btn btn-focus"> Done</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Received Date</th>
                                        <th>Donor Name</th>
                                        <th>Mode</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Amount Handler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($donorDetail) > 0){
                                        while($row = mysqli_fetch_assoc($donorDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo date_format(date_create($row['date']),'d-F') ?></th>
                                            <td><input type="text" class="form-control-sm form-control updateInput" data-table='tbl_donors' data-field='name' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo ucwords($row['name']) ?>"></td>
                                            <td><?php echo $row['donation_mode'] ?></td>
                                            <td><?php echo $row['donation_type'] ?></td>
                                            <td><input style="width:70px;" type="number" class="form-control-sm form-control updateInput" data-table='tbl_donors' data-field='donation_amount' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['donation_amount'] ?>"></td>
                                            <td>
                                                <select class="form-control-sm form-control updateInput" data-table='tbl_donors' data-field='user_id' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['user_id'] ?>" selected><?php echo getName($row['user_id']) ?></option>
                                                    <?php  foreach($userList as $value){ if($row['user_id'] != $value['id']){ ?>
                                                    <option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['name']) ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </td>
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
                                        <a href="?edit_mode=1"><button class="btn-icon btn-icon-only btn btn-outline-success"><i class="pe-7s-pen btn-icon-wrapper"> </i> Edit Mode</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-striped table-bordered" id="myTable1">
                                    <thead>
                                    <tr>
                                        <th>Received Date</th>
                                        <th>Donor Name</th>
                                        <th>Mode</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Amount Handler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($donorDetail) > 0){
                                        while($row = mysqli_fetch_assoc($donorDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo date_format(date_create($row['date']),'d-F') ?></th>
                                            <td><?php echo ucwords($row['name']) ?></td>
                                            <td><?php echo $row['donation_mode'] ?></td>
                                            <td><?php echo $row['donation_type'] ?></td>
                                            <th scope="row"><?php echo $row['donation_amount'] ?></th>
                                            <td><?php echo getName($row['user_id']) ?></td>
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
	});
</script>
<?php
    include('inc/config.php');
    include('inc/header.php');
    
    $table = "tbl_ration";
    $where = "organization_id='".$organizationId."' ORDER BY delivery_date DESC";
    $rationDetail = check_table($table,$where);
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cart icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Ration Details
                    <div class="page-title-subheading">Complete list of ration bags.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Bags</div>
                        <div class="widget-subheading">Bags Purchased</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><span><?php echo total_bags() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Utilization</div>
                        <div class="widget-subheading">Bags Delivered</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success"><span><?php echo utilize_bags() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">In Stock</div>
                        <div class="widget-subheading">Bags Left</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary"><span><?php echo total_bags() - utilize_bags() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider mt-0" style="margin-bottom: 10px;"></div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Ration List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ration_add.php">
                <span>New Ration Entry</span>
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
                                        <a href="ration_details.php"><button class="btn btn-focus"> Done</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-sm table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Total Bags</th>
                                        <th>Status</th>
                                        <th>Advance</th>
                                        <th>Balance</th>
                                        <th>Total Cost</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($rationDetail) > 0){
                                        while($row = mysqli_fetch_assoc($rationDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['total_bags'] ?></th>
                                            <td>
                                                <select class="form-control-sm form-control updateInput" data-table='tbl_ration' data-field='status' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['status'] ?>" selected><?php echo ucfirst($row['status']) ?></option>
                                                    <option value="pending">Pending</option>
                                                    <option value="received">Received</option>
                                                </select>
                                            </td>
                                            <td><input style="width:70px;" type="number" class="form-control-sm form-control updateInput advance<?php echo $row['id'] ?>" data-table='tbl_ration' data-field='advance' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['advance'] ?>"></td>
                                            <td><input style="width:70px;" type="number" class="form-control-sm form-control updateInput balance<?php echo $row['id'] ?>" data-table='tbl_ration' data-field='balance' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['balance'] ?>"></td>
                                            <th scope="row" class="total_cost<?php echo $row['id'] ?>"><?php echo $row['total_cost'] ?></th>
                                            <td><input type="date" class="form-control-sm form-control updateInput" data-table='tbl_ration' data-field='order_date' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['order_date'] ?>"></td>
                                            <td><input type="date" class="form-control-sm form-control updateInput" data-table='tbl_ration' data-field='delivery_date' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['delivery_date'] ?>"></td>
                                            <td><textarea class="form-control-sm form-control updateInput" data-table='tbl_ration' data-field='remarks' data-where='id' data-id='<?php echo $row['id'] ?>'><?php echo $row['remarks'] ?></textarea></td>
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
                                <table class="mb-0 table table-sm table-striped table-bordered" id="myTable1">
                                    <thead>
                                    <tr>
                                        <th>Total Bags</th>
                                        <th>Status</th>
                                        <th>Advance</th>
                                        <th>Balance</th>
                                        <th>Total Cost</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($rationDetail) > 0){
                                        while($row = mysqli_fetch_assoc($rationDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['total_bags'] ?></th>
                                            <td><?php echo ucfirst($row['status']) ?></td>
                                            <td><?php echo $row['advance'] ?></td>
                                            <td><?php echo $row['balance'] ?></td>
                                            <th scope="row"><?php echo $row['total_cost'] ?></th>
                                            <td><?php echo date_format(date_create($row['order_date']),'d/m') ?></td>
                                            <td><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></td>
                                            <td><?php echo $row['remarks'] ?></td>
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
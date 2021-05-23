<?php
    include('inc/config.php');
    include('inc/header.php');
    
    if(!isset($_REQUEST['date'])){
        redirect('date_view.php?date='.date('Y-m-d'));
        exit();
    }

    $table = "tbl_donees a, tbl_donees_distribution b";
    $where = "a.id = b.donee_id AND b.delivery_date = '".$_REQUEST['date']."' AND b.organization_id='".$organizationId."' ORDER BY b.id DESC";
    $doneesDetail = check_table($table,$where);

    $dateList = array();
    $sql = "SELECT delivery_date FROM tbl_donees_distribution WHERE organization_id='".$organizationId."' GROUP BY delivery_date ORDER BY delivery_date DESC";
    $res = $conn->query($sql);
    while($row = mysqli_fetch_assoc($res)){
        $dateList[] = $row;
    }
    
    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$_REQUEST['date']."' AND delivery_status in ('Delivered','Pending') AND organization_id='".$organizationId."'";
    $row1 = mysqli_fetch_assoc($conn->query($sql1));
    $total_bags = !empty($row1['total'])?$row1['total']:'1';
    
    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$_REQUEST['date']."' AND delivery_status='Delivered' AND organization_id='".$organizationId."'";
    $row1 = mysqli_fetch_assoc($conn->query($sql1));
    $bags_delivered = $row1['total'];
    
    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$_REQUEST['date']."' AND delivery_status='Pending' AND organization_id='".$organizationId."'";
    $row1 = mysqli_fetch_assoc($conn->query($sql1));
    $bags_pending = $row1['total'];
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-date icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Ration Status by Date (<?php echo date_format(date_create($_REQUEST['date']),'d-F') ?>)
                    <div class="page-title-subheading">Pending and Delivered details of Rations by Date.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <ul class="list-group" style="height: 184px;overflow-y: auto;">
                    <?php $i=1; foreach($dateList as $value){ ?>
                    <li class="list-group-item <?php if($_REQUEST['date'] == $value['delivery_date']){ echo 'active'; } ?>">
                        <a style="<?php if($_REQUEST['date'] == $value['delivery_date']){ echo 'color:#fff'; } ?>" href="date_view.php?date=<?php echo $value['delivery_date'] ?>"><?php echo date_format(date_create($value['delivery_date']),'d/m/Y') ?></a>
                    </li>
                    <?php $i = $i + 1; } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item pt-2">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Bags Delivered</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers fsize-2 text-success"><?php echo $bags_delivered ?></div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper mt-0">
                                    <div class="progress-bar-xs progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?php echo ($bags_delivered/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_delivered/$total_bags)*100 ?>%;"><?php echo round(($bags_delivered/$total_bags)*100) ?> %</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item pt-2">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Bags Pending</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers fsize-2 text-danger"><?php echo $bags_pending ?></div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper mt-0">
                                    <div class="progress-bar-lg progress-bar-animated progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="<?php echo ($bags_pending/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_pending/$total_bags)*100 ?>%;"><?php echo round(($bags_pending/$total_bags)*100) ?> %</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="mb-0 table table-sm table-striped table-bordered" id="myTable1">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Bags</th>
                                <th>Family Count</th>
                                <th>Case Reference</th>
                                <th>Assign To</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($doneesDetail) > 0){
                                while($row = mysqli_fetch_assoc($doneesDetail)){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['delivery_status'] ?></th>
                                    <td>
                                        <b><?php echo ucwords($row['name']) ?></b><br>
                                        <small>CNIC: <?php echo $row['cnic'] ?></small>
                                    </td>
                                    <td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td class="text-center"><?php echo $row['total_donation'] ?></td>
                                    <td><?php echo $row['headcount'] ?></td>
                                    <td><?php echo $row['case_reference'] ?></td>
                                    <td><?php echo getName($row['delivered_by']) ?></td>
                                    <td><small><?php echo $row['remarks'] ?></small></td>
                                    <td class="text-center">
                                        <a href="donee_edit.php?id=<?php echo $row['donee_id'] ?>">
                                            <button class="btn-icon btn-icon-only btn btn-outline-success p-1"><i class="pe-7s-pen btn-icon-wrapper"> </i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
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
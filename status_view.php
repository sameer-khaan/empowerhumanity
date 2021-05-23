<?php
    include('inc/config.php');
    include('inc/header.php');
    
    if(!isset($_REQUEST['status'])){
        redirect('status_view.php?status=Pending');
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
                    Ration Delivery Status
                    <div class="page-title-subheading">Pending and Delivered details of Rations.</div>
                </div>
            </div>
        </div>
    </div>

    <ul class="pagination mb-4">
        <li class="page-item <?php if($_REQUEST['status'] == 'Pending'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="status_view.php?status=Pending">Pending (<?php echo mysqli_num_rows($pendingsDetail) ?>)</a></li>
        <li class="page-item <?php if($_REQUEST['status'] == 'Delivered'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="status_view.php?status=Delivered">Delivered (<?php echo mysqli_num_rows($deliveredDetail) ?>)</a></li>
        <li class="page-item <?php if($_REQUEST['status'] == 'Invalid'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="status_view.php?status=Invalid">Invalid (<?php echo mysqli_num_rows($invalidDetail) ?>)</a></li>
        <li class="page-item <?php if($_REQUEST['status'] == 'No Response'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="status_view.php?status=No Response">No Response (<?php echo mysqli_num_rows($noresponseDetail) ?>)</a></li>
        <li class="page-item <?php if($_REQUEST['status'] == 'Already Received'){ echo 'active'; } ?>"><a role="tab" class="page-link" href="status_view.php?status=Already Received">Already Received (<?php echo mysqli_num_rows($alreadyreceivedDetail) ?>)</a></li>
    </ul>
    
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="mb-0 table table-sm table-striped table-bordered" id="myTable1">
                            <thead>
                            <tr>
                                <th>Date</th>
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
                                    <th scope="row"><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></th>
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
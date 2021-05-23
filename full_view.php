<?php
    include('inc/config.php');
    include('inc/header.php');

    $loggedInPersonId =	$_SESSION['donation']['id'];
    $table = "tbl_donees";
    $where = "1 ORDER BY date DESC";
    $doneesDetail = check_table($table,$where);
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Donees List
                    <div class="page-title-subheading">Complete List of donees.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Cases</div>
                        <div class="widget-subheading">No. of Cases</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger"><span><?php echo total_cases() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Cases Covered</div>
                        <div class="widget-subheading">Rations Delivered</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success"><span><?php echo covered_cases() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider mt-0" style="margin-bottom: 10px;"></div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Donees List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="donee_add.php">
                <span>Add New Donee</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="mb-0 table table-sm table-striped table-bordered" id="myTable1">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>CNIC</th>
                                        <th>Address</th>
                                        <th>Family Count</th>
                                        <th>Ration Details</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($doneesDetail) > 0){
                                        while($row = mysqli_fetch_assoc($doneesDetail)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo ucwords($row['name']) ?></b></td>
                                            <td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
                                            <td><?php echo $row['cnic'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['headcount'] ?></td>
                                            <td class="text-center">
                                                <button class="btn-icon btn-icon-only btn btn-outline-primary p-1 ration_view" data-id='<?php echo $row['id'] ?>' data-toggle="modal" data-target="#rationModal"><i class="pe-7s-search btn-icon-wrapper"> </i></button>
                                            </td>
                                            <td class="text-center">
                                                <a href="donee_edit.php?id=<?php echo $row['id'] ?>">
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
    </div>
</div>
<?php
    include('inc/footer.php');
?>
<script type="text/javascript">
	$(function(){
        $('#myTable1').DataTable({
            "aaSorting" : [],
            "pageLength": 100
		});
	});
</script>
<?php
    include('inc/config.php');
    include('inc/header.php');
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-rocket icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                <?php echo getNameOrg($organizationId); ?>
                    <div class="page-title-subheading">Stats and Summary</div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Funds</div>
                        <div class="widget-subheading">Amount donated</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers"><span><?php echo total_funds() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Ration Bags</div>
                        <div class="widget-subheading">Ration we delivered</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers"><span><?php echo utilize_bags() ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Families Covered</div>
                        <div class="widget-subheading">People we helped</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers"><span><?php echo round(utilize_bags() / 1.3) ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider mt-0 mb-4" style="margin-bottom: 10px;"></div> -->

    <?php if($_SESSION['donation']['type'] == 'admin' || $_SESSION['donation']['type'] == 'member'){ ?>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Daily Full Stats</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>My Stats</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" href="delivery_view.php?status=Pending">
                <span>My Deliveries</span>
            </a>
        </li>
    </ul>
    <?php } elseif($_SESSION['donation']['type'] == 'representative') { ?>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>My Stats</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" href="delivery_view.php?status=Pending">
                <span>My Deliveries</span>
            </a>
        </li>
    </ul>
    <?php } ?>

    <div class="tab-content">
        <?php if($_SESSION['donation']['type'] == 'admin' || $_SESSION['donation']['type'] == 'member'){ ?>
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Daily Donation Stats
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-right">Date</th>
                                    <th class="text-center">Total Cases</th>
                                    <th class="text-center">Total Bags</th>
                                    <th class="text-center">Bags Delivered</th>
                                    <th class="text-center">Bags Pending</th>
                                    <th>Other</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT delivery_date FROM tbl_donees_distribution WHERE organization_id='".$organizationId."' GROUP BY delivery_date ORDER BY delivery_date DESC";
                                $res = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($res)){
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $total_cases = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status in ('Delivered','Pending') AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $total_bags = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Delivered' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $bags_delivered = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Pending' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $bags_pending = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Invalid' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_invalid = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='No Response' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_noresponse = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Already Received' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_alreadyreceived = $row1['total'];
                                ?>
                                <tr>
                                    <th class="text-muted text-right"><a href="date_view.php?date=<?php echo $row['delivery_date'] ?>"><?php echo date_format(date_create($row['delivery_date']),'d-F') ?></a></th>
                                    <td class="text-center"><?php echo $total_cases ?></td>
                                    <td class="text-center">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-left">
                                                <div class="widget-heading text-center"><?php echo $total_bags ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content-outer px-3">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-1 text-success"><?php echo round(($bags_delivered/$total_bags)*100) ?> %</div>
                                                </div>
                                                <div class="widget-content-right w-100">
                                                    <div class="progress-bar-xs progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo ($bags_delivered/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_delivered/$total_bags)*100 ?>%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-5 text-right"><?php echo $bags_delivered ?> Delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content-outer px-3">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-1 text-danger"><?php echo round(($bags_pending/$total_bags)*100) ?> %</div>
                                                </div>
                                                <div class="widget-content-right w-100">
                                                    <div class="progress-bar-xs progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?php echo ($bags_pending/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_pending/$total_bags)*100 ?>%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-5 text-right"><?php echo $bags_pending ?> Pending</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-subheading opacity-7">Invalid - <?php echo $case_invalid ?></div>
                                                    <div class="widget-subheading opacity-7">No Response - <?php echo $case_noresponse ?></div>
                                                    <div class="widget-subheading opacity-7">Already Received - <?php echo $case_alreadyreceived ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="tab-pane tabs-animation fade <?php if($_SESSION['donation']['type'] == 'representative'){ echo 'show active'; } ?>" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">My Delivery Stats
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-right">Date</th>
                                    <th class="text-center">Total Cases</th>
                                    <th class="text-center">Total Bags</th>
                                    <th class="text-center">Bags Delivered</th>
                                    <th class="text-center">Bags Pending</th>
                                    <th>Other</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT delivery_date FROM tbl_donees_distribution WHERE delivered_by = '".$loggedInPersonId."' AND organization_id='".$organizationId."' GROUP BY delivery_date ORDER BY delivery_date DESC";
                                $res = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($res)){
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $total_cases = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status in ('Delivered','Pending') AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $total_bags = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status='Delivered' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $bags_delivered = $row1['total'];
                                    
                                    $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status='Pending' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $bags_pending = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status='Invalid' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_invalid = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status='No Response' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_noresponse = $row1['total'];
                                    
                                    $sql1 = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_date='".$row['delivery_date']."' AND delivered_by = '".$loggedInPersonId."' AND delivery_status='Already Received' AND organization_id='".$organizationId."'";
                                    $row1 = mysqli_fetch_assoc($conn->query($sql1));
                                    $case_alreadyreceived = $row1['total'];
                                ?>
                                <tr>
                                    <th class="text-muted text-right"><?php echo date_format(date_create($row['delivery_date']),'d-F') ?></th>
                                    <td class="text-center"><?php echo $total_cases ?></td>
                                    <td class="text-center">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-left">
                                                <div class="widget-heading text-center"><?php echo $total_bags ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content-outer px-3">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-1 text-success"><?php echo round(($bags_delivered/$total_bags)*100) ?> %</div>
                                                </div>
                                                <div class="widget-content-right w-100">
                                                    <div class="progress-bar-xs progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo ($bags_delivered/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_delivered/$total_bags)*100 ?>%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-5 text-right"><?php echo $bags_delivered ?> Delivered</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content-outer px-3">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-1 text-danger"><?php echo round(($bags_pending/$total_bags)*100) ?> %</div>
                                                </div>
                                                <div class="widget-content-right w-100">
                                                    <div class="progress-bar-xs progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?php echo ($bags_pending/$total_bags)*100 ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($bags_pending/$total_bags)*100 ?>%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-5 text-right"><?php echo $bags_pending ?> Pending</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-subheading opacity-7">Invalid - <?php echo $case_invalid ?></div>
                                                    <div class="widget-subheading opacity-7">No Response - <?php echo $case_noresponse ?></div>
                                                    <div class="widget-subheading opacity-7">Already Received - <?php echo $case_alreadyreceived ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- tab-content-end -->
</div>
<?php
    include('inc/footer.php');
?>
<?php
    include('inc/config.php');
    include('inc/header.php');
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <!-- <i class="pe-7s-rocket icon-gradient bg-premium-dark">
                    </i> -->
                    <img width="110%" class="rounded-circle" src="assets/images/favicon.png" alt="">
                </div>
                <div>
                    Join Hands with us and Make a Difference
                    <div class="page-title-subheading">Share and Support</div>
                </div>
			</div>
			<div class="page-title-actions">
				<div class="d-inline-block dropdown">
                    <div class="search-wrapper active mx-auto" style="width: 350px;">
                        <div class="input-holder mb-3" style="width: 350px;">
                            <form id="search_form" action="POST">
                                <input type="text" name="query" class="search-input" placeholder="Search Record by CNIC/Phone Number" required style="height: 44px;margin-top: -12px;">
                                <button type="submit" class="search-icon"><span></span></button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <!-- <a href="add_record.php" class="mx-1">
                            <button type="button" class="btn-shadow btn btn-success">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-pen fa-w-20"></i>
                                </span>
                                Add New Record
                            </button>
                        </a> -->
                        <a href="login.php" class="mx-1">
                            <button type="button" class="btn-shadow btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-user fa-w-20"></i>
                                </span>
                                Portal Login
                            </button>
                        </a>
                    </div>
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
    </div> -->

    <div class="divider mt-0 mb-4" style="margin-bottom: 10px;"></div>

    <!-- <div class="row">
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
                        </tr>
                        </thead>
                        <tbody>
						<?php
						$sql = "SELECT delivery_date FROM tbl_donees GROUP BY delivery_date ORDER BY delivery_date DESC";
						$res = $conn->query($sql);
                        while($row = mysqli_fetch_assoc($res)){
                            $sql1 = "SELECT count(id) as 'total' FROM tbl_donees WHERE delivery_date='".$row['delivery_date']."'";
                            $row1 = mysqli_fetch_assoc($conn->query($sql1));
		                    $total_cases = $row1['total'];
                            
                            $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees WHERE delivery_date='".$row['delivery_date']."' AND delivery_status in ('Delivered','Pending')";
                            $row1 = mysqli_fetch_assoc($conn->query($sql1));
		                    $total_bags = $row1['total'];
                            
                            $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Delivered'";
                            $row1 = mysqli_fetch_assoc($conn->query($sql1));
		                    $bags_delivered = $row1['total'];
                            
                            $sql1 = "SELECT sum(total_donation) as 'total' FROM tbl_donees WHERE delivery_date='".$row['delivery_date']."' AND delivery_status='Pending'";
                            $row1 = mysqli_fetch_assoc($conn->query($sql1));
		                    $bags_pending = $row1['total'];
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
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-6 mx-auto text-center" id="show_data">
            <img src="assets/images/donate_now.jfif" alt="Empower Human" style="width:100%">
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
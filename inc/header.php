<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Empowering Humanity</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="COVID-19 Drive, Join Hands with us and Make a Difference.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <link href="./main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>base_url = "<?php echo $base_url; ?>"; </script>
    <script>dashboard_url = "<?php echo $dashboard_url; ?>"; </script>
    <style>
        .hideinput {
            border: none;
            background: none;
            padding: 3px;
        }
        ::-webkit-scrollbar-track {
            border-radius: 0;
            background-color: #ddd;
        }

        ::-webkit-scrollbar {
            width: 6px;
            background-color: #e0dfdf;
            border-radius: 0;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #5278d9de;
        }
    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <?php if(isset($_SESSION['donation'])){ ?>
                    <div class="logo-src"><?php echo getName($_SESSION['donation']['id']) ?></div>
                <?php } else { ?>
                    <div class="logo-src">COVID-19 Drive</div>
                <?php } ?>

                <?php if(isset($_SESSION['donation'])){ ?>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>

            <?php if(isset($_SESSION['donation'])){ ?>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <!-- <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div> -->
                    <?php if($_SESSION['donation']['type'] == 'admin' || $_SESSION['donation']['type'] == 'member'){ ?>
                    <div class="search-wrapper active mx-auto" style="width: 270px;">
                        <div class="input-holder" style="width: 270px;">
                            <form id="search_form" method="POST">
                                <input type="text" name="query" class="search-input" placeholder="Search Donees Record" style="height: 44px;margin-top: -12px;">
                                <button type="submit" class="search-icon" data-toggle="modal" data-target="#searchModal"><span></span></button>
                            </form>
                        </div>
                    </div>
                    <?php } ?>
                    <ul class="header-menu nav" style="opacity: 1;">
                        <?php if($_SESSION['donation']['type'] == 'admin'){ ?>
                        <li class="dropdown nav-item">
                            <a href="organization.php" class="nav-link">
                                <i class="nav-link-icon fa fa-building"></i>
                                Organization
                            </a>
                        </li>
                        <?php } ?>
                        <li class="dropdown nav-item">
                            <a href="settings.php" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/dp.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <?php if($_SESSION['donation']['type'] == 'admin'){ ?>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <a href="organization.php">Organization</a>
                                            </button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <?php } ?>

                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <a href="settings.php">Settings</a>
                                            </button>
                                            <div tabindex="-1" class="dropdown-divider"></div>

                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <a href="javascript://" id="logout">Logout</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="app-main">
        <?php
            preg_match("/donation\/(.*).php/",$_SERVER["PHP_SELF"],$matches);
            $page  		= 	$matches[1];
            $open       =   array("index","add_record","login","forgetPassword","newPassword");
            $admin      = 	array("dashboard","donee_add","donee_edit","delivery_view","date_view","status_view","full_view","donor_add","donor_details","ration_add","ration_details","settings","organization","user_add","user_details","assign_to");
            $member 	= 	array("dashboard","donee_add","donee_edit","delivery_view","date_view","status_view","full_view","donor_add","donor_details","ration_add","ration_details","settings");
            $represent  = 	array("dashboard","delivery_view","settings");
            if(isset($_SESSION['donation'])) {
                $organizationId   =	$_SESSION['donation']['organization_id'];
                $loggedInPersonId =	$_SESSION['donation']['id'];
                if($page == 'index'){
                    redirect('dashboard.php');
                    exit();
                }
                if($_SESSION['donation']['type'] == 'representative'){
                    if(!in_array($page, $represent)){
                        redirect('dashboard.php');
                        exit();
                    }
                }
                elseif($_SESSION['donation']['type'] == 'member'){
                    if(!in_array($page, $member)){
                        redirect('dashboard.php');
                        exit();
                    }
                }
                elseif($_SESSION['donation']['type'] == 'admin'){
                    if(!in_array($page, $admin)){
                        redirect('dashboard.php');
                        exit();
                    }
                }
            }
            else {
                //not login and try to accessing secure pages
                if(!in_array($page, $open)){
                    redirect('login.php');
                    exit();
                }
            }
        ?>

        <?php if(isset($_SESSION['donation'])){ ?>
		<div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar" style="overflow-y: auto;">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboard</li>
                        <li>
                            <a href="dashboard.php" class="<?php echo ($page=='dashboard')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="delivery_view.php?status=Pending" class="<?php echo ($page=='delivery_view')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-display2">
                                </i>My Deliveries
                            </a>
                        </li>
                        <?php if($_SESSION['donation']['type'] == 'admin'){ ?>
                        <li>
                            <a href="assign_to.php?status=Pending" class="<?php echo ($page=='assign_to')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-display2">
                                </i>Manage Deliveries
                            </a>
                        </li>
                        <?php } ?>
                        
                        <?php if($_SESSION['donation']['type'] == 'admin' || $_SESSION['donation']['type'] == 'member'){ ?>
                        <li class="app-sidebar__heading">Donees</li>
                        <li>
                            <a href="full_view.php" class="<?php echo ($page=='full_view')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-user">
                                </i>Donees List
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-filter"></i>
                                Filtered Data
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="status_view.php?status=Pending" class="<?php echo ($page=='status_view')?'mm-active':'' ?>">
                                        <i class="metismenu-icon pe-7s-user">
                                        </i>Status View
                                    </a>
                                </li>
                                <li>
                                    <a href="date_view.php?date=<?php echo date('Y-m-d') ?>" class="<?php echo ($page=='date_view')?'mm-active':'' ?>">
                                        <i class="metismenu-icon pe-7s-edit">
                                        </i>Date View
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="donee_add.php" class="<?php echo ($page=='donee_add')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-pen">
                                </i>Add New Donee
                            </a>
                        </li>
                        
                        <li class="app-sidebar__heading">Ration</li>
                        <li>
                            <a href="ration_details.php" class="<?php echo ($page=='ration_details')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-cart">
                                </i>Ration Details
                            </a>
                        </li>
                        <li>
                            <a href="ration_add.php" class="<?php echo ($page=='ration_add')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-pen">
                                </i>New Ration Entry
                            </a>
                        </li>
                        
                        <li class="app-sidebar__heading">Donors</li>
                        <li>
                            <a href="donor_details.php" class="<?php echo ($page=='donor_details')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-cash">
                                </i>Donors Detail
                            </a>
                        </li>
                        <li>
                            <a href="donor_add.php" class="<?php echo ($page=='donor_add')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-edit">
                                </i>Add New Donor
                            </a>
                        </li>
                        <?php } ?>
                        
                        <?php if($_SESSION['donation']['type'] == 'admin'){ ?>
                        <li class="app-sidebar__heading">Workforce</li>
                        <li>
                            <a href="user_details.php" class="<?php echo ($page=='user_details')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-user">
                                </i>Team List
                            </a>
                        </li>
                        <li>
                            <a href="user_add.php" class="<?php echo ($page=='user_add')?'mm-active':'' ?>">
                                <i class="metismenu-icon pe-7s-edit">
                                </i>Add New User
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
<?php
if(isset($_SESSION['donation'])) {
    //show half view with menu
    ?>
        <div class="app-main__outer">
    <?php
}
else {
    //show full view without menu
    ?>
        <div class="app-main__outer" style="padding-left:0px;">
    <?php
}
?>
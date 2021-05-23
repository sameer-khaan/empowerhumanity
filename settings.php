<?php
    include('inc/config.php');
    include('inc/header.php');
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-cog">
                    </i>
                </div>
                <div>
                    Settings
                    <div class="page-title-subheading">Update Personal Info.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Info</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>Credentials</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form id="info_update" class="needs-validation" method="POST">
                            <div class="form-row">
                                <div class="col-md-6 mb-2">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['donation']['name'] ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-2">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['donation']['email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="error text-danger"></label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form id="credential_update" class="needs-validation" method="POST">
                            <div class="form-row">
                                <div class="col-md-6 mb-2">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" name="old_password" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-2">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label>Retype New Password</label>
                                    <input type="password" class="form-control" name="retype_password" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="error text-danger"></label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
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
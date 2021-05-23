<?php
    include('inc/config.php');
    include('inc/header.php');
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-edit icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    New Member
                    <div class="page-title-subheading">Add User Information in system.</div>
                </div>
            </div>
        </div>
    </div>
    
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>New Team Member</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user_details.php">
                <span>Team List</span>
            </a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form id="user_add" class="needs-validation" method="POST">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Fullname</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label>User Type</label>
                                <select class="mb-2 form-control" name="type" required>
                                    <option value="admin">Admin</option>
                                    <option value="member">Member</option>
                                    <option value="representative" selected>Representative</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Contact Number</label>
                                <input type="number" onKeyPress="if(this.value.length==11) return false;" class="form-control" name="contact_number">
                            </div>

                            <div class="col-md-4 mb-2">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            
                            <div class="col-md-4 mb-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label>Retype Password</label>
                                <input type="password" class="form-control" name="retype_password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="hidden" name="organization_id" value="<?php echo $organizationId ?>">
                                <label class="error text-danger"></label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
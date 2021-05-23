<?php
    include('inc/config.php');
    unset($_SESSION['donation']);
    include('inc/header.php');
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading mx-auto">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Login Form
                    <div class="page-title-subheading">Members and Representatives can login to view details.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-md-6 col-lg-4 mx-auto">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title"></h5>
                    <form id="login" method="POST">
                        <div class="position-relative form-group">
                            <label class="">Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="position-relative">
                            <label class="error text-danger"></label>
                        </div>
                        <button class="btn btn-primary float-right">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('inc/footer.php');
?>
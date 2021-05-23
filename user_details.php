<?php
    include('inc/config.php');
    include('inc/header.php');

    $table = "tbl_users";
    $where = "organization_id='".$organizationId."' ORDER BY id, type";
    $userDetail = check_table($table,$where);
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
                    Our Workforce
                    <div class="page-title-subheading">List of Members and Representatives.</div>
                </div>
            </div>
        </div>
    </div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Team List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user_add.php">
                <span>New Team Member</span>
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
                                        <a href="user_details.php"><button class="btn btn-focus"> Done</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="mb-0 table table-sm table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Enrolled</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($userDetail) > 0){
                                        while($row = mysqli_fetch_assoc($userDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo ucwords($row['name']) ?></th>
                                            <td>
                                                <select class="form-control-sm form-control updateInput" data-table='tbl_users' data-field='type' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['type'] ?>" selected><?php echo ucfirst($row['type']) ?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="member">Member</option>
                                                    <option value="representative">Representative</option>
                                                </select>
                                            </td>
                                            <td><input type="number" onKeyPress="if(this.value.length==11) return false;" class="form-control-sm form-control updateInput" data-table='tbl_users' data-field='contact_number' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['contact_number'] ?>"></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td>
                                                <select class="form-control-sm form-control updateInput" data-table='tbl_users' data-field='status' data-where='id' data-id='<?php echo $row['id'] ?>'>
                                                    <option value="<?php echo $row['status'] ?>" selected><?php echo ucfirst($row['status']) ?></option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control-sm form-control updateInput" data-table='tbl_users' data-field='address' data-where='id' data-id='<?php echo $row['id'] ?>' value="<?php echo $row['address'] ?>"></td>
                                            <td><?php echo date_format(date_create($row['enrolled_date']),'d/m') ?></td>
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
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Enrolled</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(mysqli_num_rows($userDetail) > 0){
                                        while($row = mysqli_fetch_assoc($userDetail)){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo ucwords($row['name']) ?></th>
                                            <td><?php echo ucfirst($row['type']) ?></td>
                                            <td><?php echo $row['contact_number'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo ucfirst($row['status']) ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo date_format(date_create($row['enrolled_date']),'d/m') ?></td>
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
            "pageLength": 25
        });
	});
</script>
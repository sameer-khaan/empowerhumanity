<?php
require_once 'inc/config.php';
require_once 'inc/header.php';

if(isset($_REQUEST['insert_member'])) {
	$post = array(
		'user_id'	=>	$_REQUEST['user_id'],
		'name'		=>	mysqli_real_escape_string($conn,$_REQUEST['name'])
	);
	insert("tbl_members",$post);

	$message =  '<div class="alert alert-success">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
					<strong>Success!</strong> Inserted Successfuly
				</div>';
}

if(isset($_REQUEST['update_member'])) {
	$row  = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	update("tbl_members",array('name'=>$name),"id = '$row'");

	$message =  '<div class="alert alert-success">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
					<strong>Success!</strong> Updated Successfuly
				</div>';
}

if(isset($_REQUEST['delete_member'])) {
	$row = $_REQUEST['id'];

	$membersDetail = check_table("account","member_id = '$row'");

	if(mysqli_num_rows($membersDetail) == 0){
		delete("tbl_members","id = '$row'");
		$message =  '<div class="alert alert-success">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
						<strong>Success!</strong> Deleted Successfuly
					</div>';
	}
	else{
		$message =  '<div class="alert alert-danger">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
						<strong>Error!</strong> Cannot delete member, account data exist
					</div>';
	}
}

$loggedInPersonId =	$_SESSION['developer']['id'];
$table = "tbl_members";
$where = "user_id = '".$loggedInPersonId."' order by created_date";
$membersDetail = check_table($table,$where);
?>

<div class="container text-center">
	<div class="row">
		<div class="col-md-12">
			<p>
				<strong style="font-size:26px;">Add/Update Member</strong><br>
				<span>Note: List of members which you have been created and currently in use</span>
			</p>
			<br><br>
			<p>
			<?php if(isset($message)){
				echo $message;
			}
			?>
			</p>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="post" class="form-horizontal">
				<div class="form-group col-md-12">
					<label class="control-label">Member Name</label>
				</div>
				<div class="form-group col-md-12">
					<input type="text" placeholder="Name" class="form-control" name="name" style="width:auto;" required/>
				</div>
				<div class="form-group col-md-12">
					<input type="hidden" name="user_id" value="<?php echo $loggedInPersonId ?>"/>
					<button type="submit" name="insert_member" class="btn btn-primary">Add Member</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3"><br>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Member Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_assoc($membersDetail)){ ?>
					<tr>
						<form method="post" class="form-horizontal">
						<td>
							<?php echo $row['id'] ?>
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
						</td>
						<td>
							<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" required/>
						</td>
						<td align="center">
							<button type="submit" name="update_member" class="btn btn-success"><i class="fa fa-edit"></i></button>
							&nbsp;&nbsp;
							<button type="submit" name="delete_member" class="btn btn-danger"><i class="fa fa-remove"></i></button>
						</td>
						</form>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once 'inc/footer.php'; ?>
<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function check_table($table,$where)
{
	global $conn;
	$sql = "SELECT * FROM $table WHERE $where";
	$res = $conn->query($sql);
	if($res){
		return $res;
	}
	else{
		return mysqli_error($conn);
	}
}

function insert($table,$post)
{
	global $conn;
	
	$insert_keys	= '';
	$insert_values	= '';

	foreach($post as $key => $value)
	{
			$insert_keys	.=	"`".$key."`,";
			$insert_values	.=	"'".$value."',";
	}

	$insert_keys	=	rtrim($insert_keys,",");
	$insert_values	=	rtrim($insert_values,",");

	$sql = "INSERT INTO $table(".$insert_keys.") VALUES(".$insert_values.")";
	$res = $conn->query($sql);
	
	if($res){
		return 1;
	}
	else{
		return mysqli_error($conn);
	}
}

function update($table,$post,$where)
{
	global $conn;
	
	$insert	= '';

	foreach($post as $key => $value)
	{
			$insert	.=	"`".$key."`='".$value."',";
	}

	$insert	= rtrim($insert,",");

	$sql = "UPDATE $table SET ".$insert." WHERE $where";
	$res = $conn->query($sql);

	if($res){
		return 1;
	}
	else{
		return mysqli_error($conn);
	}
}

function delete($table,$where)
{
	global $conn;
	$sql = "DELETE FROM $table WHERE $where";
	$res = $conn->query($sql);
	if($res){
		return $res;
	}
	else{
		return mysqli_error($conn);
	}
}

function frontPageSearch($query)
{
	global $conn;
	$table = "tbl_donees a LEFT JOIN tbl_donees_distribution b ON a.id = b.donee_id";
	$where = "(a.cnic like '%".$query."%' || a.number like '%".$query."%') AND b.delivery_status like '%delivered%' ORDER BY b.delivery_date DESC";
	$res = check_table($table,$where);
    if(mysqli_num_rows($res) > 0)
	{
		?>
		<h4>Record Found</h4>
		<div class="table-responsive">
			<table class="mb-0 mt-3 table">
				<thead>
				<tr>
					<th>Name</th>
					<th>Delivery Date</th>
					<th>Ration Bags</th>
					<th>Family Count</th>
					<th>Organization</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while($row = mysqli_fetch_assoc($res)){
				?>
				<tr>
					<td><?php echo ucwords($row['name']) ?></td>
					<th><?php echo date_format(date_create($row['delivery_date']),'d - F') ?></th>
					<td class="text-center"><?php echo $row['total_donation'] ?></td>
					<td><?php echo $row['headcount'] ?></td>
					<td><?php echo getNameOrg($row['organization_id']) ?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
		<?php
    }
    else
    {
       echo "<h3>No Record Found</h3>";
    }
}

function innerPageSearch($query)
{
	global $conn;
	$table  = "tbl_donees a LEFT JOIN tbl_donees_distribution b ON a.id = b.donee_id";
	$where  = "(a.organization_id = '".$_SESSION['donation']['organization_id']."' OR b.organization_id = '".$_SESSION['donation']['organization_id']."') AND ";
	$where .= "(a.name like '%".$query."%' OR ";
	$where .= "a.cnic like '%".$query."%' OR ";
	$where .= "a.number like '%".$query."%' OR ";
	$where .= "a.address like '%".$query."%' OR ";
	$where .= "b.case_reference like '%".$query."%' OR ";
	$where .= "b.delivery_status like '%".$query."%' OR ";
	$where .= "b.delivery_date like '%".$query."%' OR ";
	$where .= "b.delivered_by in (SELECT id FROM tbl_users WHERE name like '%".$query."%'))";

	$sql = "SELECT a.id as 'row_id', a.*, b.* FROM $table WHERE $where ORDER BY b.delivery_date DESC";
	$res = $conn->query($sql);
    if(mysqli_num_rows($res) > 0)
	{
		?>
		<div class="table-responsive">
			<table class="my-2 table table-sm table-bordered">
				<thead>
				<tr>
					<th>Name</th>
					<th>Contact</th>
					<th>Address</th>
					<th>Delivery Date</th>
					<th class="text-center">Bags</th>
					<th>Status</th>
					<th>Delivery By</th>
					<th>Remarks</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while($row = mysqli_fetch_assoc($res)){
					if(($_SESSION['donation']['organization_id'] == $row['organization_id']) || empty($row['organization_id'])){
					?>
					<tr>
						<td>
							<?php echo ucwords($row['name']) ?><br>
							<small>CNIC: <?php echo $row['cnic'] ?></small>
						</td>
						<td><a href="tel:<?php echo $row['number'] ?>"><?php echo $row['number'] ?></a></td>
						<td><?php echo $row['address'] ?></td>
						<th><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></th>
						<td class="text-center"><?php echo $row['total_donation'] ?></td>
						<td><?php echo $row['delivery_status'] ?></td>
						<td><?php echo getName($row['delivered_by']) ?></td>
						<td><small><?php echo $row['remarks'] ?></small></td>
						<td class="text-center">
							<a href="donee_edit.php?id=<?php echo $row['row_id'] ?>">
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
		<?php
    }
    else
    {
       echo "<h5>No Record Found</h5>";
    }
}

function rationSearch($id)
{
	global $conn;
	$res = check_table('tbl_donees',"id = '".$id."'");
	$rowDonee = mysqli_fetch_assoc($res);
	?>
	<h5 class="fsize-1">Name: &nbsp;&nbsp;&nbsp;<?php echo ucwords($rowDonee['name']) ?></h5>
	<p>Contact: &nbsp;&nbsp;<a href="tel:<?php echo $rowDonee['number'] ?>"><?php echo $rowDonee['number'] ?></a></p>
	<div class="table-responsive">
		<table class="my-2 table table-sm table-bordered">
			<thead>
			<tr>
				<th>Delivery Date</th>
				<th class="text-center">Bags</th>
				<th>Status</th>
				<th>Organization</th>
				<th>Remarks</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$res = check_table('tbl_donees_distribution',"donee_id = '".$id."' ORDER BY delivery_date DESC");
			if(mysqli_num_rows($res) > 0){
				while($row = mysqli_fetch_assoc($res)){
				?>
				<tr>
					<th><?php echo date_format(date_create($row['delivery_date']),'d/m') ?></th>
					<td class="text-center"><?php echo $row['total_donation'] ?></td>
					<td><?php echo $row['delivery_status'] ?></td>
					<td><?php echo getNameOrg($row['organization_id']) ?></td>
					<td><small><?php echo ($_SESSION['donation']['organization_id'] == $row['organization_id'])?$row['remarks']:'' ?></small></td>
				</tr>
				<?php
				}
			}
			else{
				?>
				<tr>
					<td class="text-center" colspan="5">No Ration Yet</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="text-center mt-3">
		<a href="donee_edit.php?id=<?php echo $id ?>">
			<button class="btn btn-success p-1">Add Ration Details</button>
		</a>
	</div>
	<?php
}

function getName($id)
{
	global $conn;
	$sql = "SELECT * FROM tbl_users WHERE id = '".$id."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return ucwords($row['name']);
	}
	else{
		return '';
	}
}

function getNameOrg($id)
{
	global $conn;
	$sql = "SELECT * FROM tbl_organization WHERE id = '".$id."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return ucwords($row['name']);
	}
	else{
		return '';
	}
}

function total_funds()
{
	global $conn;
	$sql = "SELECT sum(donation_amount) as 'total' FROM tbl_donors WHERE organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function utilize_funds()
{
	global $conn;
	$sql = "SELECT sum(total_cost) as 'total' FROM tbl_ration WHERE status = 'received' AND organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function total_bags()
{
	global $conn;
	$sql = "SELECT sum(total_bags) as 'total' FROM tbl_ration WHERE status = 'received' AND organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function utilize_bags()
{
	global $conn;
	$sql = "SELECT sum(total_donation) as 'total' FROM tbl_donees_distribution WHERE delivery_status = 'delivered' AND organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function total_cases()
{
	global $conn;
	$sql = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function covered_cases()
{
	global $conn;
	$sql = "SELECT count(id) as 'total' FROM tbl_donees_distribution WHERE delivery_status = 'delivered' AND organization_id = '".$_SESSION['donation']['organization_id']."'";
	$res = $conn->query($sql);
	if($res){
		$row = mysqli_fetch_assoc($res);
		return $row['total'];
	}
	else{
		return 0;
	}
}

function mail_for_change_password($user_id,$user_email)
{
	global $base_url;
	
	$to 			=	$user_email;
	$subject		=	'Password Recovery For Login';
	$from 			=	"sameerkhan5130@gmail.com";
	$user_id		=	md5($user_id);
	$user_email		=	md5($user_email);
	$url	  	 	=	$base_url.'newPassword.php?key='.$user_id.'+'.$user_email;
	
	// To send HTML mail, the Content-type header must be set
	$headers   =  'MIME-Version: 1.0' . "\r\n";
	$headers  .=  'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Create email headers
	$headers .= 'From: '.$from."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	// Compose a simple HTML email message
	$message   =  '<html><body>';
	$message  .=  "<p>You can now change your password for Accounts Login by clicking the link below.</p>";
	$message  .=  "<a href=$url><h3>Click To Change Your Password!</h3></a>";
	$message  .=  '</body></html>';
	
	// Sending email
	if(mail($to, $subject, $message, $headers))
	{
		return  "E-mail is sent to ".$to;
	}
	else
	{
		return 'Email Failed! Try Again!';
	}
}

function deletedir($dir)
{
	if (!file_exists($dir)) { return true; }
	if (!is_dir($dir) || is_link($dir)) {
		return unlink($dir);
	}
	foreach (scandir($dir) as $item) { 
		if ($item == '.' || $item == '..') { continue; }
		if (!deletedir($dir . "/" . $item, false)) { 
			chmod($dir . "/" . $item, 0777); 
			if (!deletedir($dir . "/" . $item, false)) return false; 
		}; 
	} 
	return rmdir($dir); 
}

function redirect($url) 
{
	echo '<script>window.location.href="'.$url.'"</script>';
}

?>
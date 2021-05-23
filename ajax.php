<?php
require_once('inc/config.php');

if(isset($_REQUEST["index_search"]))
{
	$query = mysqli_real_escape_string($conn,$_REQUEST["query"]);
	if(!empty($query)){
		echo frontPageSearch($query);
	}
	else{
		echo 'Type in the box...';
	}
	return true;
	exit();
}

if(isset($_REQUEST["search_form"]))
{
	$query = mysqli_real_escape_string($conn,$_REQUEST["query"]);
	if(!empty($query)){
		echo innerPageSearch($query);
	}
	else{
		echo 'Type in the box...';
	}
	return true;
	exit();
}

if(isset($_REQUEST["ration_view"]))
{
	echo rationSearch($_REQUEST["ration_view"]);
	return true;
	exit();
}

if(isset($_REQUEST["login"]))
{
    $email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
    $pass  = mysqli_real_escape_string($conn,$_REQUEST["password"]);
    
	$res = check_table('tbl_users',"email = '".$email."' AND password = '".md5($pass)."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 1)
	{
		if($row['status'] == 'active'){
			$_SESSION['donation'] = $row;
			echo "1";
		}
		else{
			echo "You are not allowed to login, please contact Admin!";
		}
    }
    else
    {
       echo "Wrong email or password";
    }
	
	return true;
	exit();
}

if(isset($_REQUEST["logout"]))
{
    unset($_SESSION["donation"]);
	session_destroy();
    return true;
	exit();
}

if(isset($_REQUEST["forget_password"]))
{
    $email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
	
	$res = check_table('tbl_users',"email = '".$email."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) > 0)
	{
		$result = mail_for_change_password($row['id'],$row['email']);
		echo $result;
    }
    else
    {
       echo "Email Not Found!";
    }
	
	return true;
	exit();
}

if(isset($_REQUEST["new_password"]))
{
	if($_REQUEST["password"] == $_REQUEST["retype_password"])
	{
		$key = explode(' ',$_REQUEST['key']);
		$post = array(
			'password' 		   =>  md5($_REQUEST["password"]),
			'retype_password'  =>  $_REQUEST["password"]
		);
		echo update('tbl_users',$post,"md5(id) = '".$key['0']."'");
	}
	else
	{
		echo "Password Mismatch!";
	}
	
	return true;
	exit();
}

if(isset($_REQUEST["org_update"]))
{
	$name     =  mysqli_real_escape_string($conn,$_REQUEST["name"]);
	$email    =  mysqli_real_escape_string($conn,$_REQUEST["email"]);
	$number   =  mysqli_real_escape_string($conn,$_REQUEST["number"]);
	$address  =  mysqli_real_escape_string($conn,$_REQUEST["address"]);

	$res = check_table('tbl_organization',"id != '".$_SESSION['donation']['organization_id']."' AND name = '".$name."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 0)
	{
		$post = array(
			'name'    =>  $name,
			'email'   =>  $email,
			'number'  =>  $number,
			'address'  =>  $address
		);
		echo update('tbl_organization',$post,"id = '".$_SESSION['donation']['organization_id']."'");
	}
	else
	{
		echo "Name Already Exist!";
	}
	
	return true;
	exit();
}

if(isset($_REQUEST["info_update"]))
{
	$name   =  mysqli_real_escape_string($conn,$_REQUEST["name"]);
	$email  =  mysqli_real_escape_string($conn,$_REQUEST["email"]);

	$res = check_table('tbl_users',"id != '".$_SESSION['donation']['id']."' AND email = '".$email."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 0)
	{
		$post = array(
			'name'   =>  $name,
			'email'  =>  $email
		);
		update('tbl_users',$post,"id = '".$_SESSION['donation']['id']."'");

		$res = check_table('tbl_users',"id = '".$_SESSION['donation']['id']."'");
		$row = mysqli_fetch_assoc($res);
		$_SESSION['donation'] = $row;
		echo "1";
	}
	else
	{
		echo "Email Already Exist!";
	}
	
	return true;
	exit();
}

if(isset($_REQUEST["credential_update"]))
{
	$res = check_table('tbl_users',"id = '".$_SESSION['donation']['id']."' AND password = '".md5($_REQUEST["old_password"])."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 1)
	{
		if($_REQUEST["password"] == $_REQUEST["retype_password"])
		{
			$post = array(
				'password' 		   =>  md5($_REQUEST["password"]),
				'retype_password'  =>  $_REQUEST["password"]
			);
			echo update('tbl_users',$post,"id = '".$_SESSION['donation']['id']."'");
		}
		else
		{
			echo "New Password Mismatch!";
		}
	}
	else
	{
		echo "Wrong Current Password!";
	}
	
	return true;
	exit();
}

if(isset($_REQUEST["donee_add"]))
{
	$cnic = mysqli_real_escape_string($conn,$_REQUEST["cnic"]);
	if(is_numeric($cnic) && $cnic > 0 && $cnic == round($cnic, 0)){
		$res = check_table('tbl_donees',"cnic = '".$cnic."'");
		$row = mysqli_fetch_assoc($res);
		if(mysqli_num_rows($res) == 1)
		{
			$id = $row['id'];
			$post = array(
				'name'		 =>	 mysqli_real_escape_string($conn,$_REQUEST['name']),
				'number'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['number']),
				'cnic'		 =>	 mysqli_real_escape_string($conn,$_REQUEST['cnic']),
				'address'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['address']),
				'headcount'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['headcount'])
			);
			update('tbl_donees',$post,"id = '$id'");
			redirect('donee_edit.php?id='.$id);
			exit();
		}
	}

	$post = array(
		'organization_id' 	 =>	 $_REQUEST['organization_id'],
		'record_inserted_by' =>	 $_REQUEST['record_inserted_by'],
		'name'				 =>	 mysqli_real_escape_string($conn,$_REQUEST['name']),
		'number'			 =>	 mysqli_real_escape_string($conn,$_REQUEST['number']),
		'cnic'				 =>	 mysqli_real_escape_string($conn,$_REQUEST['cnic']),
		'address'			 =>	 mysqli_real_escape_string($conn,$_REQUEST['address']),
		'headcount'			 =>	 mysqli_real_escape_string($conn,$_REQUEST['headcount'])
	);
	insert('tbl_donees',$post);
	redirect('donee_edit.php?id='.$conn->insert_id);
	exit();
}

if(isset($_REQUEST["donee_edit"]))
{
	$id = $_REQUEST['id'];
	$post = array(
		'name'		 =>	 mysqli_real_escape_string($conn,$_REQUEST['name']),
		'number'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['number']),
		'cnic'		 =>	 mysqli_real_escape_string($conn,$_REQUEST['cnic']),
		'address'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['address']),
		'headcount'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['headcount'])
	);
	echo update('tbl_donees',$post,"id = '$id'");
	exit();
}

if(isset($_REQUEST["donee_ration_add"]))
{
	$post = array(
		'donee_id'			 =>  $_REQUEST['donee_id'],
		'organization_id' 	 =>	 $_REQUEST['organization_id'],
		'record_inserted_by' =>	 $_REQUEST['record_inserted_by'],
		'total_donation'	 =>  $_REQUEST['total_donation'],
		'case_reference'	 =>	 mysqli_real_escape_string($conn,$_REQUEST['case_reference']),
		'remarks'			 =>	 mysqli_real_escape_string($conn,$_REQUEST['remarks']),
		'delivered_by'		 =>  $_REQUEST['delivered_by'],
		'delivery_status'	 =>  $_REQUEST['delivery_status'],
		'delivery_date'		 =>  $_REQUEST['delivery_date']
	);
	echo insert('tbl_donees_distribution',$post);
	exit();
}

if(isset($_REQUEST["ration_add"]))
{
	$post = array(
		'organization_id' 	 =>	 $_REQUEST['organization_id'],
		'record_inserted_by' =>	 $_REQUEST['record_inserted_by'],
		'total_bags'		 =>  mysqli_real_escape_string($conn,$_REQUEST['total_bags']),
		'advance'			 =>  mysqli_real_escape_string($conn,$_REQUEST['advance']),
		'balance'			 =>  mysqli_real_escape_string($conn,$_REQUEST['balance']),
		'total_cost'		 =>  mysqli_real_escape_string($conn,$_REQUEST['total_cost']),
		'order_date'		 =>  mysqli_real_escape_string($conn,$_REQUEST['order_date']),
		'delivery_date'		 =>  mysqli_real_escape_string($conn,$_REQUEST['delivery_date']),
		'status'			 =>  mysqli_real_escape_string($conn,$_REQUEST['status']),
		'remarks'			 =>	 mysqli_real_escape_string($conn,$_REQUEST['remarks'])
	);
	echo insert('tbl_ration',$post);
	exit();
}

if(isset($_REQUEST["donor_add"]))
{
	$post = array(
		'organization_id' 	 =>	$_REQUEST['organization_id'],
		'record_inserted_by' =>	$_REQUEST['record_inserted_by'],
		'user_id'			=>	$_REQUEST['user_id'],
		'name'				=>	mysqli_real_escape_string($conn,$_REQUEST['name']),
		'contact_number'	=>  mysqli_real_escape_string($conn,$_REQUEST['contact_number']),
		'donation_amount'	=>  mysqli_real_escape_string($conn,$_REQUEST['donation_amount']),
		'donation_type'		=>  mysqli_real_escape_string($conn,$_REQUEST['donation_type']),
		'donation_mode'		=>  mysqli_real_escape_string($conn,$_REQUEST['donation_mode']),
		'bank'				=>	mysqli_real_escape_string($conn,$_REQUEST['bank'])
	);
	echo insert('tbl_donors',$post);
	exit();
}

if(isset($_REQUEST["user_add"]))
{
	$email = mysqli_real_escape_string($conn,$_REQUEST["email"]);
	$res = check_table('tbl_users',"email = '".$email."'");
	$row = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 1)
	{
		echo 'Email Already Exist';
		exit();
	}
	
	if($_REQUEST['password'] != $_REQUEST['retype_password']){
		echo 'Password not matched';
		exit();
	}

	$post = array(
		'organization_id' 	=>	$_REQUEST['organization_id'],
		'name'				=>	mysqli_real_escape_string($conn,$_REQUEST["name"]),
		'type'				=>  mysqli_real_escape_string($conn,$_REQUEST['type']),
		'contact_number'	=>  mysqli_real_escape_string($conn,$_REQUEST['contact_number']),
		'email'				=>  mysqli_real_escape_string($conn,$_REQUEST["email"]),
		'password'			=>  md5($_REQUEST['password']),
		'retype_password'	=>  mysqli_real_escape_string($conn,$_REQUEST['retype_password']),
		'status'			=>  'active',
		'address'			=>	mysqli_real_escape_string($conn,$_REQUEST['address'])
	);
	echo insert('tbl_users',$post);
	exit();
}

if(isset($_REQUEST["updateInput"]))
{
	$where = $_REQUEST['where'];
	$id	   = $_REQUEST['id'];
	$post = array(
		$_REQUEST["field"]  =>  mysqli_real_escape_string($conn,$_REQUEST["val"])
	);

	echo update($_REQUEST["table"],$post,"$where = '$id'");
	exit();
}
?>
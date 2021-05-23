<?php
require_once 'inc/config.php';

if(isset($_SESSION['developer']))
{
	echo "<script>window.location.href='".$dashboard_url."'</script>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <title>Accounts Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script>base_url = "<?php echo $base_url; ?>"; </script>
	<script>dashboard_url = "<?php echo $dashboard_url; ?>"; </script>

	<style>
	.table>tbody>tr>td.active {
    	background-color: #337ab7;
	}
	.table>tbody>tr>td.active a {
    	color: white;
	}
	</style>
</head>
<body>

<div class="jumbotron text-center">
   <p>Enter your new password below to reset your password!</p>
</div>

<div class="container">
	<div class="justify-content-md-center">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
         <form id="new_password" class="login-form" method="post" autocomplete="off">
         <?php
         if(isset($_REQUEST['key']))
         {
            $key = $_REQUEST['key'];
         ?>            
            <div class="form-group">
               <label class="control-label visible-ie8 visible-ie9">New Password</label>
               <input class="form-control placeholder-no-fix customTextBox" type="password" placeholder="Enter Your New Password!" name="password" />    
               <input class="form-control placeholder-no-fix" type="hidden" value="<?php if(isset($key)){echo $key;}?>" name="key" />
            </div>
            
            <div class="form-group">
               <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
               <input class="form-control placeholder-no-fix customTextBox" type="password" placeholder="Re-type Your Password" name="retype_password"/>
            </div>
            
            <div class="form-group">
               <div class="error text-center">
               </div>
            </div>
         
            <div class="form-actions">
               <button type="submit" class="btn btn-danger">Submit</button>            
            </div>
         <?php 
         }
         ?>
         </form>
      </div>
   </div>
</div>

<?php require_once 'inc/footer.php'; ?>
<?php
	
	session_start();
	include '../includes/dbconnection.php';

	$id=$_GET['deny_id'];
	
	$sql="update pass set type=0 where ID='$id'";
	if($con->query($sql)==TRUE)
	{
		header("location: ./manage-passes.php");
	}
	else
	{
		echo "
		<script>
			alert('failed to deny the pass');
		</script>
		";
	}

?>
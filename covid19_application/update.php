<?php
	include 'menu.php';
	$con = new mysqli("localhost","root","","covid19");
	$city=$_GET['city'];
	$state=$_GET['state'];

	$sql_state="select * from states where sl_no=".$state."";
	$result_state=$con->query($sql_state);
	if($result_state->num_rows==1)
	{
		while($row=$result_state->fetch_assoc())
		{
			$conf=$row['confirmed'];
			$act=$row['active'];
			$dis=$row['recovered'];
			$ded=$row['deaths'];
		}
	}
	//echo $conf." ".$act." ".$dis." ".$ded;

	$sql_city="select * from cities where sl_no=".$city."";
	$result_city=$con->query($sql_city);
	if($result_city->num_rows==1)
	{
		while($row=$result_city->fetch_assoc())
		{
			$conf1=$row['confirmed'];
			$act1=$row['active'];
			$dis1=$row['recovered'];
			$ded1=$row['deaths'];
		}
	}
	//echo $conf1." ".$act1." ".$dis1." ".$ded1;

	if(isset($_POST['submit1']))
	{
		$unumber=$_POST['unumber'];
		$conf1+=$unumber;
		$act1+=$unumber;
		$conf+=$unumber;
		$act+=$unumber;
		
		$sql1="update cities set confirmed=".$conf1." where sl_no=".$city."";
		$sql12="update cities set active=".$act1." where sl_no=".$city."";
		$sql13="update states set confirmed=".$conf." where sl_no=".$state."";
		$sql14="update states set active=".$act." where sl_no=".$state."";
		if($con->query($sql1)&&$con->query($sql12)&&$con->query($sql13)&&$con->query($sql14))
		{
			echo "<div class='ui green raised centered header segment' style='width: 60%;margin-left: 20%;'>Successfully updated&nbsp;&nbsp;<button class='ui green button' onclick='goto($state)'>Goto to home</div>";
		}
		else
		{
			echo "<div class='ui red raised centered header segment' style='width: 60%;margin-left: 20%;'>Failed to update&nbsp;&nbsp;<button class='ui red button' onclick='goto($state)'>Goto to home</div></div>";
		}
	}

	if(isset($_POST['submit2']))
	{
		$dnumber=$_POST['dnumber'];

		$act-=$dnumber;
		$act1-=$dnumber;
		$dis+=$dnumber;
		$dis1+=$dnumber;
		
		$sql2="update cities set recovered=".$dis1." where sl_no=".$city."";
		$sql22="update cities set active=".$act1." where sl_no=".$city."";
		$sql23="update states set recovered=".$dis." where sl_no=".$state."";
		$sql24="update states set active=".$act." where sl_no=".$state."";
		if($con->query($sql2)&&$con->query($sql22)&&$con->query($sql23)&&$con->query($sql24))
		{
			echo "<div class='ui green raised centered header segment' style='width: 60%;margin-left: 20%;'>Successfully updated&nbsp;&nbsp;<button class='ui green button' onclick='goto($state)'>Goto to home</div>";
		}
		else
		{
			echo "<div class='ui red raised centered header segment' style='width: 60%;margin-left: 20%;'>Failed to update&nbsp;&nbsp;<button class='ui red button' onclick='goto($state)'>Goto to home</div></div>";
		}
	}

	if(isset($_POST['submit3']))
	{
		$ddnumber=$_POST['ddnumber'];
		
		$act-=$ddnumber;
		$act1-=$ddnumber;
		$ded+=$ddnumber;
		$ded1+=$ddnumber;
		
		$sql3="update cities set deaths=".$ded1." where sl_no=".$city."";
		$sql32="update cities set active=".$act1." where sl_no=".$city."";
		$sql33="update states set deaths=".$ded." where sl_no=".$state."";
		$sql34="update states set active=".$act." where sl_no=".$state."";
		if($con->query($sql3)&&$con->query($sql32)&&$con->query($sql33)&&$con->query($sql34))
		{
			echo "<div class='ui green raised centered header segment' style='width: 60%;margin-left: 20%;'>Successfully updated&nbsp;&nbsp;<button class='ui green button' onclick='goto($state)'>Goto to home</div>";
		}
		else
		{
			echo "<div class='ui red raised centered header segment' style='width: 60%;margin-left: 20%;'>Failed to update&nbsp;&nbsp;<button class='ui red button' onclick='goto($state)'>Goto to home</div></div>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>update cases</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div class="ui stackable grid">
		<div class="three wide column"></div>
		<div class="ten wide column">
			<div class="ui raised segment">
				<div class="ui teal raised centered header segment">
					Updates the cases
				</div>
				<div class="ui raised segment">

					<div class="ui stackable grid">
						<div class="eight wide column">
							<h3>
							<?php
								$sql="select * from cities where sl_no='".$city."'";
								$result=$con->query($sql);
								if($result->num_rows==1)
								{
									while($row=$result->fetch_assoc())
									{
										echo $row['state']." ---> ".$row['city']."";
									}
								}
							?>
						</h3>
						</div>


					<div class="eight wide column">
						<form class="ui form" method="post">
							<div class="ui field">
								<div class="ui selection dropdown">
									<input type="hidden" name="option"  id="ddwn" onchange="chge()">
									<i class="dropdown icon"></i>
									<div class="default text">Select an option</div>
									<div class="menu">
										<div class="item" value="confirmed">Update confirmed cases</div>
										<div class="item" value="discharged">Update discharged cases</div>
										<div class="item" value="deceased">Update deceased cases</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					</div>

				</div>

				<div class="ui raised segment" id="confirmed" style="display: none;">
					<form class="ui form" method="post">
						<div class="ui field">
							<label>how many cases you to be added?</label>
							<input type="number" name="unumber" placeholder="enter the number">
						</div>
						<div class="ui field">
							<button class="ui blue button" name="submit1" type="submit">Update Confirmed cases</button>
						</div>
					</form>
				</div>

				<div class="ui raised segment" id="discharged" style="display: none;">
					<form class="ui form" method="post">
						<div class="ui field">
							<label>how many cases are discharged?</label>
							<input type="number" name="dnumber" placeholder="enter the number">
						</div>
						<div class="ui field">
							<button class="ui blue button" name="submit2" type="submit">Update dischared cases</button>
						</div>
					</form>
				</div>

				<div class="ui raised segment" id="deceased" style="display: none;">
					<form class="ui form" method="post">
						<div class="ui field">
							<label>how many cases are deceased?</label>
							<input type="number" name="ddnumber" placeholder="enter the number">
						</div>
						<div class="ui field">
							<button class="ui blue button" name="submit3" type="submit">Update deceased cases</button>
						</div>
					</form>
				</div>

			</div>	
		</div>
	</div>
	<br><br>
</body>
</html>
<script>
	//dropdown javascript code
	$('.ui.selection.dropdown').dropdown();

	function chge()
	{
		var x=document.getElementById('ddwn').value;
		if(x=="update confirmed cases")
		{
			document.getElementById('confirmed').style.display="block";
			document.getElementById('discharged').style.display="none";
			document.getElementById('deceased').style.display="none";
		}
		else if(x=="update discharged cases")
		{
			document.getElementById('discharged').style.display="block";
			document.getElementById('confirmed').style.display="none";
			document.getElementById('deceased').style.display="none";
		}
		else if(x=="update deceased cases")
		{
			document.getElementById('deceased').style.display="block";
			document.getElementById('discharged').style.display="none";
			document.getElementById('confirmed').style.display="none";
		}
		else
		{
			document.getElementById('confirmed').style.display="none";
			document.getElementById('discharged').style.display="none";
			document.getElementById('deceased').style.display="none";
		}
	}

	function goto(st)
	{
		location.href="cities.php?state="+st;
	}
</script>
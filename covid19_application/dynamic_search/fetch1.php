<?php
	session_start();
	$con=new mysqli("localhost","root","","covid19");

	$output="<table class='ui table'>
		
		<tr>
			<th>City</th>
			<th>Confirmed</th>
			<th>Active</th>
			<th>Recovered</th>
			<th>Deaths</th>
			<th></th>
		</tr>";

	$sql="select * from cities where city LIKE '%".$_POST['search']."%'";
	$result = $con->query($sql);
	if($result)
	{
		while($row=$result->fetch_assoc())
		{
			$output.=
			'
				<tr>
					<td>'.$row['city'].'</td>
					<td>'.$row['confirmed'].'</td>
					<td>'.$row['active'].'</td>
					<td>'.$row['recovered'].'</td>
					<td>'.$row['deaths'].'</td>
					<td><button class="ui blue button" onclick="fun('.$row['sl_no'].')">view</button></td>
				
			';
			if(isset($_SESSION['user'])==true)
			{
				$output.="
				<td><button class='ui green basic button' onclick='func(".$row['sl_no'].")'>Update cases</button></td>
				";
			}
			echo "
			</tr>";
		}
		echo $output."
			</table>";
	}
	else
	{
		echo '

			<div class="ui teal raised segment centered header">
				No matches found
			</div>

		';
	}
?>
<script>
	function fun(id)
	{
		location.href="city.php?city="+id;
	}
	function func(id)
	{
		location.href="update.php?city="+id;
	}
</script>
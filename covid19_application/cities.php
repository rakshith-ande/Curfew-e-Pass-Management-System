<?php
	include 'menu.php';
	$id = $_GET['state'];
	$st=$id;
	$con = new mysqli("localhost","root","","covid19");
	$state="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cities</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
	<style>
		tr:nth-child(even){background-color: #d4e2f6};
	</style>
</head>
<body>

	
	<!--header-->
	<div class="ui stackable grid">
		<div class="one wide column"></div>
		<div class="fourteen wide column">
			<div class="ui teal raised centered header segment">
				<?php
					$sql="select * from states where sl_no=".$id."";
					$result=$con->query($sql);
					if($result->num_rows==1)
					{
						while($row=$result->fetch_assoc())
						{
							$state.=$row['state'];
							$total_confirmed=$row['confirmed'];
							$total_active=$row['active'];
							$total_recovered=$row['recovered'];
							$total_deaths=$row['deaths'];
							echo "".$state." covid19 status";
						}
					}
				?>
			</div>
		</div>
	</div>
	<!--//header-->


	<!--count starts-->
	<div class="ui stackable grid">
		<div class="two wide column"></div>
		<div class="three wide column">
			<div class="ui raised segment" style="background-color:#d4e2ff">
				<img src="img1.jpg" align="ceneter">
				<h3 style="margin-left: 70px;margin-top: -50px;">Confirmed</h3>
				<h4 style="margin-left: 75px;margin-top: -15px;"><?php echo number_format($total_confirmed);?></h4>
			</div>
		</div>
		<div class="three wide column">
			<div class="ui raised segment" style="background-color:#b9fabf">
				<img src="img1.jpg" align="ceneter">
				<h3 style="margin-left: 65px;margin-top: -50px;">Active</h3>
				<h4 style="margin-left: 75px;margin-top: -15px;"><?php echo number_format($total_active);?></h4>
			</div>
		</div>
		<div class="three wide column">
			<div class="ui raised segment" style="background-color:#ffa88f">
				<img src="img1.jpg" align="ceneter">
				<h3 style="margin-left: 70px;margin-top: -50px;">Recovered</h3>
				<h4 style="margin-left: 75px;margin-top: -15px;"><?php echo number_format($total_recovered);?></h4>
			</div>
		</div>
		<div class="three wide column">
			<div class="ui raised segment" style="background-color:#ffcf87">
				<img src="img1.jpg" align="ceneter">
				<h3 style="margin-left: 70px;margin-top: -50px;">Deceased</h3>
				<h4 style="margin-left: 75px;margin-top: -15px;"><?php echo number_format($total_deaths);?></h4>
			</div>
		</div>
	</div>
	<!--//count ends-->


	<div class="ui stackable grid">
		<div class="two wide column"></div>
		<div class="twelve wide column">
			<div class="ui stackable grid">

				<!--search bar-->
				<div class="five wide column">
					<form class="ui form">
						<div class="ui field">
							<div class="ui icon input">
								<input type="text" name="search" id="search_id" placeholder="search state....">
								<i class="search icon"></i>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--//search bar-->


		<!--dynamic results starts here-->
		<div class="ui teal raised segment" id="dynamic_result" style="display: none;">
				<!--fetch.php result will display here-->
		</div>
		<!--dynamic results ends here-->

			
		<!--table-->
		<div class="ui teal raised segment"  id="static_result">
			<table class="ui table">
				<tr>
					<th>City</th>
					<th>Confirmed</th>
					<th>Active</th>
					<th>Recovered</th>
					<th>Deaths</th>
					<th></th>
				</tr>
			<?php

				$con = new mysqli("localhost","root","","covid19");
				$sql = "select * from cities where state='$state' order by confirmed desc";
				$result = $con->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						$id=$row['sl_no'];

						echo "

						<tr>
							<td>".$row['city']."</td>
							<td>";echo number_format($row['confirmed']);echo "</td>
							<td>";echo number_format($row['active']);echo "</td>
							<td>";echo number_format($row['recovered']);echo "</td>
							<td>";echo number_format($row['deaths']);echo "</td>
							<td><button onclick='fun($id)' class='ui blue button'>view</button></td>
						

						";
						if(isset($_SESSION['user'])==true)
						{
							echo "
							<td><button class='ui green basic button' onclick='update($id,$st)'>Update cases</button></td>
							";
						}
					}
					echo "
					</tr>
					<tr style='background-color: lightgreen !important;'>
						<td>Total</td>
						<td>";echo number_format($total_confirmed);echo "</td>
						<td>";echo number_format($total_active);echo "</td>
						<td>";echo number_format($total_recovered);echo "</td>
						<td>";echo number_format($total_deaths);echo "</td>
						<td></td>
					</tr>

					";
				}
			?>
			</table>
		</div>
		</div>
	</div>
	<!--//table-->


	<!--pie chart-->
	<div class="ui stackable grid">
		<div class="three wide column"></div>
		<div class="six wide column">
			<div id="piechart_3d"></div>
		</div>
	</div>
	<!--//pie chart-->

</body>
</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

	//dynamic search ajax code
	$(document).ready(function(){
		$('#search_id').keyup(function(){
			var txt=$(this).val();
			if(txt!='')
			{
				$.ajax({
					url: "dynamic_search/fetch1.php",
					method: "post",
					data: {search:txt},
					dataType: "text",
					success: function(data)
					{
						$('#dynamic_result').html(data);
					}
				});
				document.getElementById('dynamic_result').style.display="block";
				document.getElementById('static_result').style.display="none";
				document.getElementById('piechart_3d').style.display="none";
			}
			else
			{
				document.getElementById('dynamic_result').style.display="none";
				document.getElementById('static_result').style.display="block";
				document.getElementById('piechart_3d').style.display="block";
				$('#dynamic_result').html('');
			}
		});
	});


  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'covid19 cases'],
      ['Confirmed', <?php  echo $total_confirmed;?>],
      ['Deaths', <?php  echo $total_deaths;?>],
      ['Active', <?php  echo $total_active;?>],
      ['Recovered', <?php  echo $total_recovered;?>]
    ]);

    var options = {
      title: '<?php echo $state;?> covid19 cases status',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }

  function fun(id)
  {
  	location.href="city.php?city="+id;
  }

  function update(id,st)
  {
  	location.href="update.php?city="+id+"&state="+st;
  }

</script>
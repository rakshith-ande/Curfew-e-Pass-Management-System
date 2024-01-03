<?php
	include 'menu.php';
	$id = $_GET['city'];
	$con = new mysqli("localhost","root","","covid19");
	$city="";
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
			<div class="ui teal raised segment">
				<div class="ui teal raised centered header segment">
					<?php
						$sql="select * from cities where sl_no=".$id."";
						$result=$con->query($sql);
						if($result->num_rows==1)
						{
							while($row=$result->fetch_assoc())
							{
								$city.=$row['city'];
								$total_confirmed=$row['confirmed'];
								$total_active=$row['active'];
								$total_recovered=$row['recovered'];
								$total_deaths=$row['deaths'];
								echo "".$city." covid19 status";
							}
						}
					?>
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
</div></div>
	<!--//count ends-->



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
      title: '<?php echo $city;?> covid19 cases status',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }

</script>
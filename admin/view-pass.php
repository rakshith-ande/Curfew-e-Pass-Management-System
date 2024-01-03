<?php
	session_start();
	include '../includes/dbconnection.php';
  $id=$_GET['viewid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curfiew E-Pass Management System | View Pass</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link href="./assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <script>
      
      function print()
      {
          var print = document.getElementById('print');
          var popupWin = window.open('', '_blank', 'width=500,height=500');
          popupWin.document.open();
          popupWin.document.write('<html><body onload="window.print()">' + print.innerHTML + '</html>');
          popupWin.document.close();
      }

    </script>

</head>
<body>

	<!--header and sidebar-->
	<?php
		include './includes/sidebar.php';
	?>
	<!--//header and sidebar-->

	<div class="ui stackable grid">
		
		<div class="four wide column"></div>
		<div class="eleven wide column">

            <div id="side">
            <div class="ui blue segment">

            <div id="print">
              <div class="ui blue big header" style="color: blue;">Pass Details</div>

              <div class="table-responsive">
                <?php

                echo '

                <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="1">
                ';

                 $sql="select * from pass where ID='$id'";

                $result=$con->query($sql);

	            if($result->num_rows>0)
	            {
    
                      $c=1;
                      while($row=$result->fetch_assoc())
                      {
                          echo "

                          <tr>
                            <td colspan='6' style='font-size:20px;color:blue;text-align: center;'>
                             Pass ID: ".$row['Passnumber']."</td>
                          </tr>

                          <tr>
                            <th scope>Category</th>
                            <td colspan='3'>".$row['Category']."</td>
                          </tr>

                          <tr>
                            <th scope>Full Name</th>
                            <td colspan='3'>".$row['Fullname']."</td>
                          </tr>

                          <tr>
                              <th scope>Aadhar Card Number</th>
                              <td colspan='3'>".$row['AadharCardno']."</td>
                          </tr>

                          <tr>
                            <th scope>Mobile Number</th>
                            <td>".$row['Phone']."</td>
                            <th scope>Email</th>
                            <td>".$row['Email']."</td>
                          </tr>

                          <tr>
                              <th scope>From Date</th>
                              <td>".$row['FromDate']."</td>
                              <th scope>To Date(Valid Till)</th>
                              <td>".$row['ToDate']."</td>
                          </tr>

                          <tr>
                              <th scope>Pass Creation Date</th>
                              <td>".$row['PasscreationDate']."</td>
                              <th scope>Status of Pass</th>
                              <td>";
                              $t=$row['type'];
                              if($t==1)
                              {
                                echo "<span style='color: green'>Accepted</span>";
                              }
                              else if($t==-1)
                              {
                                echo "<span style='color: red;'>Rejected</span>";
                              }
                              else
                              {
                                echo "<span style='color: orange;'>Pending</span>";
                              }
                              "</td>
                          </tr>

                          ";
                      }
                  }
                  else {
                    echo "
                        <div class='ui red raised segment centered header'>
                          No Passes found
                        </div>
                    ";
                  } 
                                   
                ?>              
             </tbody>
          </table>
      </div><br>
          <p style="text-align: center;font-size: 20px;">
            <input type="button" value="print" onclick="print()" />
          </p>
      </div>
    </div>
  </div>

		</div>

	</div>


	  <script src="./assets/metisMenu/jquery.metisMenu.js"></script>
    <script src="./assets/pace/pace.js"></script>
    <script src="./assets/scripts/siminta.js"></script>

    <script src="./assets/dataTables/jquery.dataTables.js"></script>
    <script src="./assets/dataTables/dataTables.bootstrap.js"></script>
</body>
</html>
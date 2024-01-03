<?php
	session_start();
	include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curfiew E-Pass Management System | Grant Pass</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link href="./assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
            <div class="ui blue raised segment centered header">
              Grant Passes
            </div>

          <div class="ui raised segment">
            <div class="ui stackable grid">
              <div class="row">
                <div class="twelve wide column"></div>
                <div class="four wide column">
                  
                  <div class="tb_search">
                    <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search" class="form-control">
                  </div>

                </div>
              </div>

              <div class="table-responsive" id="table-id">
                <?php

                echo '

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                ';

                 $sql="select * from pass where type=0";

                $result=$con->query($sql);

              if($result->num_rows>0)
              {
                      echo "

                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Pass Number</th>
                                <th>Full Name</th>
                                <th>Phone no.</th>
                                <th>Creation Date</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                      ";
                      $c=1;
                      while($row=$result->fetch_assoc())
                      {
                          $id=$row['ID'];
                          echo "

                          <tr>
                              <td>".$c++."</td>
                              <td>".$row['Passnumber']."</td>
                              <td>".$row['Fullname']."</td>
                              <td>".$row['Phone']."</td>
                              <td>".$row['PasscreationDate']."</td>
                              <td>".$row['Category']."</td>
                              <td>
                                <button class='ui green button' onclick='grant($id)'>Grant</button> <button class='ui red button' onclick='reject($id)'>Reject</button>
                              </td>
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
      </div>
    </div>
    </div>
  </div>

    </div>

  </div>


    <script src="./assets/metisMenu/jquery.metisMenu.js"></script>
    <script src="./assets/pace/pace.js"></script>
    <script src="./assets/scripts/siminta.js"></script>

    <script src="./assets/dataTables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="./assets/dataTables/table_search.js"></script>
</body>
</html>
<script>
    
  function grant(id)
  {
    location.href="grant.php?grant_id="+id;
  }

  function reject(id)
  {
    location.href="reject.php?reject_id="+id;
  }

</script>
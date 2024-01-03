<?php
	session_start();
	include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curfiew E-Pass Management System | Manage passes</title>
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
              Manage Passes
            </div>

    <div class="ui two stackable buttons">
      <div class="ui blue button" id="m1" onclick="fun1()">Accepted Passes</div>
      <div class="ui button" id="m2" onclick="fun2()">Rejected Passes</div>
    </div><br><br>

      <section id="one">
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

                 $sql="select * from pass where type=1 order by PasscreationDate desc";

                $result=$con->query($sql);

              if($result->num_rows>0)
              {
                      echo "

                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Pass Number</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone no.</th>
                                <th>Creation Date</th>
                                <th>Valid Till</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                      ";
                      $c=1;
                      while($row=$result->fetch_assoc())
                      {
                          echo "

                          <tr>
                              <td>".$c++."</td>
                              <td>".$row['Passnumber']."</td>
                              <td>".$row['Fullname']."</td>
                              <td>".$row['Email']."</td>
                              <td>".$row['Phone']."</td>
                              <td>".$row['PasscreationDate']."</td>
                              <td>".$row['ToDate']."</td>
                              <td>
                                <a href='view-pass.php?viewid=".$row['ID']."'>View</a> || <a href='edit-pass.php?editid=".$row['ID']."'>Edit</a> || 
                                  <button class='ui red button' onclick='deny(".$row['ID'].")'>Deny</button>
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

  </section>

  <section id="two" style="display: none;">
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

                 $sql="select * from pass where type=-1 order by PasscreationDate desc";

                $result=$con->query($sql);

              if($result->num_rows>0)
              {
                      echo "

                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Pass Number</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone no.</th>
                                <th>Creation Date</th>
                                <th>Valid Till</th>
                            </tr>
                        </thead>
                        <tbody>

                      ";
                      $c=1;
                      while($row=$result->fetch_assoc())
                      {
                          echo "

                          <tr>
                              <td>".$c++."</td>
                              <td>".$row['Passnumber']."</td>
                              <td>".$row['Fullname']."</td>
                              <td>".$row['Email']."</td>
                              <td>".$row['Phone']."</td>
                              <td>".$row['PasscreationDate']."</td>
                              <td>".$row['ToDate']."</td>
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
  </section>

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
    
  function deny(id)
  {
    location.href="deny.php?deny_id="+id;
  }

  function fun1()
  {
    document.getElementById('one').style.display="block";
    document.getElementById('two').style.display="none";
    document.getElementById('m1').setAttribute("class","ui blue button");
    document.getElementById('m2').setAttribute("class","ui button");
  }

  function fun2()
  {
    document.getElementById('one').style.display="none";
    document.getElementById('two').style.display="block";
    document.getElementById('m1').setAttribute("class","ui button");
    document.getElementById('m2').setAttribute("class","ui blue button");
  }

</script>
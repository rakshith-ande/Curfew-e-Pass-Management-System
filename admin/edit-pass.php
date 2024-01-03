<?php
  session_start();
  include '../includes/dbconnection.php';
  $id=$_GET['editid'];
  if(isset($_POST['submit']))
  {
      $fname=$_POST['fullname'];
      $phno=$_POST['phno'];
      $email=$_POST['email'];
      $anum=$_POST['anum'];
      $fdate=$_POST['fromdate'];
      $tdate=$_POST['todate'];
      $cat=$_POST['category'];

      $sql="update pass set Fullname='".$fname."', Phone='".$phno."',  Email='".$email."', AadharCardno='".$anum."', Category='".$cat."', FromDate='".$fdate."', ToDate='".$tdate."' where ID='".$id."'";

      if($con->query($sql)==TRUE)
      {
          echo "

          <script>
            alert('Pass Details Updated successfully');
          </script>

          ";
      }
      else
      {
          echo "

          <script>
            alert('Failed to update the Pass Details');
          </script>

          ";
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Edit Pass</title>
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

  <div id="side">
  <div class="ui stackable grid">
      <div class="four wide column"></div>

      <div class="ten wide column">

      <div class="ui blue raised segment">
      <form class="ui form" method="post">
          <div class="ui blue header">Edit Pass</div>

          <hr>

          <?php
              $sql="select * from pass where ID='".$id."'";
              $result=$con->query($sql);
              if($result->num_rows==1)
              {
                  while($row=$result->fetch_assoc())
                  {
          ?>

          <div class="ui field">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?php echo $row['Fullname']?>" required='true'>
          </div>

          <div class="ui field">
            <label>Contact Number</label>
            <input type="text" name="phno" value="<?php echo $row['Phone']?>" required='true' maxlength="10">
          </div>

          <div class="ui field">
            <label>Email Address</label>
            <input type="email" name="email" value="<?php echo $row['Email']?>" required='true'>
          </div>

          <div class="ui field">
            <label>Aadhar Card No</label>
            <input  type="text" name="anum" value="<?php echo $row['AadharCardno']?>" required='true'>
          </div>

          <div class="ui field">
            <label>From Date</label>
            <div class="ui calendar">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="fromdate" value="<?php echo $row['FromDate']?>" required='true'>
              </div>
            </div>
          </div>

          <div class="ui field">
            <label>To Date</label>
            <div class="ui calendar">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="todate" value="<?php echo $row['ToDate']?>">
              </div>
            </div>
          </div>

          <div class="ui field">
            <label>Pass Creation Date</label>
            <input type="text" value="<?php echo $row['PasscreationDate']?>" readonly='true'>
          </div>

          <div class="ui field">
            <label>Category</label>
            <select class="ui search dropdown" name="category" required='true'>
                <option value="<?php echo $row['Category']?>"><?php echo $row['Category']?></option>

          <?php
               }
            }
          ?>

            <?php
                $sql="select * from category";
                $result=$con->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                      echo "
                      <option value='".$row['CategoryName']."'>".$row['CategoryName']."</option>";

                    }
                }
            ?>

              </select>
          </div>

          <br>

          <center><button class="ui blue button" type="edit" name="submit">Edit</button></center>
        </form>
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
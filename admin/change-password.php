<?php
  session_start();
  include '../includes/dbconnection.php';
    if(isset($_POST['submit']))
    {
        $curr=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];

        $sql="select Password from users where ID='".$_SESSION['user']."'";
        $result=$con->query($sql);
        $p="";
        if($result->num_rows==1)
        {
            while($row=$result->fetch_assoc())
            {
                $p=$row['Password'];
            }
        }
        if($p==$curr)
        {
            $sql1="update users set Password='".$cpwd."' where ID='".$_SESSION['user']."'";
            if($con->query($sql1)==TRUE)
            {
                echo "
                
                  <script>
                    alert('Password Changed Successfully');
                  </script>

                ";
            }
            else
            {
                echo "
                
                  <script>
                    alert('Password Change Failed');
                  </script>

                ";
            }
        }
        else
        {
            echo "
            
              <script>
                  alert('Password Change Failed');
              </script>

            ";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Change Password</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link href="./assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <script>
	    function valid()
	    {
	        if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
	        {
	            alert("New Password and Confirm Password Field do not match  !!");
	            document.chngpwd.cpwd.focus();
	            return false;
	        }
	        return true;
	    }
	</script>
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
         <div class="ui blue header">Change Password</div>
            <hr>
          <form class="ui form" method="post" name="chngpwd" onSubmit="return valid();">
              <div class="ui field">
                  <label>Current Password</label>
                  <input type="password" name="pwd" required>
              </div>
              <div class="ui field">
                  <label>New Password</label>
                  <input type="password" name="npwd" required>
              </div>
              <div class="ui field">
                  <label>Confirm Password</label>
                  <input type="password" name="cpwd" required>
              </div>
              <div class="ui field">
                 <center><button class="ui blue button" type="submit" name="submit">Change Password</button></center>
              </div>
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
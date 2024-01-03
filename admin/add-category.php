<?php
  session_start();
  include '../includes/dbconnection.php';
  if(isset($_POST['submit']))
  {
      $name=$_POST['cname'];

      $sql="insert into category(CategoryName) values('$name')";

      if($con->query($sql)==TRUE)
      {
          echo "

          <script>
            alert('Category Added successfully');
          </script>

          ";
      }
      else
      {
          echo "

          <script>
            alert('Failed to add Category');
          </script>

          ";
      }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Curfew Pass Management System | Add Category</title>
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

        <div class="ui blue raised header segment">
            Add Category
        </div>

        <div class="ui raised segment">
         
          <form class="ui form" method="post">
              <div class="ui field">
                  <label>Category Name</label>
                  <input type="text" name="cname" required>
              </div>
              <div class="ui field">
                  <button class="ui blue button" type="submit" name="submit">Add</button>
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
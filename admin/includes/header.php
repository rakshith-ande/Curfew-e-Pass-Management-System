<?php
    include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/semantic.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/menu.css">
</head>
<body>

    <nav class="navbar navbar-light" style="background-color: #53A3A3;height: 70px;">
        <a class="navbar-brand" style="font-weight: bold;color: white;font-size: 40px;cursor: pointer;">CePMS</a>

        <ul class="nav navbar-right">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <?php
                        $sql="select UserName from users where ID='".$_SESSION['user']."'";
                        $result=$con->query($sql);
                        if($result->num_rows==1)
                        {
                            while($row=$result->fetch_assoc())
                            {
                                echo "<span style='font-size: 20px;color: white;font-weight: bold;'>".$row['UserName']."</span>&nbsp";
                            }
                        }
                    ?>
                   <i class="user big icon" style="padding: 5px 0px 42px;color: white;"></i> 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="./user-profile.php" class="dropdown-item"><i class="user icon"></i>&nbsp;User Profile</a>
                    <a href="./change-user-password.php" class="dropdown-item"><i class="settings icon"></i>&nbsp;Settings</a>
                    <a href="./add-user-pass.php" class="dropdown-item"><i class="file icon"></i>&nbsp;Add Pass</a>
                    <a href="./my-passes.php" class="dropdown-item"><i class="copy icon"></i>&nbsp;My Passes</a>
                    <div class="dropdown-divider"></div>
                    <a href="./logout.php" class="dropdown-item"><i class="sign out icon"></i>&nbsp;Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
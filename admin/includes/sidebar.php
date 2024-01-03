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

<div id="side1">

    <div class="pusher">
        <nav class="navbar navbar-light" style="background-color: #53A3A3;height: 70px;">
    <a href="./dashboard.php" class="navbar-brand" style="font-weight: bold;color: white;font-size: 40px;">CePMS</a>

    <ul class="nav navbar-right">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">
               <i class="user big icon" style="padding: 5px 0px 42px;color: white;"></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="./admin-profile.php" class="dropdown-item"><i class="user icon"></i>&nbsp;User Profile</a>
                <a href="./change-password.php" class="dropdown-item"><i class="settings icon"></i>&nbsp;Settings</a>
                <div class="dropdown-divider"></div>
                <a href="./logout.php" class="dropdown-item"><i class="sign out icon"></i>&nbsp;Logout</a>
            </div>
        </li>
    </ul>
</nav>

        <!--side menu-->
        <?php

            if(isset($_SESSION['user'])==true)
            {
                echo '

                <div class="ui visible sidebar left vertical inverted menu" style="background-color: #04B173;">
                    <a href="./dashboard.php" class="item" style="background-color: #53A3A3;">
                        <h3 align="center" style="color: white;font-size: 40px;height: 45px;margin-left: -40px;">CePMS</h3>
                    </a>
                    <a class="item" style="background-color: #53A3A3;">
                        ';?>
                        <?php
                        $user=$_SESSION['user'];
                        $sql="select UserName from users where ID='".$user."'";
                        $result=$con->query($sql);
                        if($result->num_rows==1)
                        {
                            while($row=$result->fetch_assoc())
                            { 
                                echo '
                                    <div class="ui centered header" style="font-size: 20px;color: white;margin-left: -70px;">
                                        <i class="user icon"></i>
                                        '.$row['UserName'].'
                                    </div>
                                    ';
                            }
                        }
                echo '
                    </a>
                    <a href="./dashboard.php" class="item" id="item"><b><i class="dashboard icon"></i>&nbsp;DASHBOARD</b></a>
                    <div class="ui accordion">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="clipboard outline icon"></i>&nbsp;CATEGORIES</b>
                            <i class="dropdown icon" style="margin-left: 80px;"></i></div>
                        </div>
                        <div class="content" style="margin-left: 25px;">
                            <a href="./add-category.php" class="item" id="item">
                                <div><p><b>ADD CATEGORIES</b></p></div>
                            </a>
                            <a href="./manage-categories.php" class="item" id="item">
                                <div><p><b>MANAGE CATEGORIES</b></p></div>
                            </a>
                        </div>
                    </div>
                    <div class="ui accordion" style="margin-top: 3px;">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="copy outline icon"></i>&nbsp;PASSES</b>
                            <i class="dropdown icon" style="margin-left: 120px;"></i></div>
                        </div>
                        <div class="content" style="margin-left: 25px;">
                            <a href="./add-pass.php" class="item" id="item">
                                <div><p><b>ADD PASSES</b></p></div>
                            </a>
                            <a href="./manage-passes.php" class="item" id="item">
                                <div><p><b>MANAGE PASSES</b></p></div>
                            </a>
                            <a href="./grant-pass.php" class="item" id="item">
                                <div><p><b>GRANT PASS</b></p></div>
                            </a>
                            <a href="./userwise-passes.php" class="item" id="item">
                                <div><p><b>USERWISE PASS</b></p></div>
                            </a>
                        </div>
                    </div> 
                    <a href="./search-pass.php" class="item" id="item"><b><i class="search icon"></i>&nbsp;SEARCH PASS</b></a>
                </div>

                ';
            }

        ?>

        <!--//side menu-->
</div>
</div>

<!--for mobile view-->
<div id="side2">

    <div class="pusher">
        <nav class="navbar navbar-light" style="background-color: #53A3A3;height: 70px;">
    <a href="./dashboard.php" class="navbar-brand" style="font-weight: bold;color: white;font-size: 40px;">CePMS</a>

    <ul class="nav navbar-right">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">
               <i class="user big icon" style="padding: 5px 0px 42px;color: white;"></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="./user-profile.php" class="dropdown-item"><i class="user icon"></i>&nbsp;User Profile</a>
                <a href="./change-password.php" class="dropdown-item"><i class="settings icon"></i>&nbsp;Settings</a>
                <div class="dropdown-divider"></div>
                <a href="./logout.php" class="dropdown-item"><i class="sign out icon"></i>&nbsp;Logout</a>
            </div>
        </li>
    </ul>
</nav>

        <!--side menu-->
        <?php

            if(isset($_SESSION['user'])==true)
            {
                echo '

                <div class="ui sidebar left vertical inverted menu" style="background-color: #04B173;">
                    <a href="./dashboard.php" class="item" style="background-color: #53A3A3;">
                        <h3 align="center" style="color: white;font-size: 40px;height: 45px;margin-left: -40px;">CePMS</h3>
                    </a>
                    <a class="item" style="background-color: #53A3A3;">
                        ';?>
                        <?php
                        $user=$_SESSION['user'];
                        $sql="select UserName from users where ID='".$user."'";
                        $result=$con->query($sql);
                        if($result->num_rows==1)
                        {
                            while($row=$result->fetch_assoc())
                            { 
                                echo '
                                    <div class="ui centered header" style="font-size: 20px;color: white;margin-left: -70px;">
                                        <i class="user icon"></i>
                                        '.$row['UserName'].'
                                    </div>
                                    ';
                            }
                        }
                echo '
                    </a>
                    <a href="./dashboard.php" class="item" id="item"><b><i class="dashboard icon"></i>&nbsp;DASHBOARD</b></a>
                    <div class="ui accordion">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="clipboard outline icon"></i>&nbsp;CATEGORIES</b>
                            <i class="dropdown icon" style="margin-left: 80px;"></i></div>
                        </div>
                        <div class="content" style="margin-left: 25px;">
                            <a href="./add-category.php" class="item" id="item">
                                <div><p><b>ADD CATEGORIES</b></p></div>
                            </a>
                            <a href="./manage-categories.php" class="item" id="item">
                                <div><p><b>MANAGE CATEGORIES</b></p></div>
                            </a>
                        </div>
                    </div>
                    <div class="ui accordion" style="margin-top: 3px;">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="copy outline icon"></i>&nbsp;PASSES</b>
                            <i class="dropdown icon" style="margin-left: 120px;"></i></div>
                        </div>
                        <div class="content" style="margin-left: 25px;">
                            <a href="./add-pass.php" class="item" id="item">
                                <div><p><b>ADD PASSES</b></p></div>
                            </a>
                            <a href="./manage-passes.php" class="item" id="item">
                                <div><p><b>MANAGE PASSES</b></p></div>
                            </a>
                            <a href="./grant-pass.php" class="item" id="item">
                                <div><p><b>GRANT PASS</b></p></div>
                            </a>
                            <a href="./userwise-passes.php" class="item" id="item">
                                <div><p><b>USERWISE PASS</b></p></div>
                            </a>
                        </div>
                    </div> 
                    <a href="./search-pass.php" class="item" id="item"><b><i class="search icon"></i>&nbsp;SEARCH PASS</b></a>
                </div>

                ';
            }

        ?>

        <div class="ui icon menu" id="sidemenu" style="margin-top: 0px;">
            <div id="toggle" class="item">
                <i class="sidebar icon" style="cursor: pointer;"></i>&nbsp;
            </div>
            <div class="right menu">
                <div class="item">
                    <?php
                        $user=$_SESSION['user'];
                        $sql="select UserName from users where ID='".$user."'";
                        $result=$con->query($sql);
                        if($result->num_rows==1)
                        {
                            while($row=$result->fetch_assoc())
                            { 
                                echo '
                                    <div class="ui centered header" style="font-size: 14px;">
                                        <strong>'.$row['UserName'].'</strong>
                                    </div>
                                    ';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--//side menu-->
        <script>
            $("#toggle").click(function(){
                $(".ui.sidebar").sidebar("toggle");
            })
        </script>
</div>
</div>
<!--//mobile side bar-->
        <script>

            $(document).ready(function() {
              $(".ui.accordion").accordion();
            });

        </script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
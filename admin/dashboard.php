<?php
    session_start();
    include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html>

<head>
    
    <title>Curfew Pass Management System | Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/sidebar1.css">
</head>

<body>

    <!--top header-->
    <?php
        include './includes/sidebar.php';
    ?>
    <!--//top header-->

    <div id="side">
    <div class="ui stackable grid">
        <div class="row">
            <div class="four wide column"></div>

            <div class="four wide column">
                <div class="ui raised segment">

                    <a href="./manage-categories.php">
                    <div class="ui segment" style="background-color: pink;color: black;">
                        <i class="calendar alternate outline huge icon"></i>
                        <span style="font-size: 18px;font-weight: bold;">
                        <?php
                            $sql1="select ID from category";
                            $result=$con->query($sql1);
                            if($result)
                            {
                                $row=mysqli_num_rows($result);
                                print($row);
                            }
                        ?>
                        &nbsp;&nbsp;Total Categories</span>
                    </div>
                    </a>

                </div>
            </div>

            <div class="four wide column">
                <div class="ui raised segment">

                    <a href="./total-passes.php">
                    <div class="ui segment" style="background-color: lightgreen;color: black;">
                        <i class="save huge icon"></i>
                        <span style="font-size: 18px;font-weight: bold;">
                        <?php
                            $sql1="select ID from pass";
                            $result=$con->query($sql1);
                            if($result)
                            {
                                $row=mysqli_num_rows($result);
                                print($row);
                            }
                        ?>
                        &nbsp;&nbsp;Total Passes</span>
                    </div>
                    </a>

                </div>
            </div>

            <div class="four wide column">
                <div class="ui raised segment">

                    <a href="./today-passes.php">
                    <div class="ui segment" style="background-color: violet;color: black;">
                        <i class="edit huge icon"></i>
                        <span style="font-size: 15px;font-weight: bold;">
                        <?php
                            $sql1="select ID from pass where date(PasscreationDate)=CURDATE()";
                            $result=$con->query($sql1);
                            if($result)
                            {
                                $row=mysqli_num_rows($result);
                                print($row);
                            }
                        ?>
                        &nbsp;&nbsp;Pass Created Today</span>
                    </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="four wide column"></div>

            <div class="four wide column">
                <div class="ui raised segment">

                    <a href="./yesterdays-passes.php">
                    <div class="ui segment" style="background-color: lightblue;color: black;">
                        <i class="edit huge icon"></i>
                        <span style="font-size: 13px;font-weight: bold;">
                        <?php
                            $sql1="select ID from pass where date(PasscreationDate)=CURDATE()-1";
                            $result=$con->query($sql1);
                            if($result)
                            {
                                $row=mysqli_num_rows($result);
                                print($row);
                            }
                        ?>
                        &nbsp;&nbsp;Pass Created Yesterday</span>
                    </div>
                    </a>

                </div>
            </div>

            <div class="four wide column">
                <div class="ui raised segment">

                    <a href="last-7days-passes.php">
                    <div class="ui segment" style="background-color: pink;color: black;">
                        <i class="edit huge icon" style="margin-left: -5px;"></i>
                        <span style="font-size: 12px;font-weight: bold;">
                        <?php
                            $sql1="select ID from pass where PasscreationDate>=(DATE(NOW())- INTERVAL 7 DAY)";
                            $result=$con->query($sql1);
                            if($result)
                            {
                                $row=mysqli_num_rows($result);
                                print($row);
                            }
                        ?>&nbsp;&nbsp;Pass Created in Seven Days</span>
                    </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
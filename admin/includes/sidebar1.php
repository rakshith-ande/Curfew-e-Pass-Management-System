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
    <style>
        #item
        {
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="pusher">
        <!--side menu-->
        <?php

            if(isset($_SESSION['user'])==true)
            {
                echo '

                <div class="ui sidebar left vertical inverted visible menu" style="background-color: #53A3A3;">
                    <a href="./dashboard.php" class="item" id="item"><b><i class="dashboard icon"></i>&nbsp;DASHBOARD</b></a>
                    <div class="ui accordion">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="clipboard outline icon"></i>&nbsp;CATEGORIES</b>
                            <i class="dropdown icon" style="margin-left: 80px;"></i></div>
                        </div>
                        <div class="content">
                            <a href="#" class="item" id="item">
                                <div><p><b>ADD CATEGORIES</b></p></div>
                            </a>
                            <a href="#" class="item" id="item">
                                <div><p><b>MANAGE CATEGORIES</b></p></div>
                            </a>
                        </div>
                    </div>
                    <div class="ui accordion" style="margin-top: 3px;">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link" id="item"><b><i class="copy outline icon"></i>&nbsp;PASSES</b>
                            <i class="dropdown icon" style="margin-left: 120px;"></i></div>
                        </div>
                        <div class="content">
                            <a href="#" class="item" id="item">
                                <div><p><b>ADD PASSES</b></p></div>
                            </a>
                            <a href="#" class="item" id="item">
                                <div><p><b>MANAGE PASSES</b></p></div>
                            </a>
                        </div>
                    </div> 
                    <a href="./search-pass.php" class="item" id="item"><b><i class="search icon"></i>&nbsp;SEARCH PASS</b></a>
                </div>

                ';
            }
            else
            {
                echo '

                <div class="ui sidebar left vertical inverted menu" style="background-color: #53A3A3;">
                    <a href="./dashboard.php" class="item" id="item"><b><i class="dashboard icon"></i>&nbsp;DASHBOARD</b></a>
                    <div class="ui accordion">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link"><b><i class="clipboard outline icon"></i>&nbsp;CATEGORIES</b>
                            <i class="dropdown icon" style="margin-left: 100px;"></i></div>
                        </div>
                        <div class="content">
                            <a href="#" class="item">
                                <div><p><b>ADD CATEGORIES</b></p></div>
                            </a>
                            <a href="#" class="item">
                                <div><p><b>MANAGE CATEGORIES</b></p></div>
                            </a>
                        </div>
                    </div>
                    <div class="ui accordion">
                        <div class="title" style="color: white;margin-left: 15px;">
                            <div class="link"><b><i class="copy outline icon"></i>&nbsp;PASSES</b>
                            <i class="dropdown icon" style="margin-left: 135px;"></i></div>
                        </div>
                        <div class="content">
                            <a href="#" class="item">
                                <div><p><b>ADD PASSES</b></p></div>
                            </a>
                            <a href="#" class="item">
                                <div><p><b>MANAGE PASSES</b></p></div>
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
                        $sql="select AdminName from admin where ID='".$user."'";
                        $result=$con->query($sql);
                        if($result->num_rows==1)
                        {
                            while($row=$result->fetch_assoc())
                            { 
                                echo '
                                    <div class="ui centered header" style="font-size: 14px;">
                                        <strong>'.$row['AdminName'].'</strong>
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

            $(document).ready(function() {
              $(".ui.accordion").accordion();
            });

        </script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
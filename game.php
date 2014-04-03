<?php
//session_start();
//require_once 'controllers/users.php';

//Check to see if user is logged in.  Create new User object
//	$user = new User();
//	$user->confirm_User();

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/main.css"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
	<script src="js/views/unitclicked.js"></script>

    <!--    require js-->
    <script src="js/require.js"></script>
    <script type="text/javascript">
        var date = new Date();
        var urlArgs = '' + (date.getMonth() + 1) + date.getDate() + date.getHours() + date.getMilliseconds();
        require([], function () {
            require.config({
                baseUrl: 'js',
//                urlArgs: 'v=' + urlArgs,
                paths: {
                    views: 'views',
                    controllers: 'controllers',
                    data: 'data'
                }
            });
        });
    </script>

    <title>CS 4750 Demo</title>
</head>
<body>
<div class="wrapper">
    <?php require_once "mainMenu.php"; ?>
    <div id="gameContent" class="content">
        <?php require_once "gameBoard.php"; ?>
    </div><!-- /gameContent-->

    <div id="adminContent" class="content clearfix">
        <h1>Admin Panel</h1>
        <div class='sideNav'>
            <ul>
                <li id="editUnits" class="active adminSideNav">Edit Units</li>
                <li id="editBuildings" class="adminSideNav">Edit Buildings</li>
            </ul>
        </div><!--/sideNav-->

        <div id="editUnitsContent" class="adminContent">
            <?php include "editUnits.php"; ?>
        </div><!--/editUnits-->

        <div id="editBuildingsContent" class="adminContent">
            <?php include "editBuildings.php"; ?>
        </div><!--/editUnits-->
   
    </div><!-- /adminContent-->

    <div id="scoreboardContent" class="content">
        <h1>Scoreboard</h1>
        <?php include "scoreBoard.php"; ?>
    </div><!-- /scoreboardContent-->

</div>
<!--/wrapper-->
</body>
</html>

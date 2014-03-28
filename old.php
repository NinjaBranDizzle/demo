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

    <title>CS 4750</title>
</head>
<body>
<div class="wrapper">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#welcome" data-toggle="tab">Welcome</a></li>
        <li><a href="#home" data-toggle="tab">Game Board</a></li>
        <li><a href="#mapEditor" data-toggle="tab">Edit Map</a></li>
        <li><a href="#units" data-toggle="tab">Edit Units</a></li>
        <li><a href="#buildings" data-toggle="tab">Edit Buildings</a></li>
        <li><a href="#scores" data-toggle="tab">Score Board</a></li>
        <li><a href="login.php?status=loggedout">Logout</a></li>
        <li><a href="#credits" data-toggle="tab" onclick="playMusic()">Credits</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="welcome"><?php include 'mainMenu.php'; ?></div>
        <div class="tab-pane" id="home"><?php include 'gameBoard.php'; ?></div>
        <div class="tab-pane" id="mapEditor"><?php include 'mapEditor.php'; ?></div>
        <div class="tab-pane" id="units"><?php include 'editUnits.php'; ?></div>
        <div class="tab-pane" id="buildings"><?php include 'editBuildings.php'; ?></div>
        <div class="tab-pane" id="scores"><?php include 'scoreBoard.php'; ?></div>
        <div class="tab-pane" id="credits"><?php include 'credits.php'; ?></div>
    </div>
</div>
<!--/wrapper-->
</body>
</html>

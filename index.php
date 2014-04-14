<?php
session_start();
require_once 'data/users.php';

//Check to see if user is logged in.  Create new User object
	$user = new User();
	$user->confirm_User();

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
<div id="Main Menu" class="container-fluid" ng-controller="NavController">
    <form>
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="color:#fff;"><h1 class="text-center">Main Menu</h1></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button type="button" id="singlePlayerButton" class="btn btn-primary btn-lg btn-block">Start New Single Player Game</button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button class="btn btn-primary btn-lg btn-block">View Leaderboard</button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button class="btn btn-primary btn-lg btn-block">Logout</button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="singlePlayerModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <ng-view></ng-view>
                </div>
            </div>
        </div>
    </form>
</div><!-- /Main Menu-->
<div id="singlePlayerModal" class="clearfix">
    <h1>Start a new single player game</h1>
    <?php require_once "mapEditor.php" ?>
</div><!--/singlePlayerModal-->
</body>
</html>

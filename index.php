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
<div id="Main Menu" class="container-fluid ng-scope" ng-controller="NavController">
    <form class="ng-pristine ng-valid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4"><h1 class="text-center">Main Menu</h1></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modal" ng-click="go('/editBuildings')">
                        Start New Single Player Game
                    </button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button type="button" class="btn btn-primary btn-lg btn-block" value="Multi" ng-click="startMPGame()">Start New Two Player
                        Game
                    </button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button type="button" class="btn btn-primary btn-lg btn-block" value="Load" ng-click="loadSavedGame()">Load Saved Game
                    </button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" ng-click="viewLeaderboard()">
                        View Leaderboard
                    </button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>
                    <button class="btn btn-primary btn-lg btn-block" ng-click="logout()">Logout
                    </button>
                </p>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="singlePlayerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- ngView: undefined --><ng-view class="ng-scope"><div class="modal-header ng-scope">
    <h4 class="modal-title" id="singlePlayerModalLabel">Choose Your Map Settings</h4>
</div>
<div class="modal-body ng-scope">
    

<?php include_once "editBuildings.php"; ?>

        <div class="row">
            <div class="form-group">
                <div class="col-sm-2">
                    <button type="button" id="nextModal" class="btn nextButton2 btn-primary btn-lg btn-block" >
                        Next
                    </button>
                </div>
            </div>
        </div>

    


</div>
<div class="modal-footer ng-scope">
    <button type="button" class="btn btn-default" data-dismiss="modal">Back to Main Menu</button>
</div>
</ng-view>
                </div>
            </div>
        </div>

        <!-- Modal for Leaderboard
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;<button>
                        <h4 class="modal-title" id="myModalLabel">Leaderboard</h4>
                    </div>
                    <div class="modal-body">
                        <!-- include the leaderboard here
                        <?php include 'scoreBoard.php'; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Back to Main Menu</button>
                    </div>
                </div>
            </div>
        </div>

-->
    </form>
</div>
   <div id="selectBuilding" style="display:none;">
      <h1>Choose Your Map Settings</h1>
      <?php include_once "editBuildings.php"; ?>
   </div>
</body>
<!--/wrapper-->
</body>
</html>

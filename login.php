<?php
  session_start(); 
	require_once 'data/users.php';
	$user = new User();

	//If the user clicks the "logged out" on the index page
	if(isset($_GET['status']) && $_GET['status'] == 'loggedout'){
		$user->log_User_Out();
	}

	//Did the user enter a password/username and click submit?
	if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])){
		$response = $user -> validateUser($_POST['username'], $_POST['pwd']);
	}

	//include 'header.php'; 


?>
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
   <div id="login">
   	<form method="post" action="">
         <h1>Login</h1>
   		<p>
   			<input type="text" placeholder="Username" name="username" />
   		</p>
   		<p>
   			<input type="password" placeholder="Password" name="pwd" />
   		</p>
   		<p>
   			<input type="submit" id="submit" class="btn btn-primary btn-sm" value="Login" name="submit" />
   		</p>
   	</form>
      <p id="register" style="cursor:pointer;">Register</p>
   	<?php if(isset($response)) echo "<h4 class='alert'>". $response  ."</h4>"; ?>
   </div><!-- /login-->
   <div id="registerContent">
      <?php include_once "register.php"; ?>
   </div><!--/register-->
</body>
</html>
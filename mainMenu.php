
<body>
   <div id="Main Menu">
   	<form method="post" action="">
         <h1>Main Menu</h1>
   		<p>
   			<button type="button" id="startSingle" class="btn btn-primary btn-sm" value="Single">Start New Single Player Game</button>
   		</p>
   		<p>
   			<button type="button" class="btn btn-primary btn-sm" value="Multi">Start New Two Player Game</button>
   		</p>
		<p>
   			<button type="button" class="btn btn-primary btn-sm" value="Load">Load Saved Game</button>
   		</p>
		<p>
   			<button type="button" class="btn btn-primary btn-sm" value="Leaderboard">View Leaderboard</button>
   		</p>
		<p>
   			<button type="button" class="btn btn-primary btn-sm" value="Logout"><a href="login.php?status=loggedout" >Logout</a></button>
   		</p>
   	</form>
   </div><!-- /Main Menu-->
   <div id="selectBuilding" style="display:none;">
      <h1>Choose Your Map Settings</h1>
      <?php //include_once "editBuildings.php"; ?>
   </div>
</body>
</html>
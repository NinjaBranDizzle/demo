<?php
    require_once 'data/mysql.php';
    $mysql = New Mysql();
    $getScores = $mysql->loadScoreboard();
?>
<div class="scoreboard">
    <h1>Add New Score</h1>
    <div class="row">
        <form class="form-horizontal" role="form" >
            <div class="form-group clearfix">
                <div class="col-sm-4">
                    <input id="scoreurl" type="text" class="form-control" placeholder="Image URL or path" />
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-sm-4">
                    <input id="scoreName" type="text" class="form-control" placeholder="Name" />
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-sm-4">
                    <input id="scoreAmount" class="form-control" type="text" placeholder="Score" />
                </div>
            </div>
            <div class="form-group clearfix">   
                <button type="button" id="submitScore" class="btn btn-primary saveBtn">Add Score</button>
            </div>
        </form>
    </div>
    
<?php 
    foreach($getScores as $score){ ?>
    <div class="bar clearfix">
        <div class="imgContainer col">
            <img src="<?php echo $score['url']; ?>" width="80px">
        </div>
        <div class="nameContainer col">
            <p class="player"><?php echo $score['name']; ?></p>
        </div>
        <div class="scoreContainer col">
            <p class="score"><?php echo $score['score']; ?></p>
        </div>
    </div>
<?php } ?>
</div>
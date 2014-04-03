<?php
    require_once 'data/mysql.php';
    $mysql = New Mysql();
    $getScores = $mysql->loadScoreboard();
?>
<div class="scoreboard">
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
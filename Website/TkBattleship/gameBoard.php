<?php
require 'gameGrid.php';
/*require 'gamedb.php';*/
require 'data/mysql.php';
$mysql = New Mysql();
$mysql->loadGame();
drawgrid();

if ($_GET['saveButton']) {
    $mysql->saveGame();
}

?>

<div class="buttonContainer clearfix">
    <div class="mapSelect">
        <select id="map" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <button id="selectMap" class="btn btn-primary btn-sm">Select Map</button>
    </div>
    <div class="gridSelect">
        <button id="toggleGridOff" class="btn btn-danger btn-sm">Grid Off</button>
        <button id="toggleGridOn" class="btn btn-success btn-sm">Grid On</button>
    </div>
</div>

<button id="save" class=" btn btn-success btn-sm">Save</button>
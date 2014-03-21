<!--
	Optionally list each building and have them select coords..
	Or have 2 drop downs.  One for a blue building and one for a red building
	Have a drop down for map to select.  
-->
<?php

?>

<div class="row">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="building_ID" class="col-sm-2 control-label">Select Blue Building to Place on Map</label>

            <div class="col-sm-2">
                <select class="form-control">
                    <option>Barracks</option>
                    <option>Factory</option>
                    <option>Airport</option>
                    <option>Seaport</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="XCoord" class="col-sm-2 control-label">Building X Coordinate</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="XCoord" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="YCoord" class="col-sm-2 control-label">Building Y Coordinate</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="YCoord" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="building_ID" class="col-sm-2 control-label">Select Red Building to Place on Map</label>

            <div class="col-sm-2">
                <select class="form-control">
                    <option>Barracks</option>
                    <option>Factory</option>
                    <option>Airport</option>
                    <option>Seaport</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="XCoord" class="col-sm-2 control-label">Building X Coordinate</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="XCoord" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="YCoord" class="col-sm-2 control-label">Building Y Coordinate</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="YCoord" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="MapWidth" class="col-sm-2 control-label">Map Size - Width</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="MapWidth" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="MapHeight" class="col-sm-2 control-label">Map Size - Height</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="MapHeight" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>  <!-- end of row -->
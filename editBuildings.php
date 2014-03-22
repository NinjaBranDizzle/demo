<?php
	$mysql->loadBuildingTypes();
	global $buildingTypes;
?>

<div class="row">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="building_ID" class="col-sm-2 control-label">Select Building to Place on Map</label>

            <div class="col-sm-2">
                <select class="form-control" id="buildings">
<?
	//Show the list of building types saved to the DB table building_types.
	foreach($buildingTypes as $value) {
		echo("<option>".$value."</option>");
	}
?>

		</select>
            </div>
        </div>
        <div class="form-group">
            <label for="Health" class="col-sm-2 control-label">Building Health</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="BuildingHealth" placeholder="0"/>
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Parent" class="col-sm-2 control-label">Can Parent</label>

            <div class="checkbox">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_parent" id="can_parent"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="PopProvided" class="col-sm-2 control-label">Pop Provided</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="PopProvided" placeholder="0"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>  <!-- end of row -->
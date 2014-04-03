<?php
    require_once 'data/mysql.php';
    $mysql = New Mysql();
    $getBuildings = $mysql->loadBuildingTypes();
?>

<div class="row">
    <form class="form-horizontal" role="form">
        <div class="clearfix" style="margin-bottom:15px;">
            <label for="building_ID" class="col-sm-5 control-label">Select Building to Place on Map</label>
                <select class="form-control" id="editBuildingSelect" style="width:200px;float:left;">
                    <option value="null">--Building Select--</option>
                <?
                //Show the list of unit types saved to the DB table unit_types.
                foreach($getBuildings as $building){
                    echo "<option value=".$building['NAME'].">".$building['NAME']."</option>";
                }
                ?>  
        		</select>
        </div>
        <div class="form-group">
            <label for="Health" class="col-sm-3 control-label">Building Health</label>

            <div class="col-sm-2">
                <input type="number" class="form-control" id="buildingHealth" placeholder="0"/>
            </div>
        </div>
        <div class="form-group">
            <label for="PopProvided" class="col-sm-3 control-label">Pop Provided</label>

            <div class="col-sm-2">
                <input type="number" class="form-control" id="popProvided" placeholder="0"/>
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Parent" class="col-sm-3 control-label">Can Parent</label>
            <div class="checkbox">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_parent" id="canParent"/>
                </div>
            </div>
        </div>
            <button type="button" id="submitBuildingAtt" class="btn btn-primary saveBtn">Save</button>
    </form>
</div>  <!-- end of row -->
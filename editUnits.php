<?php
    require_once 'data/mysql.php';
	$mysql = New Mysql();
	$getUnits = $mysql->loadUnitTypes();
?>

<div class="row">
    
<div class="clearfix" style="margin-bottom:15px;">
    <label for="unit_ID" class="col-sm-2 control-label">Select Unit to Edit</label>
    <select id="editUnitSelect" style="width:200px;float:left;" class="form-control">
        <option value="null">--Unit Select--</option>
        <?
        //Show the list of unit types saved to the DB table unit_types.
        foreach($getUnits as $unit){
            echo "<option value=".$unit['UNIT_DESC'].">".$unit['UNIT_DESC']."</option>";
        }
        ?>						
    </select>
</div>

    <form class="form-horizontal" role="form" id="editUnitForm">
        <div class="form-group">
            <label for="Health" class="col-sm-2 control-label">Unit Health</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="unitHealth" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Weak_Curse_Mod" class="col-sm-2 control-label">Weak Curse Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="weakCurseMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Strong_Curse_Mod" class="col-sm-2 control-label">Strong Curse Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="strongCurseMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Weak_Buff_Mod" class="col-sm-2 control-label">Weak Buff Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="weakBuffMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Strong_Buff_Mod" class="col-sm-2 control-label">Strong Buff Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="strongBuffMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Parent_Structure" class="col-sm-2 control-label">Parent Structure</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" id="parentStructure"
                       placeholder="Enter the name of the Parent Structure">
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Fly" class="col-sm-2 control-label">Can Fly</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_fly" id="canFly"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Drive" class="col-sm-2 control-label">Can Drive</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_drive" id="canDrive"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Has_Superpower" class="col-sm-2 control-label">Has Super Power</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="hasSuperpower" id="hasSuperPower"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <button type="button" id="submitUnitAtt" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>  	
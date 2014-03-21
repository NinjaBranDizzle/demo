<?php
	$mysql->loadUnitTypes();
	global $unitTypes;
?>

<div class="row">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="unit_ID" class="col-sm-2 control-label">Select Unit to Edit</label>

            <div class="col-sm-2">
                <select id="unit_id" class="form-control">
<?
	//Show the list of unit types saved to the DB table unit_types.
	foreach($unitTypes as $value) {
		echo("<option>".$value."</option>");
	}
?>				
				
				</select>
            </div>
        </div>
        <div class="form-group">
            <label for="UnitDescription" class="col-sm-2 control-label">Unit Description</label>

            <div class="col-sm-5">
                <textarea class="form-control" rows="3" id="UnitDescription"
                          placeholder="Type a description of the unit here"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="Health" class="col-sm-2 control-label">Unit Health</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="UnitHealth" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Weak_Curse_Mod" class="col-sm-2 control-label">Weak Curse Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="WeakCurseMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Strong_Curse_Mod" class="col-sm-2 control-label">Strong Curse Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="StrongCurseMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Weak_Buff_Mod" class="col-sm-2 control-label">Weak Buff Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="WeakBuffMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Strong_Buff_Mod" class="col-sm-2 control-label">Strong Buff Mod</label>

            <div class="col-sm-1">
                <input type="number" class="form-control" id="StrongBuffMod" placeholder="0">
            </div>
        </div>
        <div class="form-group">
            <label for="Parent_Structure" class="col-sm-2 control-label">Parent Structure</label>

            <div class="col-sm-5">
                <input type="text" class="form-control" id="Parent_Structure"
                       placeholder="Enter the name of the Parent Structure">
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Fly" class="col-sm-2 control-label">Can Fly</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_fly" id="can_fly"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Can_Drive" class="col-sm-2 control-label">Can Drive</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="can_drive" id="can_drive"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Has_Superpower" class="col-sm-2 control-label">Has Super Power</label>

            <div class="radio">
                <div class="col-sm-1">
                    <input type="checkbox" name="has_superpower" id="has_superpower"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>  	
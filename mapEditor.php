<?php

?>
	<h2>Select the color of your army</h2>
	<div class="row" style="margin-bottom:15px;">
		<div class="form-group">
			<div class="col-sm-4">
				<!--  radio buttons here -->
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-primary">
						<input type="radio" name="options" id="optionBlue">Blue
					</label>
					<label class="btn btn-danger">
						<input type="radio" name="options" id="optionRed">Red
					</label>
				</div>
			</div>
		</div>
	</div><!-- end of row -->
	<h2>Select a map to play</h2>
    <select id="mapSelect" class="form-control">                                      
        <option value="firestorm">Firestorm</option>               
        <option value="landrush">Land Rush</option>      
        <option value="gulfofoman">Gulf of Oman</option>                    
    </select>

    <select id="layoutSelect" class="form-control">                                      
        <option value="blitzkrieg">Blitzkrieg</option>               
        <option value="oneonone">One on one</option>                         
    </select>
    <img id="selectedMapPreview" src="images/firestormPreview.png" border="0" />

    <button type="button" id="selectMapButton" class="btn btn-primary">Proceed</button>
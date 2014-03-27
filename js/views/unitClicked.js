	var isFirstClick = true;
	var isGoodMove = false;
	var turn = '';

	function changeTurn(turn)
	{
		if (turn == 'Red')
			document.gamedata.turn.value = 'Blue';
		else
			document.gamedata.turn.value = 'Red';
	}

	//addRemove 0 = remove, 1 = add
	function createRemoveHalo(addRemove, row, col, attackRange, moveRange, replaceRow, replaceCol)
	{
		var maxColumns = 17;
		var maxRows = 11;
		var minColumns = 0;
		var minRows = 0;
//alert("row " + row + " moveRange " + moveRange);
		var maxAttackRowRange = row + attackRange;
		var minAttackRowRange = row - attackRange;
		var maxAttackColRange = col + attackRange;
		var minAttackColRange = col - attackRange;

		var maxMoveRowRange = row + moveRange;
		var minMoveRowRange = row - moveRange;
		var maxMoveColRange = col + moveRange;
		var minMoveColRange = col - moveRange;
//alert("row " + row + " minRowRange " + minRowRange + " maxRowRange " + maxRowRange);

		//Make the attackRange halo red
		for (var rowi=minAttackRowRange; rowi<=maxAttackRowRange; rowi++)
		{
			for (var colj=minAttackColRange; colj<=maxAttackColRange; colj++)
			{
				if (colj >= minColumns && colj <= maxColumns)
				{
					if (rowi >= minRows && rowi <= maxRows)
					{
						//if the cell is empty, change it to green.
						var s = document.images[rowi + "-" + colj].src;
						if (!s.match(/Jitter.gif/))
						{
							//If not the clicked cell
							if (!(rowi == row && colj == col)  && !(rowi == replaceRow && colj == replaceCol))
							{
								if (addRemove == 1)
								{
									eval("document.images['"+rowi+"-"+colj+"'].src = 'images/units/emptyCellRed.gif'");
								} else {
//alert("rowi" + rowi + " colj" + colj + " row " + row + " col " + col);
									eval("document.images['"+rowi+"-"+colj+"'].src = 'images/units/emptyCell.gif'");
								}
							}							
						}
					}
				}
			}
		}

		//Make the moveRange halo green
		for (var rowi=minMoveRowRange; rowi<=maxMoveRowRange; rowi++)
		{
			for (var colj=minMoveColRange; colj<=maxMoveColRange; colj++)
			{
				if (colj >= minColumns && colj <= maxColumns)
				{
					if (rowi >= minRows && rowi <= maxRows)
					{
						//if the cell is empty, change it to green.
						var s = document.images[rowi + "-" + colj].src;
						if (!s.match(/Jitter.gif/))
						{
							//If not the clicked cell
							if (!(rowi == row && colj == col)  && !(rowi == replaceRow && colj == replaceCol))
							{
								if (addRemove == 1)
								{
									eval("document.images['"+rowi+"-"+colj+"'].src = 'images/units/emptyCellGreen.gif'");
								} else {
//alert("rowi" + rowi + " colj" + colj + " row " + row + " col " + col);
									eval("document.images['"+rowi+"-"+colj+"'].src = 'images/units/emptyCell.gif'");
								}
							}							
						}
					}
				}
			}
		}
	}



	function cellClickedFirst(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
	{
//alert("cellClickedFirst isFirstClick " + isFirstClick + row + col + turn + " color" + color + " unit" + unit + "fromRow" + document.gamedata.fromRow.value + "fromCol" + document.gamedata.fromCol.value);
		if (color && isFirstClick)
		{
			highlight(row, col, color, unit);
//alert(document.gamedata.fromRow.value);
			createRemoveHalo(0, document.gamedata.fromRow.value, document.gamedata.fromCol.value, document.gamedata.fromAttackRange.value, document.gamedata.fromMoveRange.value, row, col);
			createRemoveHalo(1, row, col, attackRange, moveRange);

			document.gamedata.fromRow.value = row;
			document.gamedata.fromCol.value = col;
			document.gamedata.fromColor.value = color;
			document.gamedata.fromUnit.value = unit;
			document.gamedata.fromHealth.value = health;
			document.gamedata.fromWeakCurse.value = weakCurse;
			document.gamedata.fromStrongCurse.value = strongCurse;
			document.gamedata.fromWeakBuff.value = weakBuff;
			document.gamedata.fromStrongBuff.value = strongBuff;
			document.gamedata.fromAirAttack.value = airAttack;
			document.gamedata.fromAirDefence.value = airDefence;
			document.gamedata.fromGroundAttack.value = groundAttack;
			document.gamedata.fromGroundDefence.value = groundDefence;
			document.gamedata.fromAttackRange.value = attackRange;
			document.gamedata.fromMoveRange.value = moveRange;
			document.gamedata.fromSuperPower.value = superPower;

			//eval("document.images['"+row+"-"+col+"'].src = 'images/units/" + color + unit + "Highlighted.gif'");
			isFirstClick = false;
		} 
	
	}

	function cellClickedSecond(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
	{
//alert("cellClickedSecond " + row + col + turn + " " + color + unit + "fromRow" + document.gamedata.fromRow.value + "fromCol" + document.gamedata.fromCol.value);
		eval("document.images['"+document.gamedata.fromRow.value+"-"+document.gamedata.fromCol.value+"'].src = 'images/units/" + document.gamedata.fromColor.value + document.gamedata.fromUnit.value + "Jitter.gif'");
		isFirstClick = false;

		if ((document.gamedata.fromRow.value == row)
			&& (document.gamedata.fromCol.value == col))
		{
			isFirstClick = true;
			cellClickedFirst(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
/*			isFirstClick = true;
			document.gamedata.fromRow.value = "";
			document.gamedata.fromCol.value = "";
			document.gamedata.fromColor.value = "";
			document.gamedata.fromUnit.value = "";
			document.gamedata.fromHealth.value = "";
			document.gamedata.fromWeakCurse.value = "";
			document.gamedata.fromStrongCurse.value = "";
			document.gamedata.fromWeakBuff.value = "";
			document.gamedata.fromStrongBuff.value = "";
			document.gamedata.fromAirAttack.value = "";
			document.gamedata.fromAirDefence.value = "";
			document.gamedata.fromGroundAttack.value = "";
			document.gamedata.fromGroundDefence.value = "";
			document.gamedata.fromAttackRange.value = "";
			document.gamedata.fromMoveRange.value = "";
			document.gamedata.fromSuperPower.value = "";
*/
		} else {
			if (unit === "")
			{
				playSound("Memo" + document.gamedata.fromUnit.value);
				createRemoveHalo(0, document.gamedata.fromRow.value, document.gamedata.fromCol.value, document.gamedata.fromAttackRange.value, document.gamedata.fromMoveRange.value, row, col);

				isGoodMove = true;
//alert("setting empty cell" + document.gamedata.fromRow.value+"-"+document.gamedata.fromCol.value);
				//set the from cell to an empty image.
				var js = "cellClicked(" + document.gamedata.fromRow.value + "," + document.gamedata.fromCol.value + ",'','','','','');";
				document.getElementById(document.gamedata.fromRow.value + "-" + document.gamedata.fromCol.value).setAttribute("onclick", js);
				eval("document.images['"+document.gamedata.fromRow.value+"-"+document.gamedata.fromCol.value+"'].src = 'images/units/emptyCell.gif'");
				//Clear the hover menu
				document.getElementById(document.gamedata.fromRow.value + '-' + document.gamedata.fromCol.value + 'Content').innerHTML = "";
				document.getElementById(document.gamedata.fromRow.value + '-' + document.gamedata.fromCol.value + 'Content').className = "noUnitStats";

				//Reset the toRow values
				document.gamedata.toRow.value = row;
				document.gamedata.toCol.value = col;

				var js = "cellClicked(" + row + "," + col + ",'" + document.gamedata.fromColor.value + "','" + document.gamedata.fromUnit.value + "'," + document.gamedata.fromHealth.value + "," + document.gamedata.fromWeakCurse.value + "," + document.gamedata.fromStrongCurse.value + "," + document.gamedata.fromWeakBuff.value + "," + document.gamedata.fromStrongBuff.value + "," + document.gamedata.fromAirAttack.value + "," + document.gamedata.fromAirDefence.value + "," + document.gamedata.fromGroundAttack.value + "," + document.gamedata.fromGroundDefence.value + "," + document.gamedata.fromAttackRange.value + "," + document.gamedata.fromMoveRange.value + "," + document.gamedata.fromSuperPower.value + ");";
				document.getElementById(row + "-" + col).setAttribute("onclick", js);
				//document.getElementById(row + "-" + col).onclick = 'alert("hello");'
				eval("document.images['"+row+"-"+col+"'].src = 'images/units/" + document.gamedata.fromColor.value + document.gamedata.fromUnit.value + "Jitter.gif'");
				//Create a new hover menu
				document.getElementById(row + '-' + col + 'Content').innerHTML = "<h4>" + document.gamedata.fromColor.value + document.gamedata.fromUnit.value + "</h4><p>Health: " + document.gamedata.fromHealth.value + "</p><p>Super Power: " + document.gamedata.fromSuperPower.value + "/1</p></div>";
				document.getElementById(row + '-' + col + 'Content').className = "unitStats";
				
				changeTurn(turn);
				isFirstClick = true;
			} else if (unit != '' && color != turn)	{
				createRemoveHalo(0, document.gamedata.fromRow.value, document.gamedata.fromCol.value, document.gamedata.fromAttackRange.value, document.gamedata.fromMoveRange.value, row, col);

				//ATTACK!!
				attack(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower);
			

			} else {
				//Choosing a different unit for the first click
				isFirstClick = true;
				cellClickedFirst(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower);
			}
		}
	}

	function cellClicked(row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
	{
//alert("cellClicked" + row + " " + col + " turn" + turn + " " + color + " " + unit);
//alert("cellClicked" + row + " " + col +  " " + color + " " + unit + " turn" + document.gamedata.turn.value);
		turn = document.gamedata.turn.value;

		if (turn != color && unit != '' && isFirstClick)
		{
			playSound("MemoWrongTurn");
			alert("You must move your own pieces. It is " + turn + "'s turn. \n\nRemember, hugs not drugs.");
			return;
		}
		if (unit == '' && isFirstClick)
		{
			playSound("Doh");
			alert("Please click on one of your units. " + turn);
			return;
		}
		if (isFirstClick) {
			cellClickedFirst(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower);
		} else {
//alert("before cellClickedSecond" + row + " " + col);
			cellClickedSecond(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower);

		}

		if (color == turn && isFirstClick)
		{
			highlight(row, col, color, unit); //eval("document.images['"+row+"-"+col+"'].src = 'images/units/" + color + unit + "Highlighted.gif'");
		} 
		
	}

	function highlight(row, col, color, unit) 
	{
		eval("document.images['"+row+"-"+col+"'].src = 'images/units/" + color + unit + "Highlighted.gif'");
	}

	function attack(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
	{
		playSound("MemoExplosion");
		eval("document.images['"+row+"-"+col+"'].src = 'images/explosion.gif'");
		setTimeout(attackResult(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower), 50000);

	}

	function attackResult(turn, row, col, color, unit, health, weakCurse, strongCurse, weakBuff, strongBuff, airAttack, airDefence, groundAttack, groundDefence, attackRange, moveRange, superPower)
	{
		//Temporary message to show available data elements
		//var msg = "ATTACK!!\n\nHa Ha Ha...All your base are belong to us!\n\n\n";
		var damage = 55;
		health = health - damage;
		if (health <= 0)
		{
			//Remove the unit
			var js = "cellClicked(" + row + "," + col + ",'','','','','');";
			document.getElementById(row + "-" + col).setAttribute("onclick", js);
			//eval("document.images['"+row+"-"+col+"'].src = 'images/units/emptyCell.gif'");
			document.getElementById(row + "-" + col).setAttribute("src", "images/units/emptyCell.gif");
			//Clear the hover menu
			document.getElementById(row + '-' + col + 'Content').innerHTML = "";
			document.getElementById(row + '-' + col + 'Content').className = "noUnitStats";

		} else {
			//Reassign the new health value
			var js = "cellClicked(" + row + "," + col + ",'" + color + "','" + unit + "'," + health + "," + weakCurse + "," + strongCurse + "," + weakBuff + "," + strongBuff + "," + airAttack + "," + airDefence + "," + groundAttack + "," + groundDefence + "," + attackRange + "," + moveRange + "," + superPower + ");";
			document.getElementById(row + "-" + col).setAttribute("onclick", js);

			//Update the hover menu
			document.getElementById(row + '-' + col + 'Content').innerHTML = "<h4>" + color + unit + "</h4><p>Health: " + health + "</p><p>Super Power: " + superPower + "/1</p></div>";
            document.getElementById(row + '-' + col + 'Content').className = "unitStats";
		}

		var msg = document.gamedata.fromColor.value + " " + document.gamedata.fromUnit.value + " attacking " + color + " " + unit + "\n\n";
		if (health < 0)
		{
			playSound("KaBoom");
			msg = msg + color + " " + unit + " has been destroyed.\n";
			if (color == "Red")
				msg = msg + '\n\n' + document.gamedata.fromColor.value + ': "Ha ha ha...all your base are belong to us!"';
			else
				msg = msg + '\n\n' + document.gamedata.fromColor.value + ': "Ha ha ha...get you the hot bullets of machinegun to die!"';
		} else {
			msg = msg + damage + " points of damage inflicted on " + color + " " + unit + "\n";
			msg = msg + "______________________________\n";
			msg = msg + document.gamedata.fromColor.value + " " + document.gamedata.fromUnit.value + "\t\t\t\t\t" + color + " " + unit + "\n";
			msg = msg + "Health:" + document.gamedata.fromHealth.value + "\t\t\t\t" + " Health:" + health;
		}

		alert(msg);
		//Implement battle sequence rules here
		if (health > 0)
		{
			//Replace the explosion with unit if it survived.
			eval("document.images['"+row+"-"+col+"'].src = 'images/units/" + color + unit + "Jitter.gif'");
		}
		
		changeTurn(turn);
		isFirstClick = true;	
	}
	function playMusic() {
		var sound = new Audio();
		sound.src = "sounds/Alice.mp3";
		sound.play();

	}
	function playSound(soundName) {
		//audio.online-convert.com/convert-to-mp3
		//soundbible.com
		var sound = new Audio();
		sound.src = "sounds/" + soundName + ".mp3";
		sound.play();

	}

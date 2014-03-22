<div class="form-group">
    <input type="text" id="playerName" placeholder="Name"/>
    <input type="text" id="score" placeholder="Score"/>

    <button id="make-row" type="button" class="btn-primary">Make Row</button>
</div>

<script type="text/javascript">
    function makeRow(playerName, score) {
        var row = $($('div.bar')[0]).clone();

        row.find('p.player').text(playerName);
        row.find('p.score').text(score);

        row.appendTo($(".scoreboard"));

    }

    $('#make-row').on('mouseup', function () {
        makeRow($('#playerName').val(), $('#score').val());
    });


</script>


<div class="scoreboard">
    <div class="bar clearfix">
        <div class="imgContainer col ">
            <img src="https://db.tt/gpeW8ipD" width="80px" class="p1image">
        </div>
        <div class="nameContainer col">
            <p class="player">Rango</p>
        </div>
        <div class="scoreContainer col">
            <p class="score">210</p>
        </div>
    </div>

    <div class="bar clearfix">
        <div class="imgContainer col ">
            <img src="https://db.tt/o5PYWFFQ" width="80px" class="p2image">
        </div>
        <div class="nameContainer col">
            <p class="player">Rango</p>
        </div>
        <div class="scoreContainer col">
            <p class="score">210</p>
        </div>
    </div>
</div>
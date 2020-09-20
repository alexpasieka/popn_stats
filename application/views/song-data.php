<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pop'n Music Song</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styles.css');?>">
    <script type="text/javascript" src="<?php echo base_url('js/jquery-2.1.4.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('js/script.js');?>"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script>
        <?php $difficulties = explode(",", $query->difficulty); ?>
    </script>
</head>
<body>
    <img src="<?php echo $query->banner ?>">

    <div id="difficultyButtons">
        <span class="difficultyLabel">NORMAL MODE: </span>
        <button id="easy" class="selectedDifficulty" onclick="changeDifficulty(0)">EASY&ensp;<?php echo $difficulties[0] ?></button>
        <button id="normal" onclick="changeDifficulty(1)">N&ensp;<?php echo $difficulties[1] ?></button>
        <button id="hyper" onclick="changeDifficulty(2)">H&ensp;<?php echo $difficulties[2] ?></button>
        <button id="extra" onclick="changeDifficulty(3)">EX&ensp;<?php echo $difficulties[3] ?></button>

        <span class="difficultyLabel">&emsp;BATTLE MODE: </span>
        <button id="normal" onclick="changeDifficulty(4)">N&ensp;<?php echo $difficulties[4] ?></button>
        <button id="hyper" onclick="changeDifficulty(5)">H&ensp;<?php echo $difficulties[5] ?></button>
    </div>

    <center>
    <h1><?php echo $query->title ?></h1>
    <h2><?php echo $query->artist ?></h2>
    <h3><?php echo $query->bpm ?> BPM</h3>
    <h3><?php echo $query->length ?></h3>

    <?php if ($query->delta !== "") { ?>

    <select name="mult">
        <script>
            let select = document.querySelector("select");
            for (let i = 1.0; i < 10.0; i += 0.1) {
                let option = document.createElement("option");
                option.setAttribute("size", (Math.round(i * 100) / 100).toString());
                option.innerHTML = Math.round(i * 100) / 100;
                select.appendChild(option);
            }
        </script>
    </select>

    <button>MULTIPLY</button>

    <?php } ?>
    </center>

    <div id="chart" style="width: 75%;"></div>

    <script>

    </script>

</body>
</html>

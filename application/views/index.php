<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport">
    <title>Pop'n Music Songs</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css');?>">
    <script>
        <?php
        $bpms = array();
        foreach ($query as $row) {
            if (strlen($row->bpm) < 10) {
                for ($i = 0; $i < 5; $i++) {
                    $row->bpm .= "," . $row->bpm;
                }
            }
            $separate = explode(",", $row->bpm);
            array_push($bpms, $separate);
        }

        $difficulties = array();
        foreach ($query as $row) {
            $separate = explode(",", $row->difficulty);
            array_push($difficulties, $separate);
        }
        ?>
    </script>
</head>
<body>
    <img id="logo" src="html/assets/img/logo.png">

    <div id="search">
        <input id="searchBar" placeholder="Search" onkeyup="searchFor()">
    </div>

    <div id="difficultyButtons">
        <span>NORMAL MODE: </span>
        <button id="easy" class="selectedDifficulty" onclick="changeDifficulty(0)">EASY</button>
        <button id="normal" onclick="changeDifficulty(1)">NORMAL</button>
        <button id="hyper" onclick="changeDifficulty(2)">HYPER</button>
        <button id="extra" onclick="changeDifficulty(3)">EXTRA</button>

        <span style="padding-left: 2vw">BATTLE MODE: </span>
        <button id="normal" onclick="changeDifficulty(4)">NORMAL</button>
        <button id="hyper" onclick="changeDifficulty(5)">HYPER</button>
    </div>

    <table>
        <tr>
            <th onclick="sortBy(0, '#titleIcon'); toggleHeader('#titleHeader', 'titleIcon')"
                id="titleHeader"
                class="selectedHeader"
                style="width: 37%"
                >Title<i id="titleIcon" class="fa fa-fw fa-caret-up" data-icon-group="headerIcon">
            </th>
            <th onclick="sortBy(1, '#artistIcon'); toggleHeader('#artistHeader', 'artistIcon')"
                id="artistHeader"
                style="width: 32%"
                >Artist<i id="artistIcon" class="fa fa-fw fa-sort" data-icon-group="headerIcon">
            </th>
            <th onclick="sortBy(2, '#bpmIcon'); toggleHeader('#bpmHeader', 'bpmIcon')"
                id="bpmHeader"
                style="width: 9%"
                >BPM<i id="bpmIcon" class="fa fa-fw fa-sort" data-icon-group="headerIcon">
            </th>
            <th onclick="sortBy(3, '#lengthIcon'); toggleHeader('#lengthHeader', 'lengthIcon')"
                id="lengthHeader"
                style="width: 10%"
                >Length<i id="lengthIcon" class="fa fa-fw fa-sort" data-icon-group="headerIcon">
            </th>
            <th onclick="sortBy(4, '#difficultyIcon'); toggleHeader('#difficultyHeader', 'difficultyIcon')"
                id="difficultyHeader"
                style="width: 12%"
                >Difficulty<i id="difficultyIcon" class="fa fa-fw fa-sort" data-icon-group="headerIcon">
            </th>
        </tr>

        <?php $i = 0; foreach($query as $row) { ?>
        <tr id="_" onclick="location.href='<?php echo site_url("Stats_Controller/songData/" . $row->id) ?>'">
            <td id='<?php echo $row->title ?>'><?php echo $row->title ?></td>
            <td id='<?php echo $row->artist ?>'><?php echo $row->artist ?></td>
            <td id='<?php echo $bpms[$i][0] ?>' class="bpm"
                data-n_easy='<?php echo $bpms[$i][0] ?>'
                data-n_normal='<?php echo $bpms[$i][1] ?>'
                data-n_hyper='<?php echo $bpms[$i][2] ?>'
                data-n_extra='<?php echo $bpms[$i][3] ?>'
                data-b_normal='<?php echo $bpms[$i][4] ?>'
                data-b_hyper='<?php echo $bpms[$i][5] ?>'
                ><?php echo $bpms[$i][0] ?>
            </td>
            <td id="<?php echo $row->length ?>"><?php echo $row->length ?></td>
            <td id='<?php echo $difficulties[$i][0] ?>' class="difficulty"
                data-n_easy='<?php echo $difficulties[$i][0] ?>'
                data-n_normal='<?php echo $difficulties[$i][1] ?>'
                data-n_hyper='<?php echo $difficulties[$i][2] ?>'
                data-n_extra='<?php echo $difficulties[$i][3] ?>'
                data-b_normal='<?php echo $difficulties[$i][4] ?>'
                data-b_hyper='<?php echo $difficulties[$i][5] ?>'
                ><?php echo $difficulties[$i][0] ?>
            </td>
        </tr>
        <?php $i++; } ?>
    </table>

    <div id="chevrons">
        <button onclick="previousPage()" style="margin-right: 2vw;"><i class="fas fa-chevron-circle-left"></i></button>
        <button onclick="nextPage()" style="margin-left: 2vw;"><i class="fas fa-chevron-circle-right"></i></button>
    </div>

    <div id="footer">
        All information taken from <a id="remyWiki" href="https://remywiki.com/Main_Page">RemyWiki</a>.
        <br>
        &copy; 2018 Alex Pasieka
    </div>

    <script src="<?php echo base_url('js/script.js');?>"></script>
    <script>
        sortBy(0, '#titleIcon');
        adjustDifficulty();
        adjustBpm();
    </script>
</body>
</html>
<?php

include ('data.php');
    $json = [
       'code' => 1,
       'data' => $yzm
    ];

header('Content-Type: application/json; charset=utf-8');

die(json_encode($json,320));

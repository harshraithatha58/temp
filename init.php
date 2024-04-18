<?php
    $host = "localhost";
    $user = "lpgyluyj_API";
    $password = "IWUj)OJISDspokA)(SPOAISkdj{p0a9";
    $db = "ia";

    $conn = mysqli_connect($host, $user, $password, $db);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

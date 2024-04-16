<?php
    $host = "localhost";
    $user = "lpgyluyj_ia";
    $password = "Pz52vHVk8y9w79j9EVcV";
    $db = "lpgyluyj_ia";

    $conn = mysqli_connect($host, $user, $password, $db);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

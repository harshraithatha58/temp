<?php
require_once("init.php");
header('Content-Type: application/json');

// Initialize an empty array to store search results
$search_results = array();

// Check if the name parameter is set
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    // Construct SQL query to search by name
    $sql = "SELECT * FROM userdata WHERE name = '$name'";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch rows and add them to search results
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }
}

// Check if the mobileNumber parameter is set
if (isset($_GET["mobileNumber"])) {
    $mobileNumber = $_GET["mobileNumber"];
    // Construct SQL query to search by mobile number
    $sql = "SELECT * FROM userdata WHERE mobile_number = '$mobileNumber'";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch rows and add them to search results
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }
}

// Check if the fathersName parameter is set
if (isset($_GET["fathersName"])) {
    $fathersName = $_GET["fathersName"];
    // Construct SQL query to search by father's name
    $sql = "SELECT * FROM userdata WHERE fathers_name = '$fathersName'";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch rows and add them to search results
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }
}

// Check if only one result is found
if (count($search_results) == 1) {
    // Output the JSON response with the single search result
    echo json_encode($search_results[0]);
} else {
    // Output an error message as JSON response
    echo json_encode(array("error" => "Multiple or no results found"));
}

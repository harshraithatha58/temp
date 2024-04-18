<?php
require_once("init.php");

// Set response content type to JSON
header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = $_POST['name'] . '_' . time() . '.' . $imageExtension;
        $filePath = $uploadDir . $fileName;

        // Move uploaded file to destination directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $imageAddress = $filePath; // Store image address if uploaded successfully
        } else {
            $imageAddress = 'no_image_found'; // Placeholder value if image upload failed
        }
    } else {
        $imageAddress = 'no_image_found'; // Placeholder value if no image is uploaded
    }

    // Prepare data for insertion into database
    $identification = $_POST['identification'];
    $name = $_POST['name'];
    $fathersName = $_POST['fathersName'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $maritalStatus = $_POST['maritalStatus'];
    $mobileNumber = $_POST['mobileNumber'];
    $designation = $_POST['designation'];
    $duration = $_POST['duration'];
    $routeUsed = $_POST['routeUsed'];
    $placeVisitedLastYear = $_POST['placeVisitedLastYear'];
    $fName = $_POST['fName'];
    $fAge = $_POST['fAge'];
    $fGender = $_POST['fGender'];
    $fRelation = $_POST['fRelation'];
    $fAddharNumber = $_POST['fAddharNumber'];
    $fMobileNumber = $_POST['fMobileNumber'];

    // SQL query to insert data into database
    $sql = "INSERT INTO userdata (identification, name, fathers_name, address, religion, marital_status, mobile_number, designation, duration, route_used, place_visited_last_year, f_name, f_age, f_gender, f_relation, f_addhar_number, f_mobile_number, image_address) VALUES ('$identification', '$name', '$fathersName', '$address', '$religion', '$maritalStatus', '$mobileNumber', '$designation', '$duration', '$routeUsed', '$placeVisitedLastYear', '$fName', '$fAge', '$fGender', '$fRelation', '$fAddharNumber', '$fMobileNumber', '$imageAddress')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Data inserted successfully";
    } else {
        $response['success'] = false;
        $response['message'] = "Error inserting data: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method";
}

// Output the JSON response
echo json_encode($response);

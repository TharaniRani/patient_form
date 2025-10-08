<?php
$conn = mysqli_connect("localhost", "root", "", "patient_management");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM patient_details";
$result = $conn->query($sql);// execute the sql command(rows)

$data = array();// empty array create 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode(["data" =>  $data]);

mysqli_close($conn);
?>


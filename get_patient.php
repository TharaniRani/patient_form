<?php
include 'db.php';
$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    echo json_encode(null);
    exit;
}
$stmt = $conn->prepare("SELECT * FROM patient_details WHERE patient_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();// retrieves the result set from the query, so we can read the patient data.

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(null);
}
$conn->close();
?>


<?php
include 'db.php';  // make sure $conn is defined

$id = intval($_POST['id'] ?? 0); // get ID from AJAX

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM patient_details WHERE patient_id = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit;
    }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not delete']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
}

$conn->close();
?>


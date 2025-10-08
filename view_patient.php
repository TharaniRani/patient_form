<?php
// view_patient.php

// Include database connection safely
$dbPath = __DIR__ . '/db.php';
if (!file_exists($dbPath)) {
    die("Database connection file not found at: $dbPath");
}

include $dbPath;

// Check if connection is valid
if (!isset($conn) || $conn->connect_error) {
    die("Database connection failed: " . ($conn->connect_error ?? 'Unknown error'));
}

// Get patient ID from query string
if (isset($_GET['id'])) {// antha perula value iruka nu ceck
    $id = intval($_GET['id']);// always string in ythe url

    $stmt = $conn->prepare("SELECT * FROM patient_details WHERE patient_id = ?");  // $stmt is basically your SQL query in a “ready-to-use” form.
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $id); 
    $stmt->execute();
    $result = $stmt->get_result(); // fetch pannitan
    $patient = $result->fetch_assoc();

    if ($patient) {
        echo "<h2>Patient Details</h2>";
        echo "<p><strong>Patient ID:</strong> " . htmlspecialchars($patient['patient_id']) . "</p>";
        echo "<p><strong>First Name:</strong> " . htmlspecialchars($patient['firstName']) . "</p>";
        echo "<p><strong>Last Name:</strong> " . htmlspecialchars($patient['lastName']) . "</p>";
        echo "<p><strong>DOB:</strong> " . htmlspecialchars($patient['dob']) . "</p>";
        echo "<p><strong>External ID:</strong> " . htmlspecialchars($patient['externalId']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($patient['email']) . "</p>";
        echo "<p><strong>Mobile Number:</strong> " . htmlspecialchars($patient['mobileNumber']) . "</p>";
        echo "<p><strong>Fax:</strong> " . htmlspecialchars($patient['fax']) . "</p>";
        echo "<p><strong>Address:</strong> " . htmlspecialchars($patient['address1'] . ' ' . $patient['address2']) . "</p>";
        echo "<p><strong>City/State/Zip:</strong> " . htmlspecialchars($patient['city'] . ', ' . $patient['state'] . ' - ' . $patient['zipcode']) . "</p>";
        echo "<p><strong>Ethnicity:</strong> " . htmlspecialchars($patient['ethnicity']) . "</p>";
        echo "<p><strong>Gender:</strong> " . htmlspecialchars($patient['gender']) . "</p>";
        echo "<p><strong>Race:</strong> " . htmlspecialchars($patient['race']) . "</p>";
        echo "<p><strong>External ID:</strong> " . htmlspecialchars($patient['externalId']) . "</p>";
        echo "<p><strong>Payment:</strong> " . htmlspecialchars($patient['payment_name']) . "</p>";
        echo "<p><strong>Swab:</strong> " . htmlspecialchars($patient['swab']) . "</p>";
        echo "<p><strong>Tests:</strong> " . htmlspecialchars($patient['test_name']) . "</p>";
        echo "<p><strong>Appointment Date:</strong> " . htmlspecialchars($patient['appointment_date']) . "</p>";
        echo "<p><strong>Facility:</strong> " . htmlspecialchars($patient['facility_name']) . "</p>";
    } else {
        echo "<p>Patient not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p> No patient ID provided. </p>";
}

$conn->close();
?>

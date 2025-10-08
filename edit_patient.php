<?php
include 'db.php';
$id = intval($_GET['id'] ?? $_POST['id'] ?? 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastName       = $_POST['lastName'] ?? '';
    $firstName      = $_POST['firstName'] ?? '';
    $dob            = $_POST['dob'] ?? '';
    $externalId     = $_POST['externalId'] ?? '';
    $email          = $_POST['email'] ?? '';
    $mobileNumber   = $_POST['mobileNumber'] ?? '';
    $fax            = $_POST['fax'] ?? '';
    $address1       = $_POST['address1'] ?? '';
    $address2       = $_POST['address2'] ?? '';
    $ethnicity      = $_POST['ethnicity'] ?? '';
    $gender         = $_POST['gender'] ?? '';
    $race           = $_POST['race'] ?? '';
    $city           = $_POST['city'] ?? '';
    $payment_name   = $_POST['payment_name'] ?? '';
    $swab           = $_POST['swab'] ?? '';
    $test_name      = $_POST['test_name'] ?? '';
    $appointment_date = $_POST['appointment_date'] ?? '';
    $facility_name  = $_POST['facility_name'] ?? '';
    $state          = $_POST['state'] ?? '';
    $zipcode        = $_POST['zipcode'] ?? '';

    $stmt = $conn->prepare("
        UPDATE patient_details SET 
        lastName=?, firstName=?, dob=?, externalId=?, email=?, mobileNumber=?, fax=?, 
        address1=?, address2=?, ethnicity=?, gender=?, race=?, city=?, payment_name=?, swab=?, 
        test_name=?, appointment_date=?, facility_name=?, state=?, zipcode=?
        WHERE patient_id=?
    ");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit;
    }

    $stmt->bind_param(
        "ssssssssssssssssssssi",
        $lastName, $firstName, $dob, $externalId, $email, $mobileNumber, $fax,
        $address1, $address2, $ethnicity, $gender, $race, $city, $payment_name, $swab,
        $test_name, $appointment_date, $facility_name, $state, $zipcode, $id
    );

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
    exit;
}
$stmt = $conn->prepare("SELECT * FROM patient_details WHERE patient_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$patient = $stmt->get_result()->fetch_assoc();
$conn->close();

// Output only the form HTML (no <html>, no redirect)
?>
<form method="POST" id="editPatientForm">
    <input type="hidden" name="id" value="<?= htmlspecialchars($patient['patient_id']) ?>">
    Last Name: <input type="text" name="lastName" value="<?= htmlspecialchars($patient['lastName']) ?>"><br>
    First Name: <input type="text" name="firstName" value="<?= htmlspecialchars($patient['firstName']) ?>"><br>
    DOB: <input type="text" name="dob" value="<?= htmlspecialchars($patient['dob']) ?>"><br>
    External ID: <input type="text" name="externalId" value="<?= htmlspecialchars($patient['externalId']) ?>"><br>
    Email: <input type="text" name="email" value="<?= htmlspecialchars($patient['email']) ?>"><br>
    Mobile: <input type="text" name="mobileNumber" value="<?= htmlspecialchars($patient['mobileNumber']) ?>"><br>
    Fax: <input type="text" name="fax" value="<?= htmlspecialchars($patient['fax']) ?>"><br>
    Address1: <input type="text" name="address1" value="<?= htmlspecialchars($patient['address1']) ?>"><br>
    Address2: <input type="text" name="address2" value="<?= htmlspecialchars($patient['address2']) ?>"><br>
    Ethnicity: <input type="text" name="ethnicity" value="<?= htmlspecialchars($patient['ethnicity']) ?>"><br>
    Gender: <input type="text" name="gender" value="<?= htmlspecialchars($patient['gender']) ?>"><br>
    Race: <input type="text" name="race" value="<?= htmlspecialchars($patient['race']) ?>"><br>
    City: <input type="text" name="city" value="<?= htmlspecialchars($patient['city']) ?>"><br>
    Payment Name: <input type="text" name="payment_name" value="<?= htmlspecialchars($patient['payment_name']) ?>"><br>
    Swab: <input type="text" name="swab" value="<?= htmlspecialchars($patient['swab']) ?>"><br>
    Test Name: <input type="text" name="test_name" value="<?= htmlspecialchars($patient['test_name']) ?>"><br>
    Appointment Date: <input type="text" name="appointment_date" value="<?= htmlspecialchars($patient['appointment_date']) ?>"><br>
    Facility Name: <input type="text" name="facility_name" value="<?= htmlspecialchars($patient['facility_name']) ?>"><br>
    State: <input type="text" name="state" value="<?= htmlspecialchars($patient['state']) ?>"><br>
    Zipcode: <input type="text" name="zipcode" value="<?= htmlspecialchars($patient['zipcode']) ?>"><br>
    <button type="submit" class="btn btn-primary mt-2">Save</button>
</form>

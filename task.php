<?php
$conn = new mysqli("localhost", "root", "", "patient_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$patient_id   = $_POST['id'] ?? null;
$doctor= $_POST['doctor'] ?? '';
$prescription = $_POST['prescription'] ?? '';
$lastName     =$_POST['lastName'] ?? '';
$firstName    = $_POST['firstName'] ?? '';

$month        = $_POST['month']  ?? '';
$dayy         = $_POST['dayy'] ?? '';
$year         = $_POST['year'] ?? '';

$dob = $month.'-'.$dayy.'-'.$year;
$externalId   = $_POST['external_id'] ?? '';
$email        = $_POST['email'] ?? '';
$mobileNumber = $_POST['mobilenumber'] ?? '';
$fax          = $_POST['fax'] ?? '';
$address1     = $_POST['Address1'] ?? '';
$address2     = $_POST['Address2'] ?? '';
$ethnicity    = $_POST['ethnicity'] ?? '';
$gender = ($_POST['gender'] ?? '') == 'Others' ? 'Others' : 
          (($_POST['gender'] ?? '') == 'Male' ? 'Male' : 'Female');
$race         = $_POST['race'] ?? '';
$city         = $_POST['city'] ?? '';
$payment_name = $_POST['payment'] ?? '';
$swab         = $_POST['swab'] ?? '';
$test         = $_POST['test'] ?? [];
if(!is_array($test)) $test = [$test];
$test_name    = implode(', ', $test);
$appointment_date = $_POST['date'] ?? '';
$facility_name    = $_POST['attend'] ?? '';
$state            = $_POST['state'] ?? '';
$zipcode          = $_POST['zipcode'] ?? '';
$driver_license = $_FILES['driver_license'] ?? '';

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s'); 

// echo "Driver license: .$driver_license";

$driver_license_path= null;
if(isset($_FILES['driver_license'])&& $_FILES['driver_license']['error'] == UPLOAD_ERR_OK){
    $uploadDir = 'uploads/driver_license/' ;
    if(!is_dir($uploadDir)){
        mkdir($uploadDir);

    }

    $filetmppath = $_FILES['driver_license']['tmp_name'];
    $fileName = time() . '_' . basename($_FILES['driver_license']['name']);
    $destpath = $uploadDir . $fileName ;
    if(move_uploaded_file($filetmppath , $destpath)){
        $driver_license_path = $destpath;
    } else {
        die(" Error in upload driver license");
    }

}

// Determine if we are inserting or updating
if ($patient_id){
    // UPDATE existing patient
$sql_patient = "UPDATE patient_details SET 
    lastName=?, firstName=?, dob=?, externalId=?, email=?, mobileNumber=?, fax=?,
    address1=?, address2=?, ethnicity=?, gender=?, race=?, city=?, driver_license=?,
    payment_name=?, swab=?, test_name=?, appointment_date=?, facility_name=?,
    state=?, zipcode=?, updated_at=? , doctor= ? , prescription =?
    WHERE patient_id=?";

$stmt = $conn->prepare($sql_patient);
if (!$stmt) {
    die("Prepare failed for UPDATE: " . $conn->error);
}

$stmt->bind_param(
    "ssssssssssssssssssssssssi",
    $lastName, $firstName, $dob, $externalId, $email, $mobileNumber, $fax,
    $address1, $address2, $ethnicity, $gender, $race, $city, $driver_license_path,
    $payment_name, $swab, $test_name, $appointment_date, $facility_name,
    $state, $zipcode, $updated_at, $doctor, $prescription, $patient_id
);
} else {
    // INSERT new patient
    $sql_patient = "INSERT INTO patient_details 
    (lastName, firstName, dob, externalId, email, mobileNumber, fax,
     address1, address2, ethnicity, gender, race, city, driver_license,
     payment_name, swab, test_name, appointment_date, facility_name,
     state, zipcode, created_at, updated_at, doctor , prescription)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_patient);
    if (!$stmt) {
        die("Prepare failed for INSERT: " . $conn->error);
    }
$stmt->bind_param(
    "sssssssssssssssssssssssss",
    $lastName, $firstName, $dob, $externalId, $email, $mobileNumber, $fax,
    $address1, $address2, $ethnicity, $gender, $race, $city, $driver_license_path,
    $payment_name, $swab, $test_name, $appointment_date, $facility_name,
    $state, $zipcode, $created_at, $updated_at, $doctor , $prescription
);
}
if ($stmt->execute()) {
    echo "Patient information saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
echo $doctor;
echo $prescription;
?>

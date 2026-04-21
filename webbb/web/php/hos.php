<?php
$servername = "localhost";
$username = "root";   // change if needed
$password = "";
$dbname = "AppLab";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// ADD PATIENT
function addPatient($conn) {
    $sql = "INSERT INTO PATIENT (Pid, Pname, DOB, ContactNo, Address)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['pid'],
        $_POST['pname'],
        $_POST['dob'],
        $_POST['contactNo'],
        $_POST['address']
    ]);
    echo "Patient added.<br>";
}

// ADD DIAGNOSIS
function addDiagnosis($conn) {
    $sql = "INSERT INTO DIAGNOSIS (Did, Dname, Medication, Department)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['did'],
        $_POST['dname'],
        $_POST['medication'],
        $_POST['department']
    ]);
    echo "Diagnosis added.<br>";
}

// ASSIGN TREATMENT
function assignTreatment($conn) {
    $sql = "INSERT INTO TREATMENT (Pid, Type, Did, DoctorName)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['pid'],
        $_POST['type'],
        $_POST['did'],
        $_POST['doctorName']
    ]);
    echo "Treatment assigned.<br>";
}

// UPDATE PATIENT
function updatePatient($conn) {
    $sql = "UPDATE PATIENT 
            SET Pname = ?, DOB = ?, ContactNo = ?, Address = ?
            WHERE Pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['pname'],
        $_POST['dob'],
        $_POST['contactNo'],
        $_POST['address'],
        $_POST['pid']
    ]);
    echo "Patient updated.<br>";
}

// DELETE PATIENT
function deletePatient($conn) {
    $sql = "DELETE FROM PATIENT WHERE Pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['pid']]);
    echo "Patient deleted.<br>";
}

// HANDLE FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['formType'])) {
        switch ($_POST['formType']) {
            case 'addPatient':
                addPatient($conn);
                break;
            case 'addDiagnosis':
                addDiagnosis($conn);
                break;
            case 'assignTreatment':
                assignTreatment($conn);
                break;
            case 'updatePatient':
                updatePatient($conn);
                break;
            case 'deletePatient':
                deletePatient($conn);
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital DB</title>
</head>
<body>

<h2>Add Patient</h2>
<form method="post">
    <input type="hidden" name="formType" value="addPatient">
    Pid: <input type="text" name="pid" required><br>
    Name: <input type="text" name="pname" required><br>
    DOB: <input type="date" name="dob"><br>
    Contact: <input type="text" name="contactNo"><br>
    Address: <input type="text" name="address"><br>
    <input type="submit" value="Add Patient">
</form>

<h2>Add Diagnosis</h2>
<form method="post">
    <input type="hidden" name="formType" value="addDiagnosis">
    Did: <input type="text" name="did" required><br>
    Name: <input type="text" name="dname"><br>
    Medication: <input type="text" name="medication"><br>
    Department: <input type="text" name="department"><br>
    <input type="submit" value="Add Diagnosis">
</form>

<h2>Assign Treatment</h2>
<form method="post">
    <input type="hidden" name="formType" value="assignTreatment">
    Pid: <input type="text" name="pid"><br>
    Type: <input type="text" name="type"><br>
    Did: <input type="text" name="did"><br>
    Doctor: <input type="text" name="doctorName"><br>
    <input type="submit" value="Assign Treatment">
</form>

<h2>Update Patient</h2>
<form method="post">
    <input type="hidden" name="formType" value="updatePatient">
    Pid: <input type="text" name="pid" required><br>
    Name: <input type="text" name="pname"><br>
    DOB: <input type="date" name="dob"><br>
    Contact: <input type="text" name="contactNo"><br>
    Address: <input type="text" name="address"><br>
    <input type="submit" value="Update Patient">
</form>

<h2>Delete Patient</h2>
<form method="post">
    <input type="hidden" name="formType" value="deletePatient">
    Pid: <input type="text" name="pid" required><br>
    <input type="submit" value="Delete Patient">
</form>

</body>
</html>
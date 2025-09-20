<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Old_Relative_Name = $_POST['Old_Relative_Name'];
    $Old_ApplicantID = $_POST['Old_ApplicantID'];

    $Relative_Name = trim($_POST['Relative_Name']);
    $Phone = trim($_POST['Phone']);
    $Age = trim($_POST['Age']);
    $Occupation = trim($_POST['Occupation']);
    $Relationship = trim($_POST['Relationship']);
    $Num_Children = trim($_POST['Num_Children']);
    $Position = trim($_POST['Position']);
    $Workplace = trim($_POST['Workplace']);
    $ApplicantID = trim($_POST['ApplicantID']);
    if ($Relative_Name === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบ'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE relatives SET 
        Relative_Name = ?, Phone = ?, Age = ?, Occupation = ?, Relationship = ?, 
        Num_Children = ?, Position = ?, Workplace = ?, ApplicantID = ?
        WHERE Relative_Name = ? AND ApplicantID = ?");
    $stmt->bind_param("ssississisi",
        $Relative_Name, $Phone, $Age, $Occupation, $Relationship,
        $Num_Children, $Position, $Workplace, $ApplicantID,
        $Old_Relative_Name, $Old_ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว!'); window.location='select_relatives.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('เข้าถึงหน้านี้โดยตรงไม่ได้'); window.location='select_relatives.php';</script>";
}
?>

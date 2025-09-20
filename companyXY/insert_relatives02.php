<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO relatives 
        (Relative_Name, Phone, Age, Occupation, Relationship, Num_Children, Position, Workplace, ApplicantID)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssississi", 
        $Relative_Name, $Phone, $Age, $Occupation, $Relationship, $Num_Children, $Position, $Workplace, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลญาติเรียบร้อยแล้ว!'); window.location='select_relatives.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_relatives.php';</script>";
}
?>

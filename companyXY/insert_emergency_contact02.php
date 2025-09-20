<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Contact_Name = trim($_POST['Contact_Name']);
    $Relationship = trim($_POST['Relationship']);
    $Address = trim($_POST['Address']);
    $Phone = trim($_POST['Phone']);
    if (strlen($Phone) === 9 && $Phone[0] !== '0') {
        $Phone = '0' . $Phone;
    }
    $ApplicantID = trim($_POST['ApplicantID']);
    if ($Contact_Name === "" || $Phone === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }
    $stmt = $conn->prepare("INSERT INTO emergency_contact 
        (Contact_Name, Relationship, Address, Phone, ApplicantID)
        VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $Contact_Name, $Relationship, $Address, $Phone, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้ว!'); window.location='select_emergency_contact.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_emergency_contact.php';</script>";
}
?>

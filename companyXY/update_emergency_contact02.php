<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Old_Contact_Name = $_POST['Old_Contact_Name'];
    $Old_ApplicantID = $_POST['Old_ApplicantID'];
    $Contact_Name = trim($_POST['Contact_Name']);
    $Relationship = trim($_POST['Relationship']);
    $Address = trim($_POST['Address']);
    $ApplicantID = trim($_POST['ApplicantID']);
    $Phone = trim($_POST['Phone']);
    if (strlen($Phone) === 9 && $Phone[0] !== '0') {
        $Phone = '0' . $Phone;
    }

    // เช็กช่องที่จำเป็นต้องมี
    if ($Contact_Name === "" || $Phone === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }

    // เตรียม query
    $sql = "UPDATE emergency_contact 
            SET Contact_Name = ?, Relationship = ?, Address = ?, Phone = ?, ApplicantID = ?
            WHERE Contact_Name = ? AND ApplicantID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", 
        $Contact_Name, $Relationship, $Address, $Phone, $ApplicantID,
        $Old_Contact_Name, $Old_ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว!'); window.location='select_emergency_contact.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_emergency_contact.php';</script>";
}
?>

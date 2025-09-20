<?php
include("conn_db.php");

if (isset($_GET['Contact_Name']) && isset($_GET['ApplicantID'])) {
    $Contact_Name = $_GET['Contact_Name'];
    $ApplicantID = $_GET['ApplicantID'];

    $sql = "DELETE FROM emergency_contact WHERE Contact_Name = ? AND ApplicantID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $Contact_Name, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location='select_emergency_contact.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location='select_emergency_contact.php';</script>";
}

$conn->close();
?>

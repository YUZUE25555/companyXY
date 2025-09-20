<?php
include("conn_db.php");

if (isset($_GET['Relative_Name']) && isset($_GET['ApplicantID'])) {
    $Relative_Name = $_GET['Relative_Name'];
    $ApplicantID = $_GET['ApplicantID'];

    $stmt = $conn->prepare("DELETE FROM relatives WHERE Relative_Name = ? AND ApplicantID = ?");
    $stmt->bind_param("si", $Relative_Name, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลญาติเรียบร้อยแล้ว'); window.location='select_relatives.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location='select_relatives.php';</script>";
}

$conn->close();
?>

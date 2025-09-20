<?php
include("conn_db.php");

if (isset($_GET['Workplace']) && isset($_GET['ApplicantID'])) {
    $Workplace = $_GET['Workplace'];
    $ApplicantID = $_GET['ApplicantID'];

    $stmt = $conn->prepare("DELETE FROM work_exper WHERE Workplace = ? AND ApplicantID = ?");
    $stmt->bind_param("si", $Workplace, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลประสบการณ์ทำงานเรียบร้อยแล้ว'); window.location='select_work_exper.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location='select_work_exper.php';</script>";
}

$conn->close();
?>

<?php
include("conn_db.php");

if (isset($_GET['JobOpening_ID'])) {
    $JobOpening_ID = $_GET['JobOpening_ID'];

    $stmt = $conn->prepare("DELETE FROM job_openings WHERE JobOpening_ID = ?");
    $stmt->bind_param("i", $JobOpening_ID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลตำแหน่งที่เปิดรับเรียบร้อยแล้ว'); window.location='select_job_openings.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบรหัสตำแหน่งที่ต้องการลบ'); window.location='select_job_openings.php';</script>";
}

$conn->close();
?>

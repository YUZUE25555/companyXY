<?php
include("conn_db.php");

if (!isset($_GET['round'])) {
    echo "<script>alert('ไม่พบรหัสรอบ'); window.location.href='select_application_round.php';</script>";
    exit;
}

$round = $_GET['round'];
$sql = "DELETE FROM application_round WHERE round = '$round'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('ลบรอบเรียบร้อยแล้ว'); window.location.href='select_application_round.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบ: {$conn->error}'); window.history.back();</script>";
}

$conn->close();
?>
<?php
include("conn_db.php");

if (!isset($_GET['DocID'])) {
    echo "<script>alert('ไม่พบรหัสเอกสารที่ต้องการลบ'); window.location.href='select_support_doc.php';</script>";
    exit;
}

$DocID = $_GET['DocID'];
$sql = "DELETE FROM support_doc WHERE DocID = '$DocID'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='select_support_doc.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล: {$conn->error}'); window.history.back();</script>";
}

$conn->close();
?>
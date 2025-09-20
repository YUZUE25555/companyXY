<?php
include("conn_db.php");

if (!isset($_GET['ApplicantID']) || !isset($_GET['DocID'])) {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location.href='select_doc_submission.php';</script>";
    exit;
}

$ApplicantID = $_GET['ApplicantID'];
$DocID = $_GET['DocID'];

$sql = "DELETE FROM doc_submission WHERE ApplicantID = '$ApplicantID' AND DocID = '$DocID'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='select_doc_submission.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล: {$conn->error}'); window.history.back();</script>";
}

$conn->close();
?>

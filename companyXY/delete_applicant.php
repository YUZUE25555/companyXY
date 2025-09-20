<?php
include("conn_db.php");

if (!isset($_GET["id"])) {
    echo "<script>alert('ไม่พบรหัสผู้สมัคร'); window.location.href='select_applicant.php';</script>";
    exit;
}

$ApplicantID = $_GET["id"];
$sql = "DELETE FROM applicant WHERE ApplicantID = '$ApplicantID'";

if ($conn->query($sql)) {
    echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='select_Applicants.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบ: " . $conn->error . "'); window.location.href='select_Applicants.php';</script>";
}
$conn->close();
?>

<?php
include("conn_db.php");

if (!isset($_GET['BranchID'])) {
    echo "<script>alert('ไม่พบรหัสสาขา'); window.location.href='select_branch.php';</script>";
    exit;
}

$BranchID = $_GET['BranchID'];
$sql = "DELETE FROM branch WHERE BranchID = '$BranchID'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('ลบข้อมูลสาขาเรียบร้อยแล้ว'); window.location.href='select_branch.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบ: {$conn->error}'); window.history.back();</script>";
}

$conn->close();
?>

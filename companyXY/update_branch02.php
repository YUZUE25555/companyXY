<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $BranchID = $_POST['BranchID'];
    $BranchName = $_POST['BranchName'];

    $sql = "UPDATE branch SET BranchName = '$BranchName' WHERE BranchID = '$BranchID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('อัปเดตข้อมูลสาขาเรียบร้อยแล้ว'); window.location.href='select_branch.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดต: {$conn->error}'); window.history.back();</script>";
    }

    $conn->close();
}
?>
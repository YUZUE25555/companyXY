<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $BranchID = $_POST['BranchID'];
    $BranchName = $_POST['BranchName'];

    // ตรวจสอบว่า BranchID ซ้ำหรือไม่
    $check_sql = "SELECT * FROM branch WHERE BranchID = '$BranchID'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('รหัสสาขานี้มีอยู่แล้ว'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO branch (BranchID, BranchName) VALUES ('$BranchID', '$BranchName')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('เพิ่มข้อมูลสาขาสำเร็จ'); window.location.href='select_branch.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: {$conn->error}'); window.history.back();</script>";
        }
    }
    $conn->close();
}
?>
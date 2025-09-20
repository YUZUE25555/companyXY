<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ApplicantID = $_POST['ApplicantID'];
    $DocID = $_POST['DocID'];

    // ตรวจสอบว่ามี record นี้อยู่แล้วหรือยัง
    $check_sql = "SELECT * FROM doc_submission WHERE ApplicantID = '$ApplicantID' AND DocID = '$DocID'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('ข้อมูลการส่งเอกสารนี้มีอยู่แล้ว'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO doc_submission (ApplicantID, DocID) VALUES ('$ApplicantID', '$DocID')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('บันทึกการส่งเอกสารเรียบร้อย'); window.location.href='select_doc_submission.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: {$conn->error}'); window.history.back();</script>";
        }
    }
    $conn->close();
}
?>
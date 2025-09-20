<?php
include("conn_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldApplicantID = $_POST['OldApplicantID'];
    $oldDocID = $_POST['OldDocID'];
    $newApplicantID = $_POST['ApplicantID'];
    $newDocID = $_POST['DocID'];

    // ถ้าคีย์ใหม่ไม่เหมือนเดิม ต้องเช็คว่าซ้ำไหม
    if ($oldApplicantID !== $newApplicantID || $oldDocID !== $newDocID) {
        $check_sql = "SELECT * FROM doc_submission WHERE ApplicantID = '$newApplicantID' AND DocID = '$newDocID'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo "<script>alert('ข้อมูลใหม่นี้มีอยู่แล้วในระบบ'); window.history.back();</script>";
            $conn->close();
            exit;
        }
    }

    $sql = "UPDATE doc_submission SET ApplicantID = '$newApplicantID', DocID = '$newDocID'
            WHERE ApplicantID = '$oldApplicantID' AND DocID = '$oldDocID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว'); window.location.href='select_doc_submission.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดต: {$conn->error}'); window.history.back();</script>";
    }

    $conn->close();
}
?>

<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ApplicantID = trim($_POST['ApplicantID']);
    $JobOpening_ID = trim($_POST['JobOpening_ID']);
    $PosID = trim($_POST['PosID']);
    $Round = trim($_POST['Round']);
    $BranchID = trim($_POST['BranchID']);
    $Application_Date = trim($_POST['Application_Date']);

    // เช็กค่าบังคับ
    if ($ApplicantID === "" || $JobOpening_ID === "" || $PosID === "" || $Round === "" || $BranchID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back();</script>";
        exit();
    }

    // ถ้าไม่ได้กรอกวันที่สมัคร ให้เป็น NULL
    $Application_Date = ($Application_Date === "") ? null : $Application_Date;

    $stmt = $conn->prepare("INSERT INTO employee_recruit 
        (ApplicantID, JobOpening_ID, PosID, Round, BranchID, Application_Date) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiis", $ApplicantID, $JobOpening_ID, $PosID, $Round, $BranchID, $Application_Date);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลการสมัครงานเรียบร้อยแล้ว!'); window.location='select_employee_recruit.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_employee_recruit.php';</script>";
}
?>

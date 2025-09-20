<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Old_JobOpening_ID = trim($_POST['Old_JobOpening_ID']);

    $JobOpening_ID = trim($_POST['JobOpening_ID']);
    $PosID = trim($_POST['PosID']);
    $Round = trim($_POST['Round']);
    $BranchID = trim($_POST['BranchID']);
    $Amount = trim($_POST['Amount']);
    $Application_Status = trim($_POST['Application_Status']);
    $Qualifications = trim($_POST['Qualifications']);

    // ตรวจฟิลด์ที่จำเป็น
    if ($JobOpening_ID === "" || $PosID === "" || $Round === "" || $BranchID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE job_openings 
        SET JobOpening_ID = ?, PosID = ?, Round = ?, BranchID = ?, Amount = ?, Application_Status = ?, Qualifications = ?
        WHERE JobOpening_ID = ?");
    $stmt->bind_param("iiiiissi", 
        $JobOpening_ID, $PosID, $Round, $BranchID, $Amount, $Application_Status, $Qualifications, $Old_JobOpening_ID);

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว!'); window.location='select_job_openings.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_job_openings.php';</script>";
}
?>

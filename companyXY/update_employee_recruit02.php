<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // คีย์เก่า
    $Old_ApplicantID = $_POST['Old_ApplicantID'];
    $Old_JobOpening_ID = $_POST['Old_JobOpening_ID'];
    $Old_PosID = $_POST['Old_PosID'];
    $Old_Round = $_POST['Old_Round'];
    $Old_BranchID = $_POST['Old_BranchID'];

    // ค่าที่จะแก้ไข
    $ApplicantID = trim($_POST['ApplicantID']);
    $JobOpening_ID = trim($_POST['JobOpening_ID']);
    $PosID = trim($_POST['PosID']);
    $Round = trim($_POST['Round']);
    $BranchID = trim($_POST['BranchID']);
    $Application_Date = trim($_POST['Application_Date']);

    if ($ApplicantID === "" || $JobOpening_ID === "" || $PosID === "" || $Round === "" || $BranchID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back();</script>";
        exit();
    }

    $Application_Date = ($Application_Date === "") ? null : $Application_Date;

    $stmt = $conn->prepare("UPDATE employee_recruit SET 
        ApplicantID = ?, JobOpening_ID = ?, PosID = ?, Round = ?, BranchID = ?, Application_Date = ?
        WHERE ApplicantID = ? AND JobOpening_ID = ? AND PosID = ? AND Round = ? AND BranchID = ?");

    $stmt->bind_param("iiiiisiiiii", 
        $ApplicantID, $JobOpening_ID, $PosID, $Round, $BranchID, $Application_Date,
        $Old_ApplicantID, $Old_JobOpening_ID, $Old_PosID, $Old_Round, $Old_BranchID
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว!'); window.location='select_employee_recruit.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_employee_recruit.php';</script>";
}
?>

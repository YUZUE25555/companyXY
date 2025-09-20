<?php
include("conn_db.php");

if (
    isset($_GET['ApplicantID']) &&
    isset($_GET['JobOpening_ID']) &&
    isset($_GET['PosID']) &&
    isset($_GET['Round']) &&
    isset($_GET['BranchID'])
) {
    $ApplicantID = $_GET['ApplicantID'];
    $JobOpening_ID = $_GET['JobOpening_ID'];
    $PosID = $_GET['PosID'];
    $Round = $_GET['Round'];
    $BranchID = $_GET['BranchID'];

    $stmt = $conn->prepare("DELETE FROM employee_recruit 
        WHERE ApplicantID = ? AND JobOpening_ID = ? AND PosID = ? AND Round = ? AND BranchID = ?");
    $stmt->bind_param("iiiii", $ApplicantID, $JobOpening_ID, $PosID, $Round, $BranchID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location='select_employee_recruit.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location='select_employee_recruit.php';</script>";
}

$conn->close();
?>

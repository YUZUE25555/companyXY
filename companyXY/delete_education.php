<?php
include("conn_db.php");

if (
    isset($_GET['Education_Level']) &&
    isset($_GET['Institution']) &&
    isset($_GET['Start_Date']) &&
    isset($_GET['End_Date']) &&
    isset($_GET['Major']) &&
    isset($_GET['ApplicantID'])
) {
    $sql = "DELETE FROM education WHERE 
            Education_Level = ? AND Institution = ? AND Start_Date = ? AND End_Date = ? AND Major = ? AND ApplicantID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssss",
        $_GET['Education_Level'],
        $_GET['Institution'],
        $_GET['Start_Date'],
        $_GET['End_Date'],
        $_GET['Major'],
        $_GET['ApplicantID']
    );

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลการศึกษาเรียบร้อยแล้ว'); window.location.href='select_education.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ข้อมูลไม่ครบถ้วน'); window.history.back();</script>";
}

$conn->close();
?>

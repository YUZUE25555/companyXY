<?php
include("conn_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Education_Level = $_POST['Education_Level'];
    $Institution = $_POST['Institution'];
    $Start_Date = $_POST['Start_Date'];
    $End_Date = $_POST['End_Date'];
    $Major = $_POST['Major'];
    $ApplicantID = $_POST['ApplicantID'];

    // ตรวจสอบข้อมูลซ้ำ
    $check = $conn->prepare("SELECT * FROM education WHERE Education_Level=? AND Institution=? AND Start_Date=? AND End_Date=? AND Major=? AND ApplicantID=?");
    $check->bind_param("sssssi", $Education_Level, $Institution, $Start_Date, $End_Date, $Major, $ApplicantID);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('ข้อมูลนี้มีอยู่แล้วในระบบ'); window.history.back();</script>";
        exit;
    }
    $check->close();

    // Insert
    $stmt = $conn->prepare("INSERT INTO education (Education_Level, Institution, Start_Date, End_Date, Major, ApplicantID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $Education_Level, $Institution, $Start_Date, $End_Date, $Major, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว'); window.location.href='select_education.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

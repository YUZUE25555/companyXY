<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Workplace = trim($_POST['Workplace']);
    $Job_Position = trim($_POST['Job_Position']);
    $Salary = $_POST['Salary'];
    $Job_Description = trim($_POST['Job_Description']);
    $Start_Date = $_POST['Start_Date'];
    $End_date = $_POST['End_date'];
    $Reason_Leaving = trim($_POST['Reason_Leaving']);
    $ApplicantID = $_POST['ApplicantID'];

    if ($Workplace === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO work_exper 
        (Workplace, Job_Position, Salary, Job_Description, Start_Date, End_date, Reason_Leaving, ApplicantID) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssissssi",
        $Workplace, $Job_Position, $Salary, $Job_Description,
        $Start_Date, $End_date, $Reason_Leaving, $ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลประสบการณ์ทำงานเรียบร้อยแล้ว!'); window.location='select_work_exper.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่สามารถเข้าถึงหน้านี้ได้โดยตรง'); window.location='select_work_exper.php';</script>";
}
?>

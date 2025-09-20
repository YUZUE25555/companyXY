<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Old_Workplace = $_POST['Old_Workplace'];
    $Old_ApplicantID = $_POST['Old_ApplicantID'];

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

    $stmt = $conn->prepare("UPDATE work_exper SET 
        Workplace = ?, Job_Position = ?, Salary = ?, Job_Description = ?, Start_Date = ?, End_date = ?, 
        Reason_Leaving = ?, ApplicantID = ?
        WHERE Workplace = ? AND ApplicantID = ?");

    $stmt->bind_param("ssissssiis",
        $Workplace, $Job_Position, $Salary, $Job_Description, $Start_Date, $End_date,
        $Reason_Leaving, $ApplicantID, $Old_Workplace, $Old_ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลประสบการณ์ทำงานเรียบร้อย'); window.location='select_work_exper.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('เข้าถึงไฟล์โดยตรงไม่ได้'); window.location='select_work_exper.php';</script>";
}
?>

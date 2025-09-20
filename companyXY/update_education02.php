<?php
include("conn_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ค่าที่จะแก้ไขใหม่
    $Education_Level = $_POST['Education_Level'];
    $Institution = $_POST['Institution'];
    $Start_Date = $_POST['Start_Date'];
    $End_Date = $_POST['End_Date'];
    $Major = $_POST['Major'];
    $ApplicantID = $_POST['ApplicantID'];

    // ค่าเดิม (Composite PK)
    $old_Education_Level = $_POST['old_Education_Level'];
    $old_Institution = $_POST['old_Institution'];
    $old_Start_Date = $_POST['old_Start_Date'];
    $old_End_Date = $_POST['old_End_Date'];
    $old_Major = $_POST['old_Major'];
    $old_ApplicantID = $_POST['old_ApplicantID'];

    $sql = "UPDATE education SET 
                Education_Level = ?, Institution = ?, Start_Date = ?, End_Date = ?, Major = ?, ApplicantID = ?
            WHERE 
                Education_Level = ? AND Institution = ? AND Start_Date = ? AND End_Date = ? AND Major = ? AND ApplicantID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss",
        $Education_Level, $Institution, $Start_Date, $End_Date, $Major, $ApplicantID,
        $old_Education_Level, $old_Institution, $old_Start_Date, $old_End_Date, $old_Major, $old_ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลการศึกษาเรียบร้อยแล้ว'); window.location.href='select_education.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

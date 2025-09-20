<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Age = trim($_POST['Age']);
    $Occupation = trim($_POST['Occupation']);
    $Sibling_Name = trim($_POST['Sibling_Name']);
    $Sibling_Order = trim($_POST['Sibling_Order']);
    $Num_Siblings = trim($_POST['Num_Siblings']);
    $ApplicantID = trim($_POST['ApplicantID']);

    // เช็กช่องว่าง
    if ($Age === "" || $Occupation === "" || $Sibling_Name === "" || $Sibling_Order === "" || $Num_Siblings === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO siblings 
        (Age, Occupation, Sibling_Name, Sibling_Order, Num_Siblings, ApplicantID) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issiii", $Age, $Occupation, $Sibling_Name, $Sibling_Order, $Num_Siblings, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มข้อมูลพี่น้องเรียบร้อยแล้ว!'); window.location='select_siblings.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_siblings.php';</script>";
}
?>

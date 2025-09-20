<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // คีย์เก่า
    $Old_Age = $_POST['Old_Age'];
    $Old_Occupation = $_POST['Old_Occupation'];
    $Old_Sibling_Name = $_POST['Old_Sibling_Name'];
    $Old_Sibling_Order = $_POST['Old_Sibling_Order'];
    $Old_Num_Siblings = $_POST['Old_Num_Siblings'];
    $Old_ApplicantID = $_POST['Old_ApplicantID'];

    // ค่าปัจจุบัน
    $Age = trim($_POST['Age']);
    $Occupation = trim($_POST['Occupation']);
    $Sibling_Name = trim($_POST['Sibling_Name']);
    $Sibling_Order = trim($_POST['Sibling_Order']);
    $Num_Siblings = trim($_POST['Num_Siblings']);
    $ApplicantID = trim($_POST['ApplicantID']);

    // เช็กว่าใส่ครบมั้ย
    if ($Age === "" || $Occupation === "" || $Sibling_Name === "" || $Sibling_Order === "" || $Num_Siblings === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE siblings SET 
        Age = ?, Occupation = ?, Sibling_Name = ?, Sibling_Order = ?, Num_Siblings = ?, ApplicantID = ?
        WHERE Age = ? AND Occupation = ? AND Sibling_Name = ? AND Sibling_Order = ? AND Num_Siblings = ? AND ApplicantID = ?");

    $stmt->bind_param("issiiiissiii", 
        $Age, $Occupation, $Sibling_Name, $Sibling_Order, $Num_Siblings, $ApplicantID,
        $Old_Age, $Old_Occupation, $Old_Sibling_Name, $Old_Sibling_Order, $Old_Num_Siblings, $Old_ApplicantID
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลพี่น้องเรียบร้อยแล้ว!'); window.location='select_siblings.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_siblings.php';</script>";
}
?>

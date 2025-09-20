<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Old_PosID = trim($_POST['Old_PosID']);
    $PosID = trim($_POST['PosID']);
    $PosName = trim($_POST['PosName']);

    if ($PosID === "") {
        echo "<script>alert('กรุณากรอกรหัสตำแหน่ง'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE position SET PosID = ?, PosName = ? WHERE PosID = ?");
    $stmt->bind_param("isi", $PosID, $PosName, $Old_PosID);

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตตำแหน่งงานเรียบร้อยแล้ว!'); window.location='select_position.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_position.php';</script>";
}
?>

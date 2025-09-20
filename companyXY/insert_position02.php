<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PosID = trim($_POST['PosID']);
    $PosName = trim($_POST['PosName']);

    // เช็กว่ารหัสตำแหน่งไม่ว่าง
    if ($PosID === "") {
        echo "<script>alert('กรุณากรอกรหัสตำแหน่ง'); history.back();</script>";
        exit();
    }

    // เตรียม SQL insert
    $stmt = $conn->prepare("INSERT INTO position (PosID, PosName) VALUES (?, ?)");
    $stmt->bind_param("is", $PosID, $PosName);

    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มตำแหน่งงานเรียบร้อยแล้ว!'); window.location='select_position.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่อนุญาตให้เข้าถึงหน้านี้โดยตรง'); window.location='select_position.php';</script>";
}
?>

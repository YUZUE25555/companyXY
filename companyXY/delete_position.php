<?php
include("conn_db.php");

if (isset($_GET['PosID'])) {
    $PosID = $_GET['PosID'];

    $stmt = $conn->prepare("DELETE FROM position WHERE PosID = ?");
    $stmt->bind_param("i", $PosID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบตำแหน่งงานเรียบร้อยแล้ว'); window.location='select_position.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบรหัสตำแหน่งที่ต้องการลบ'); window.location='select_position.php';</script>";
}

$conn->close();
?>

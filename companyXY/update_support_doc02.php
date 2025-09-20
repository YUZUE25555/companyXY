<?php
include("conn_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DocID = $_POST['DocID'];
    $DocName = isset($_POST['DocName']) ? $_POST['DocName'] : null;

    $sql = "UPDATE support_doc SET DocName = ? WHERE DocID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $DocName, $DocID);

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว'); window.location.href='select_support_doc.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดต: {$stmt->error}'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
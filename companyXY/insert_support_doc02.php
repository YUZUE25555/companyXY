<?php
include("conn_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DocID = $_POST['DocID'];
    $DocName = isset($_POST['DocName']) ? $_POST['DocName'] : null;

    // ตรวจสอบว่ามี DocID ซ้ำหรือไม่
    $check = $conn->query("SELECT * FROM support_doc WHERE DocID = '$DocID'");
    if ($check->num_rows > 0) {
        echo "<script>alert('รหัสเอกสารนี้มีอยู่แล้วในระบบ'); window.history.back();</script>";
        exit;
    }

    $sql = "INSERT INTO support_doc (DocID, DocName) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $DocID, $DocName);

    if ($stmt->execute()) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location.href='select_support_doc.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึก: {$stmt->error}'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

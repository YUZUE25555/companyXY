<?php
include("conn_db.php");

if (isset($_GET['skill_id'])) {
    $skill_id = $_GET['skill_id'];

    $stmt = $conn->prepare("DELETE FROM special_skills WHERE skill_id = ?");
    $stmt->bind_param("i", $skill_id);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลทักษะพิเศษเรียบร้อยแล้ว'); window.location='select_special_skills.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบรหัสทักษะที่ต้องการลบ'); window.location='select_special_skills.php';</script>";
}

$conn->close();
?>

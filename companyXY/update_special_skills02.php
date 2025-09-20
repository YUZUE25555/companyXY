<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skill_id = $_POST['skill_id'];

    $language = trim($_POST['language']);
    $Computer = $_POST['Computer'];
    $driver_license = trim($_POST['driver_license']);
    $Driving_Ability = $_POST['Driving_Ability'];
    $office_equipment_skills = trim($_POST['office_equipment_skills']);
    $special_knowledge = trim($_POST['special_knowledge']);
    $favorite_sports = trim($_POST['favorite_sports']);
    $hobbies = trim($_POST['hobbies']);
    $thai_typing_speed = $_POST['thai_typing_speed'];
    $english_typing_speed = $_POST['english_typing_speed'];
    $ApplicantID = $_POST['ApplicantID'];

    // เช็กว่าฟิลด์บังคับถูกกรอกหรือไม่
    if ($language === "" || $Computer === "" || $Driving_Ability === "" || $ApplicantID === "") {
        echo "<script>alert('กรุณากรอกข้อมูลที่จำเป็นให้ครบ'); history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("UPDATE special_skills SET 
        language = ?, Computer = ?, driver_license = ?, Driving_Ability = ?, office_equipment_skills = ?, 
        special_knowledge = ?, favorite_sports = ?, hobbies = ?, thai_typing_speed = ?, english_typing_speed = ?, 
        ApplicantID = ?
        WHERE skill_id = ?");

    $stmt->bind_param(
        "ssssssssssii",
        $language, $Computer, $driver_license, $Driving_Ability,
        $office_equipment_skills, $special_knowledge, $favorite_sports, $hobbies,
        $thai_typing_speed, $english_typing_speed, $ApplicantID, $skill_id
    );

    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลทักษะพิเศษเรียบร้อยแล้ว'); window.location='select_special_skills.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ไม่สามารถเข้าถึงหน้านี้ได้โดยตรง'); window.location='select_special_skills.php';</script>";
}
?>

<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $round = $_POST["round"];
    $opening_year = $_POST["Opening_Year"];

    // ตรวจสอบว่า round ซ้ำหรือไม่
    $check_sql = "SELECT * FROM application_round WHERE round = '$round'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('รอบนี้มีอยู่แล้วในระบบ!'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO application_round (round, Opening_Year) VALUES ('$round', '$opening_year')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('เพิ่มรอบสำเร็จ'); window.location.href='select_application_round.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: {$conn->error}'); window.history.back();</script>";
        }
    }
    $conn->close();
}
?>
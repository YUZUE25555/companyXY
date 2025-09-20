<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $round = $_POST['round'];
    $opening_year = $_POST['Opening_Year'];

    $sql = "UPDATE application_round SET Opening_Year = '$opening_year' WHERE round = '$round'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว'); window.location.href='select_application_round.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดต: {$conn->error}'); window.history.back();</script>";
    }
    $conn->close();
}
?>

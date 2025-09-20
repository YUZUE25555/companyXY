<?php
include("conn_db.php");

if (!isset($_GET['round'])) {
    echo "<script>alert('ไม่พบข้อมูลรอบ'); window.location.href='select_application_round.php';</script>";
    exit;
}

$round = $_GET['round'];
$sql = "SELECT * FROM application_round WHERE round = '$round'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขรอบการสมัคร</title>
    <style>
        form { width: 40%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="date"] { width: 100%; padding: 8px; margin-top: 5px; }
        .required-label { color: red; }
        .invalid { border: 2px solid red; background-color: #ffe6e6; }
    </style>
</head>
<body>
    <h2 align="center">แก้ไขรอบการสมัคร</h2>
    <form id="editForm" action="update_application_round02.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="round" value="<?php echo $data['round']; ?>">
        <label>ปีที่เปิดรับ:</label>
        <input type="number" name="Opening_Year" min="2000" max="2100" required>


        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึกการแก้ไข</button>
            <button type="button" onclick="location.href='select_application_round.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            const input = document.getElementById("Opening_Year");
            input.classList.remove("invalid");
            if (!input.value.trim()) {
                input.classList.add("invalid");
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

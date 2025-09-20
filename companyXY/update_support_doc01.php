<?php
include("conn_db.php");

if (!isset($_GET['DocID'])) {
    echo "<script>alert('ไม่พบรหัสเอกสารที่ต้องการแก้ไข'); window.location.href='select_support_doc.php';</script>";
    exit;
}

$DocID = $_GET['DocID'];
$sql = "SELECT * FROM support_doc WHERE DocID = '$DocID'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขเอกสาร</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"] { width: 100%; padding: 8px; margin-top: 5px; }
        .required-label { color: red; }
        .invalid { border: 2px solid red; background-color: #ffe6e6; }
    </style>
</head>
<body>
    <h2 align="center">แก้ไขเอกสารประกอบการสมัคร</h2>

    <form id="updateForm" action="update_support_doc02.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="DocID" value="<?php echo $data['DocID']; ?>">

        <label for="DocName">ชื่อเอกสาร</label>
        <input type="text" name="DocName" id="DocName" value="<?php echo $data['DocName']; ?>">

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึกการแก้ไข</button>
            <button type="button" onclick="location.href='select_support_doc.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            return true; // ไม่มีฟิลด์จำเป็นต้องกรอกเพิ่มเติม
        }
    </script>
</body>
</html>

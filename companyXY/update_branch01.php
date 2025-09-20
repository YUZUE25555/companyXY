<?php
include("conn_db.php");

if (!isset($_GET['BranchID'])) {
    echo "<script>alert('ไม่พบรหัสสาขา'); window.location.href='select_branch.php';</script>";
    exit;
}

$BranchID = $_GET['BranchID'];
$sql = "SELECT * FROM branch WHERE BranchID = '$BranchID'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลสาขา</title>
    <style>
        form {
            width: 40%; margin: auto; padding: 20px;
            border: 1px solid #ccc; border-radius: 8px;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"] {
            width: 100%; padding: 8px; margin-top: 5px;
        }
        .required-label { color: red; }
        .invalid {
            border: 2px solid red; background-color: #ffe6e6;
        }
    </style>
</head>
<body>
    <h2 align="center">แก้ไขข้อมูลสาขา</h2>
    <form id="branchForm" action="update_branch02.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="BranchID" value="<?php echo $data['BranchID']; ?>">

        <label for="BranchName">ชื่อสาขา</label>
        <input type="text" name="BranchName" id="BranchName" value="<?php echo $data['BranchName']; ?>">

        <br><br>
        <div style="text-align: center;">
            <button type="submit">บันทึกการแก้ไข</button>
            <button type="button" onclick="location.href='select_branch.php'">ยกเลิก</button>
        </div>
    </form>

    <script>
        function validateForm() {
            // BranchName เป็น optional, ไม่ต้อง validate อะไรเพิ่มเติมก็ได้
            return true;
        }
    </script>
</body>
</html>

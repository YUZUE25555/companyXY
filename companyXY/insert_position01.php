<?php
include("conn_db.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มตำแหน่งงาน</title>
    <style>
        form {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        button {
            margin-top: 15px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button {
            background-color: #888;
        }
        .required { color: red; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>ฟอร์มเพิ่มตำแหน่งงาน</h2>

    <form method="post" action="insert_position02.php">
        <label>รหัสตำแหน่ง <span class="required">*</span>
            <input type="number" name="PosID" required>
        </label>

        <label>ชื่อตำแหน่ง
            <input type="text" name="PosName">
        </label>

        <input type="submit" value="บันทึก">
        <button type="button" onclick="location.href='select_position.php'">ยกเลิก</button>
    </form>
</body>
</html>

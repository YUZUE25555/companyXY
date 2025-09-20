<?php

    $servername = "localhost"; //ชื่อ Host ฐานข้อมูล
    $username = "comxy"; //ชื่อผู้ใช้งานฐานข้อมูล
    $password = "123"; //รหัสผ่านเข้าฐานข้อมูล
    $dbname = 'companyxy'; //ชื่อฐานข้อมูล

    // Create connection
    $conn = mysqli_connect($servername, $username, $password ,$dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        // echo "Connected successfully";
?>
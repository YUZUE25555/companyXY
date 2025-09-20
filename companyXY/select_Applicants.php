<?php
include("conn_db.php");

// ค้นหาข้อมูล ถ้ามีคำค้น
$search = isset($_GET['search']) ? $_GET['search'] : '';
$where = "";

if (!empty($search)) {
    $where = "WHERE Name LIKE '%$search%' OR NationalID LIKE '%$search%'";
}

$sql = "SELECT * FROM applicant $where ORDER BY ApplicantID ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายชื่อผู้สมัคร</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #f2f2f2; }
        input[type="text"] { padding: 6px; width: 300px; }
    </style>
</head>
<body>
    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\"
                    onclick=\"location.href='insert_applicant01.php'\" style=\"width:150px;\">New Applicant</button>
                <button type=\"button\" class=\"btn btn-warning\"
                    onclick=\"location.href='index.php'\" style=\"width:150px;\">Back to Home</button>
              </div>";
    ?>
    <h2 align="center">รายการผู้สมัคร</h2>

    <form method="GET" style="text-align:center;">
        <input type="text" name="search" placeholder="ค้นหาด้วยชื่อหรือเลขบัตรประชาชน" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">ค้นหา</button>
        <button type="button" onclick="location.href='select_Applicants.php'">ล้างการค้นหา</button>
    </form>

    <table>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสผู้สมัคร</th>
            <th>วันเกิด</th>
            <th>เลขบัตรประชาชน</th>
            <th>วันหมดอายุบัตร</th>
            <th>ชื่อ-นามสกุล</th>
            <th>อายุ</th>
            <th>สัญชาติ</th>
            <th>เชื้อชาติ</th>
            <th>อีเมล</th>
            <th>เฟซบุ๊ก</th>
            <th>เพศ</th>
            <th>โทรศัพท์บ้าน</th>
            <th>โทรศัพท์สำนักงาน</th>
            <th>มือถือ</th>
            <th>สถานะทางทหาร</th>
            <th>สถานภาพสมรส</th>
            <th>ส่วนสูง (ซม.)</th>
            <th>น้ำหนัก (กก.)</th>
            <th>ศาสนา</th>
            <th>แหล่งที่มาของข่าวรับสมัคร</th>
            <th>บ้านเลขที่</th>
            <th>ถนน</th>
            <th>หมู่บ้าน</th>
            <th>ตำบล</th>
            <th>อำเภอ</th>
            <th>จังหวัด</th>
            <th>รหัสไปรษณีย์</th>
            <th>การจัดการ</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $i++ . "</td>
                        <td>" . $row['ApplicantID'] . "</td>
                        <td>" . $row['BirthDate'] . "</td>
                        <td>" . $row['NationalID'] . "</td>
                        <td>" . $row['ID_Expiry_Date'] . "</td>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['age'] . "</td>
                        <td>" . $row['Nationality'] . "</td>
                        <td>" . $row['Ethnicity'] . "</td>
                        <td>" . $row['Email'] . "</td>
                        <td>" . $row['Facebook'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td>" . $row['Home_phone'] . "</td>
                        <td>" . $row['Office_phone'] . "</td>
                        <td>" . $row['Mobile'] . "</td>
                        <td>" . $row['Military_Status'] . "</td>
                        <td>" . $row['Marital_Status'] . "</td>
                        <td>" . $row['Height'] . "</td>
                        <td>" . $row['Weight'] . "</td>
                        <td>" . $row['Religion'] . "</td>
                        <td>" . $row['Source_Information'] . "</td>
                        <td>" . $row['AddressNum'] . "</td>
                        <td>" . $row['Street'] . "</td>
                        <td>" . $row['Village'] . "</td>
                        <td>" . $row['Subdistrict'] . "</td>
                        <td>" . $row['District'] . "</td>
                        <td>" . $row['Province'] . "</td>
                        <td>" . $row['Postal_Code'] . "</td>
                        <td style='text-align:center;'>
                            <button type='button' onclick=\"location.href='update_applicant01.php?id=".$row["ApplicantID"]."'\">Edit</button>
                            <button type='button' onclick=\"if(confirm('Are you sure to delete this applicant?')) location.href='delete_applicant.php?id=".$row["ApplicantID"]."'\">Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='26'>ไม่พบข้อมูล</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | CompanyXY</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 40px;
        }
        h3 {
            text-align: center;
            color: #34495e;
            margin-bottom: 30px;
        }
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 0 20px 50px;
        }
        .menu-container input[type="button"] {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            background-color: #3498db;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            min-width: 180px;
        }
        .menu-container input[type="button"]:hover {
            background-color: #2980b9;
        }
        footer {
            text-align: center;
            padding: 10px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Welcome to CompanyXY</h1>
    <h3>เมนูหลัก</h3>

    <div class="menu-container">
        <input type="button" onclick="location.href='select_applicants.php'" value='ผู้สมัคร'>
        <input type="button" onclick="location.href='select_application_round.php'" value='รอบการสมัคร'>
        <input type="button" onclick="location.href='select_branch.php'" value='สาขา'>
        <input type="button" onclick="location.href='select_position.php'" value='ตำแหน่งงาน'>
        <input type="button" onclick="location.href='select_job_openings.php'" value='ตำแหน่งที่เปิดรับ'>
        <input type="button" onclick="location.href='select_doc_submission.php'" value='การส่งเอกสาร'>
        <input type="button" onclick="location.href='select_support_doc.php'" value='เอกสารประกอบ'>
        <input type="button" onclick="location.href='select_education.php'" value='ประวัติการศึกษา'>
        <input type="button" onclick="location.href='select_special_skills.php'" value='ทักษะพิเศษ'>
        <input type="button" onclick="location.href='select_work_exper.php'" value='ประสบการณ์ทำงาน'>
        <input type="button" onclick="location.href='select_emergency_contact.php'" value='บุคคลฉุกเฉิน'>
        <input type="button" onclick="location.href='select_siblings.php'" value='ข้อมูลพี่น้อง'>
        <input type="button" onclick="location.href='select_relatives.php'" value='เครือญาติ'>
        <input type="button" onclick="location.href='select_employee_recruit.php'" value='ฝ่ายบุคคล'>
        <input type="button" onclick="location.href='select_Work_query.php'" value='Query'>
    </div>

    <footer>
        &copy; <?= date("Y") ?> CompanyXY. All rights reserved.
    </footer>
</body>
</html>

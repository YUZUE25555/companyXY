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
    <h1>Welcome to Query</h1>
    <h3>Query</h3>

    <div class="menu-container">
        <input type="button" onclick="location.href='select_1Suttinan_Query.php'" value='Query Make By สุทธินันท์'>
        <input type="button" onclick="location.href='select_2Kanyapat_Query.php'" value='Query Make By กัญญาภัฏ'>
    </div>
    <?php 
        echo "<div style='text-align:center; margin-bottom: 20px;'>
                <button type=\"button\" class=\"btn btn-warning\" 
                    onclick=\"location.href='inselect_Work_queryex.php'\" style=\"width:150px;\">Go back</button>
        </div>";
    ?>
    <footer>
        &copy; <?= date("Y") ?> CompanyXY. All rights reserved.
    </footer>
</body>
</html>

<?php
include("conn_db.php");

// ตรวจสอบ max id ที่มีอยู่
$result = $conn->query("SELECT MAX(ApplicantID) AS max_id FROM applicant");
$row = $result->fetch_assoc();

$newID = ($row["max_id"] !== null) ? $row["max_id"] + 1 : 1; // ถ้า null = เริ่มที่ 1

$sql = "INSERT INTO applicant (
    ApplicantID, BirthDate, NationalID, ID_Expiry_Date, `Name`, age, Nationality,
    Ethnicity, Email, Facebook, Gender,Home_phone,Office_phone,Mobile,Military_Status, Marital_Status, Height, Weight, Religion,
    Source_Information, AddressNum, Street, Village, Subdistrict, District, Province, Postal_Code
) VALUES (
    '$newID', '$_POST[BirthDate]', '$_POST[NationalID]', '$_POST[ID_Expiry_Date]', '$_POST[Name]', '$_POST[age]',
    '$_POST[Nationality]', '$_POST[Ethnicity]', '$_POST[Email]', '$_POST[Facebook]', '$_POST[Gender]','$_POST[Home_phone]', '$_POST[Office_phone]', '$_POST[Mobile]', 
    '$_POST[Military_Status]', '$_POST[Marital_Status]', '$_POST[Height]', '$_POST[Weight]', '$_POST[Religion]',
    '$_POST[Source_Information]', '$_POST[AddressNum]', '$_POST[Street]', '$_POST[Village]', '$_POST[Subdistrict]',
    '$_POST[District]', '$_POST[Province]', '$_POST[Postal_Code]'
)";

if ($conn->query($sql)) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location.href='select_Applicants.php';</script>";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}
?>

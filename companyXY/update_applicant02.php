<?php
include("conn_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ApplicantID = $_POST["ApplicantID"];

    $sql = "UPDATE applicant SET
        BirthDate = '$_POST[BirthDate]',
        NationalID = '$_POST[NationalID]',
        ID_Expiry_Date = '$_POST[ID_Expiry_Date]',
        `Name` = '$_POST[Name]',
        age = '$_POST[age]',
        Nationality = '$_POST[Nationality]',
        Ethnicity = '$_POST[Ethnicity]',
        Email = '$_POST[Email]',
        Facebook = '$_POST[Facebook]',
        Gender = '$_POST[Gender]',
        Home_phone = '$_POST[Home_phone]', 
        Office_phone = '$_POST[Office_phone]', 
        Mobile = '$_POST[Mobile]',
        Military_Status = '$_POST[Military_Status]',
        Marital_Status = '$_POST[Marital_Status]',
        Height = '$_POST[Height]',
        Weight = '$_POST[Weight]',
        Religion = '$_POST[Religion]',
        Source_Information = '$_POST[Source_Information]',
        AddressNum = '$_POST[AddressNum]',
        Street = '$_POST[Street]',
        Village = '$_POST[Village]',
        Subdistrict = '$_POST[Subdistrict]',
        District = '$_POST[District]',
        Province = '$_POST[Province]',
        Postal_Code = '$_POST[Postal_Code]'
        WHERE ApplicantID = '$ApplicantID'
    ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย'); window.location.href='select_Applicants.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$conn->error}'); window.history.back();</script>";
    }
    $conn->close();
}
?>
<?php
include("conn_db.php");

if (
    isset($_GET['Age']) && 
    isset($_GET['Occupation']) && 
    isset($_GET['Sibling_Name']) && 
    isset($_GET['Sibling_Order']) && 
    isset($_GET['Num_Siblings']) && 
    isset($_GET['ApplicantID'])
) {
    $Age = $_GET['Age'];
    $Occupation = $_GET['Occupation'];
    $Sibling_Name = $_GET['Sibling_Name'];
    $Sibling_Order = $_GET['Sibling_Order'];
    $Num_Siblings = $_GET['Num_Siblings'];
    $ApplicantID = $_GET['ApplicantID'];

    $stmt = $conn->prepare("DELETE FROM siblings 
        WHERE Age = ? AND Occupation = ? AND Sibling_Name = ? AND Sibling_Order = ? AND Num_Siblings = ? AND ApplicantID = ?");
    $stmt->bind_param("issiii", $Age, $Occupation, $Sibling_Name, $Sibling_Order, $Num_Siblings, $ApplicantID);

    if ($stmt->execute()) {
        echo "<script>alert('ลบข้อมูลพี่น้องเรียบร้อยแล้ว'); window.location='select_siblings.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: {$stmt->error}'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ไม่พบข้อมูลที่ต้องการลบ'); window.location='select_siblings.php';</script>";
}

$conn->close();
?>

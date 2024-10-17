<?php

include_once('../api/dbconnect.php');
$conn = connectToDatabase();

$inquiry_type = $_POST['inquiry_type'];
$company_name = $_POST['company_name'];
$contact_name = $_POST['contact_name'];
$contact_number = $_POST['contact_number']; 
$contact_email = $_POST['contact_email'];

$stmt = $conn->prepare("INSERT INTO B2B_inquiries (inquiry_type, company_name, contact_name, contact_number, contact_email, created_at) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");

$stmt->bind_param("sssss", $inquiry_type, $company_name, $contact_name, $contact_number, $contact_email);

if ($stmt->execute()) {
    echo "<script>
            alert('문의 등록이 완료되었습니다! 빠른 시일 내에 연락드리겠습니다.');
            window.location.href = '/mybootstrap/index.html';
            </script>";
} else {
    echo "Error inserting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
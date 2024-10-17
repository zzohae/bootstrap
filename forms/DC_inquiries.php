<?php

include_once('../api/dbconnect.php');
$conn = connectToDatabase();

$store_name = $_POST['store_name'];
$store_address = $_POST['store_address'];
$owner_name = $_POST['owner_name'];
$contact_number = $_POST['contact_number']; 
$delivery_apps = isset($_POST['app']) ? implode(",", $_POST['app']) : '';
$delivery_apps_other = $_POST['app_other'] ?? '';

$stmt = $conn->prepare("INSERT INTO delivery_container_inquiries (store_name, store_address, owner_name, contact_number, delivery_apps, delivery_apps_other, created_at) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");

$stmt->bind_param("ssssss", $store_name, $store_address, $owner_name, $contact_number, $delivery_apps, $delivery_apps_other);

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
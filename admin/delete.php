<?php

include_once("../api/dbconnect.php");
$conn = connectToDatabase();

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

if (isset($_POST['del']) && !empty($_POST['del'])) {
  $ids = $_POST['del'];
  $ids_list = implode(',', array_map('intval', $ids));
  $conn->query("DELETE FROM delivery_container_inquiries WHERE inquiry_id IN ($ids_list)");
  $conn->query("DELETE FROM B2B_inquiries WHERE inquiry_id IN ($ids_list)");
  $conn->query("DELETE FROM event_inquiries WHERE inquiry_id IN ($ids_list)");
  echo "<script>alert('선택된 항목이 삭제되었습니다.');
            window.location.href = '/mybootstrap/admin/lists.php';
          </script>";
}

$conn->close();
exit();

?>
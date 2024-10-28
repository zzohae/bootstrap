<?php
session_start();

include_once('../api/dbconnect.php');
$conn = connectToDatabase();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = trim($username);
  $password = trim($password);

  $stmt = $conn->prepare("SELECT adminPW FROM adminInfo WHERE adminID = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $stmt->bind_result($storedPassword);
  $stmt->fetch();

  if ($storedPassword) {
      if ($password === $storedPassword) {
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("Location: /mybootstrap/admin/lists.php");
          exit;
      } else {
          echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');
          window.location.href = '/mybootstrap/admin.html'; </script>";
      }
  } else {
      echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');
      window.location.href = '/mybootstrap/admin.html'; </script>";
  }
}

$stmt->close();
$conn->close();
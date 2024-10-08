<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>부트스트랩 개인작</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/bootstrap/assets/img/common/icon.ico" rel="icon">
  <link href="/bootstrap/assets/img/common/icon.ico" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="stylesheet" as="style" crossorigin
    href="//cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css" />

  <!-- Vendor CSS Files -->
  <link href="/bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/bootstrap/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/bootstrap/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/bootstrap/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/bootstrap/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/bootstrap/assets/css/main.css?ver=<?php echo time(); ?>" rel="stylesheet">
  <link rel="stylesheet" href="/bootstrap/assets/css/common.min.css">
  <link rel="stylesheet" href="/bootstrap/assets/css/mainpage.min.css">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0 col-2">
        <!-- img로 svg를 넣기: 반드시 html5 -->
        <?php include_once("./layout/svg/logo.html"); ?>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>

        </ul>
        <!-- <i class="mobile-nav-toggle d-xl-none bi bi-list"></i> -->
      </nav>

      <div>
        <a class="btn-getstarted" href="//app.returnit.co.kr/">반납하기</a>
        <a class="btn-getstarted" href="#">문의하기</a>
      </div>


    </div>
  </header>
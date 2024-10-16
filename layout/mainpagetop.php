<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>부트스트랩 개인작</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/mybootstrap/assets/img/common/icon.ico" rel="icon">
  <link href="/mybootstrap/assets/img/common/icon.ico" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="stylesheet" as="style" crossorigin
    href="//cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/variable/pretendardvariable-dynamic-subset.min.css" />

  <!-- Vendor CSS Files -->
  <link href="/mybootstrap/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/mybootstrap/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/mybootstrap/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/mybootstrap/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/mybootstrap/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

  <!-- Main CSS File -->
  <link href="/mybootstrap/assets/css/main.css?ver=<?php echo time(); ?>" rel="stylesheet">
  <link rel="stylesheet" href="/mybootstrap/assets/css/common.min.css">
  <link rel="stylesheet" href="/mybootstrap/assets/css/mainpage.min.css">

</head>

<body id="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo me-lg-0 col-2">
        <!-- img로 svg를 넣기: 반드시 html5 -->
        <?php include_once("./layout/svg/logo.html"); ?>
      </a>

      <nav id="navmenu" class="navmenu d-flex">
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
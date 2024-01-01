<?php
include "inc/db.php";
ob_start();
session_start();

if (empty($_SESSION['Email']) || empty($_SESSION['password'])) {

  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <style>
    .fileuplode {
      height: calc(2.25rem + 2px);
      width: 100%;
      color: #495090;
      background-color: #2A3038;
      background-clip: padding-box;
      border: 1px solid #2c2e33;
      border-radius: 2px;
      font-size: 0.875rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .fileuplode:focus {
      border: 0.5px solid #006d2f;
    }

    ::-webkit-file-upload-button {
      border: none;
      outline: none;
      border-top-right-radius: 40px;
      border-bottom-right-radius: 40px;
      background-color: #8f5fe8;
      padding-left: 15px;
      padding-right: 15px;
      margin-right: 10px;
      cursor: pointer;
      height: 100%;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
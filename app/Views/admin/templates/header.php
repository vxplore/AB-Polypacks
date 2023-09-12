<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    $meta_title_postfix = "Admin | AB Polypacks";
    $URL_path = uri_string();
    $URL_segment = explode("/", $URL_path);
  ?>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=(!empty($URL_segment[1])) ? ucwords($URL_segment[1])." | ".$meta_title_postfix : $meta_title_postfix?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url('assets/admin/img/favicon.png')?>" rel="icon">
  <link href="<?=base_url('assets/admin/img/apple-touch-icon.png')?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/quill/quill.snow.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/quill/quill.bubble.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/admin/vendor/simple-datatables/style.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/admin/css/style.css')?>" rel="stylesheet">

  <!-- Toastify CSS File -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <!-- jQuery JS File -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTable CSS & JS File -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
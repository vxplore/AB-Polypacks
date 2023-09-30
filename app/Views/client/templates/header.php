<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="<?=(!empty($page_details->meta_description)) ? $page_details->meta_description : ''?>">
    <meta name="keywords" content="<?=(!empty($page_details->meta_keywords)) ? $page_details->meta_keywords : ''?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=(!empty($page_details->meta_title)) ? $page_details->meta_title : ''?></title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('favicon.png')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="<?=base_url('assets/client//css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/client/css/custom.css')?>" rel="stylesheet">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Admin Template">
    <meta name="author" content="HEKKY NURHIKMAT">

    <title><?php echo $siteTitle; ?> :: Administrator</title>

    <?php echo $css ?>
</head>
<?php if ($this->uri->segment(1) == "login"): ?>
  <body class="login-page">
<?php else: ?>
  <body class="system">
<?php endif; ?>

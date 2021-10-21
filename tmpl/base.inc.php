<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">
    <link rel="stylesheet" href="./../../lib/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="./css/global.css"/>
    <link rel="stylesheet" href="./css/style.css"/>
    <script src="./../../lib/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../../lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./js/script.js"></script>
    <title>Tempus Fugit</title>
</head>

<body>
<?php
include_once './tmpl/element/header.inc.php'; ?>
<div class="container">
    <?php
    /** @var $msg /index.php */
    if (isset($msg)): ?>
        <section id="section-msg">
            <h3><?= $msg ?></h3>
        </section>
    <?php
    endif; ?>

    <?php
    /** @var $tmpl ./../index.php */
    include_once $tmpl; ?>
</div>
<?php
include_once './tmpl/element/footer.inc.php'; ?>
<?php
include_once './tmpl/element/modal.inc.php'; ?>
</body>

</html>
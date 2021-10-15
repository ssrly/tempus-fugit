<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">
    <link rel="stylesheet" href="./../../lib/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./../../lib/jquery/jquery-3.6.0.min.js"></script>
    <script src="./../../lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="./../../lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./js/script.js"></script>
    <title>Tempus Fugit</title>
</head>

<html>

<body>
    <?php include_once './tmpl/element/header.inc.php'; ?>
    <?php include_once './tmpl/element/nav.inc.php'; ?>
    <hr>
    <div class="container">
        <?php include_once $tmpl; ?>
    </div>
    <hr>
    <?php include_once './tmpl/element/footer.inc.php'; ?>
</body>

</html>
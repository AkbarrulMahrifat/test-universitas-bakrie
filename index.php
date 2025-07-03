<!DOCTYPE html>
<html>

<head>
    <title>Hitung Kombinasi Soal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
</head>

<body>
    <?php
    //default routing
    require_once 'controller/QuestionController.php';

    $controller = new QuestionController();
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $controller->$action();
    ?>

</body>

</html>
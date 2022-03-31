<?php
    require_once __DIR__ . "/autoload.php";

    use Maker\Router\Router;
    
    if (Router::get(2) == "actions") {
        require_once __DIR__ . "/src/actions/create.php";
        die();
    }    
    if (!Router::get(2)) {
        $file = "start";
    } else {
        $file = Router::get(2);
    }
?>
<!doctype html>
<html>
    <head>
        <title>Create your webpage for free!</title>
        <?php require_once __DIR__ . "/src/components/meta.php"; ?>
        <?php require_once __DIR__ . "/src/components/links.php"; ?>
    </head>
    <body>
        <?php 
            if (file_exists(__DIR__ . "/src/templates/{$file}" . ".php")) {
                require_once __DIR__ . "/src/templates/{$file}" . ".php";
            } else {
                require_once __DIR__ . "/src/templates/404.php";
            }
        ?>
        <?php require_once __DIR__ . "/src/components/scripts.php"; ?>
    </body>
</html>
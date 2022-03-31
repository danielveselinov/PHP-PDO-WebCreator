<?php

use Database\Connection\Db;


try {
    $stmt = Db::connect()->query("SELECT id, cover_img_url, title FROM company WHERE 1");

    if ($stmt->rowCount() > 0) {
        while ($company = $stmt->fetch()) {
            $id = encrypt($company['id']);
            $id = urlencode($id);
            echo 
            "<div class='col-12 col-md-4'>
                <div class='card my-2 border-0'>
                    <div class='card-body text-light bg-dark'>
                        <p class='card-text'>{$company['title']}</p>
                    </div>
                    <div class='card-footer bg-dark'>
                        <a href='".PATH."company/{$id}' class='btn btn-link'>View company</a>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo 
            "<div class='alert alert-warning'>
                No companies found yet
            </div>";
    }
} catch (PDOException $ex) {
    file_put_contents(__DIR__ . "/../../log.txt", $ex->getMessage() . PHP_EOL, FILE_APPEND);
    header("Location: ".PATH."404");
    die();
}


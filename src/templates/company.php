<?php

use Database\Connection\Db;
use Maker\Router\Router;

    $id = Router::get(3);

    if (Router::get(2) == "company" && Router::get(3) && Router::get(3) == $id) {
        try {
            $id = urldecode($id);
            $DBID = decrypt($id);
            $stmt = Db::connect()->prepare("SELECT company.*, 
            cards.img_url_1, cards.img_url_2, cards.img_url_3, cards.desc_1, cards.desc_2, cards.desc_3,
            links.linkedin, links.facebook, links.twitter, links.github, offers.offer_name FROM company
            JOIN cards on cards.company_id = company.id 
            JOIN links ON links.company_id = company.id 
            JOIN offers ON company.occupation = offers.id WHERE company.id = ?");

            $stmt->execute([$DBID]);

            if ($stmt->rowCount() == 0) {
                echo "<div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-12 col-md-6 position-absolute' style='z-index: 99999 !important; top:15%; left:50%; transform: translate(-50%, -15%);'>
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <h4 class='alert-heading'>Opss!</h4>
                                    <p>You are looking for non-existing company.. Please check your URL and then try again later!</p>
                                    <hr>
                                    <a href='".PATH."start'>Return back</a>
                                </div>
                            </div>
                        </div>
                    </div>";    
            }
        } catch (PDOException $ex) {
            file_put_contents(__DIR__ . "/../../log.txt", "RUTA: " . $ex->getMessage() . PHP_EOL, FILE_APPEND);
            header("Location: ../404");
            die();
        }
    } else {
        echo "<div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-12 col-md-6 position-absolute' style='z-index: 99999 !important; top:15%; left:50%; transform: translate(-50%, -15%);'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <h4 class='alert-heading'>Opss!</h4>
                            <p>You are looking for non-existing company.. Please check your URL and then try again later!</p>
                            <hr>
                            <a href='".PATH."start'>Return Back</a>
                        </div>
                    </div>
                </div>
            </div>";
        die();
    }

    if (Router::get(2) == "company" && Router::get(4) == "alert") {
        echo "<div class='container'>
        <div class='row justify-content-center'>
            <div class='col-12 col-md-6 position-absolute' style='z-index: 99999 !important; top:15%; left:50%; transform: translate(-50%, -15%);'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <h4 class='alert-heading'>Well done!</h4>
                    <p>Aww yeah, you successfully created webpage for your company. This webpage is going to run as long as possible so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class='mb-0'>Whenever you need to, be sure to check and share your company webpage.</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>";
    }
?>
<?php while ($company = $stmt->fetch()) { ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= PATH ?>start">MAIN HOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about-us">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#services"><?= $company["offer_name"] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<section id="home" class="d-flex flex-column justify-content-between vh-60" style="background: linear-gradient( 90deg, #000000 0%, white 0%, rgba(0, 0, 0, 0.35) 0%), url(<?= $company["cover_img_url"] ?>) no-repeat center / cover;">
    <p class="h3 pt-5 text-center text-white col-12 col-md-4 m-auto"><?= $company["title"] ?></p>
    <p class="h1 text-center text-white col-12 col-md-4 m-auto"><?= $company["subtitle"] ?></p>
</section>

<section id="about-us" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <p class="h3 text-dark">About us</p>
                <p class="text-dark border-bottom pb-3"><?= $company["about"] ?></p>
                <p class="mb-0">Tel: <a href="tel:<?= $company["telephone"] ?>"><?= $company["telephone"] ?></a></p>
                <p class="mb-0">Location: <?= $company["location"] ?></p>
            </div>
        </div>
    </div>
</section>

<section id="services" class="py-5">
    <div class="container border-bottom pb-5">
        <p class="h2 mb-0">Services</p>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card">
                    <img src="<?= $company["img_url_1"] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-light bg-dark">
                        <p class="card-text"><?= $company["desc_1"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <img src="<?= $company["img_url_2"] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-light bg-dark">
                        <p class="card-text"><?= $company["desc_2"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <img src="<?= $company["img_url_3"] ?>" class="card-img-top" alt="...">
                    <div class="card-body text-light bg-dark">
                        <p class="card-text"><?= $company["desc_3"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <p class="h2">Contact</p>
                <p class="mb-0 text-dark"><?= $company["company_desc"] ?></p>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="user_name">Full Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="John Doe">
                </div>

                <div class="form-group">
                    <label for="user_email">Email address</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="john@example.com">
                </div>

                <div class="form-group">
                    <label for="user_message">Message</label>
                    <textarea class="form-control" id="user_message" name="user_message" rows="3"></textarea>
                </div>

                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</section>

<section class="py-3 bg-dark">
    <div class="container">
        <div class="d-flex flex-column text-center">
            <p class="text-light">2022, Copyright Daniel Veselinov @ Brainster</p>
            <div class="d-flex justify-content-center">
                <a href="<?= $company["linkedin"] ?>" class="ml-2">Linkedin</a>
                <a href="<?= $company["facebook"] ?>" class="ml-2">Facebook</a>
                <a href="<?= $company["twitter"] ?>" class="ml-2">Twitter</a>
                <a href="<?= $company["github"] ?>" class="ml-2">GitHub</a>
            </div>
        </div>
    </div>
</section>
<?php } ?>
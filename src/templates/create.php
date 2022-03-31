<section class="min-vh-100 pb-5 bg-image-custom">
    <div class="container">
        <p class="h3 text-white text-center pt-5">You are one step away from your webpage!</p>
        <form method="POST" action="<?= PATH ?>actions/create" class="row justify-content-center mt-3">
            <div class="col-12 col-md-4">
                <div class="card p-4">
                    <div class="form-group">
                        <label for="cover_image">Cover Image URL</label>
                        <input type="text" class="form-control" id="cover_image" name="cover_image" value="<?= isset($_SESSION['oldInfo']['cover_image']) ? $_SESSION['oldInfo']['cover_image'] : '' ; ?>" placeholder="Cover image url">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('cover_image', $_SESSION['errors']) ? $_SESSION['errors']['cover_image'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['invalid_cover_image']) ? $_SESSION['errors']['invalid_cover_image'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="main_title">Main title of Page</label>
                        <input type="text" class="form-control" id="main_title" name="main_title" value="<?= isset($_SESSION['oldInfo']['main_title']) ? $_SESSION['oldInfo']['main_title'] : '' ; ?>" placeholder="Main title of Page">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('main_title', $_SESSION['errors']) ? $_SESSION['errors']['main_title'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="sub_title">Subtitle of Page</label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?= isset($_SESSION['oldInfo']['sub_title']) ? $_SESSION['oldInfo']['sub_title'] : '' ; ?>" placeholder="Subtitle of Page">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('sub_title', $_SESSION['errors']) ? $_SESSION['errors']['sub_title'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="page_about">Something about you</label>
                        <textarea class="form-control" id="page_about" name="page_about" rows="3"><?= isset($_SESSION['oldInfo']['page_about']) ? $_SESSION['oldInfo']['page_about'] : '' ; ?></textarea>
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('page_about', $_SESSION['errors']) ? $_SESSION['errors']['page_about'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="tel_number">Your telephone number</label>
                        <input type="text" class="form-control" id="tel_number" name="tel_number" value="<?= isset($_SESSION['oldInfo']['tel_number']) ? $_SESSION['oldInfo']['tel_number'] : '' ; ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" placeholder="123456789">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('tel_number', $_SESSION['errors']) ? $_SESSION['errors']['tel_number'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['invalid_tel_number']) ? $_SESSION['errors']['invalid_tel_number'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="page_location">Location</label>
                        <input type="text" class="form-control" id="page_location" name="page_location" value="<?= isset($_SESSION['oldInfo']['page_location']) ? $_SESSION['oldInfo']['page_location'] : '' ; ?>" placeholder="Shtip, Macedonia">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('page_location', $_SESSION['errors']) ? $_SESSION['errors']['page_location'] : '' ; ?></small>
                    </div>

                    <label for="type_switcher">Do you provide services or products?</label>
                    <select class="form-control" id="type_switcher" name="type_switcher">
                        <option selected disabled>Please select..</option>
                        <?php
                        use Database\Connection\Db;
                        $stmt = Db::connect()->query("SELECT * FROM offers");
                        if ($stmt->rowCount() > 0) {
                            while ($offer = $stmt->fetch()) { ?>
                                <option value="<?= $offer["id"] ?>"><?= $offer["offer_name"] ?></option>       
                        <?php } } ?>
                    </select>
                    <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('type_switcher', $_SESSION['errors']) ? $_SESSION['errors']['type_switcher'] : '' ; ?></small>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card p-4">
                    <p class="small">Provide url for an image and description of your service/product</p>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="text" class="form-control" id="image_url" name="image_url" value="<?= isset($_SESSION['oldInfo']['image_url']) ? $_SESSION['oldInfo']['image_url'] : '' ; ?>" placeholder="Image URL">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_url', $_SESSION['errors']) ? $_SESSION['errors']['image_url'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['invalid_image_url']) ? $_SESSION['errors']['invalid_image_url'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="desc_ser_prod">Description of service/product</label>
                        <textarea class="form-control" id="page_about" name="desc_ser_prod" rows="3"><?= isset($_SESSION['oldInfo']['desc_ser_prod']) ? $_SESSION['oldInfo']['desc_ser_prod'] : '' ; ?></textarea>
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_ser_prod', $_SESSION['errors']) ? $_SESSION['errors']['desc_ser_prod'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="image_url1">Image URL</label>
                        <input type="text" class="form-control" id="image_url1" name="image_url1" value="<?= isset($_SESSION['oldInfo']['image_url1']) ? $_SESSION['oldInfo']['image_url1'] : '' ; ?>" placeholder="Image URL">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_url1', $_SESSION['errors']) ? $_SESSION['errors']['image_url1'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['invalid_image_url1']) ? $_SESSION['errors']['invalid_image_url1'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="desc_ser_prod1">Description of service/product</label>
                        <textarea class="form-control" id="desc_ser_prod1" name="desc_ser_prod1" rows="3"><?= isset($_SESSION['oldInfo']['desc_ser_prod1']) ? $_SESSION['oldInfo']['desc_ser_prod1'] : '' ; ?></textarea>
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_ser_prod1', $_SESSION['errors']) ? $_SESSION['errors']['desc_ser_prod1'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="image_url2">Image URL</label>
                        <input type="text" class="form-control" id="image_url2" name="image_url2" value="<?= isset($_SESSION['oldInfo']['image_url2']) ? $_SESSION['oldInfo']['image_url2'] : '' ; ?>" placeholder="Image URL">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('image_url2', $_SESSION['errors']) ? $_SESSION['errors']['image_url2'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['invalid_image_url2']) ? $_SESSION['errors']['invalid_image_url2'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="desc_ser_prod2">Description of service/product</label>
                        <textarea class="form-control" id="desc_ser_prod2" name="desc_ser_prod2" rows="3"><?= isset($_SESSION['oldInfo']['desc_ser_prod2']) ? $_SESSION['oldInfo']['desc_ser_prod2'] : '' ; ?></textarea>
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('desc_ser_prod2', $_SESSION['errors']) ? $_SESSION['errors']['desc_ser_prod2'] : '' ; ?></small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card p-4">
                    <p class="small">Provide a description of your company, something people should be aware of before they contact you:</p>
                    <div class="form-group">
                        <textarea class="form-control" name="company_desc" rows="3"><?= isset($_SESSION['oldInfo']['company_desc']) ? $_SESSION['oldInfo']['company_desc'] : '' ; ?></textarea>
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('company_desc', $_SESSION['errors']) ? $_SESSION['errors']['company_desc'] : '' ; ?></small>
                    </div>

                    <div class="border-bottom mb-3"></div>

                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= isset($_SESSION['oldInfo']['linkedin']) ? $_SESSION['oldInfo']['linkedin'] : '' ; ?>" placeholder="Social link">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('linkedin', $_SESSION['errors']) ? $_SESSION['errors']['linkedin'] : '' ; ?></small>
                        
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['linkedin_brokenUrl']) ? $_SESSION['errors']['linkedin_brokenUrl'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?= isset($_SESSION['oldInfo']['facebook']) ? $_SESSION['oldInfo']['facebook'] : '' ; ?>" placeholder="Social link">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('facebook', $_SESSION['errors']) ? $_SESSION['errors']['facebook'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['facebook_brokenUrl']) ? $_SESSION['errors']['facebook_brokenUrl'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?= isset($_SESSION['oldInfo']['twitter']) ? $_SESSION['oldInfo']['twitter'] : '' ; ?>" placeholder="Social link">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('twitter', $_SESSION['errors']) ? $_SESSION['errors']['twitter'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['twitter_brokenUrl']) ? $_SESSION['errors']['twitter_brokenUrl'] : '' ; ?></small>
                    </div>

                    <div class="form-group">
                        <label for="github">Github</label>
                        <input type="text" class="form-control" id="github" name="github" value="<?= isset($_SESSION['oldInfo']['github']) ? $_SESSION['oldInfo']['github'] : '' ; ?>" placeholder="Github account">
                        <small class="form-text text-danger"><?= isset($_SESSION['errors']) && array_key_exists('github', $_SESSION['errors']) ? $_SESSION['errors']['github'] : '' ; ?></small>

                        <small class="form-text text-danger"><?= isset($_SESSION['errors']['github_brokenUrl']) ? $_SESSION['errors']['github_brokenUrl'] : '' ; ?></small>
                    </div>
                </div>
            </div>

            <div class="my-2 col-12 col-md-4">
                <button type="submit" class="btn btn-outline-light btn-block font-weight-bold text-uppercase mt-3">Submit</button>
                <a href="<?= PATH ?>start" class="btn btn-warning text-uppercase small btn-block mt-2">Return back</a>
            </div>
        </form>
    </div>
</section>
<?php $_SESSION = []; ?>
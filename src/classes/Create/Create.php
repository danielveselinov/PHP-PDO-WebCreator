<?php 

namespace Maker\Company;

use Database\Connection\Db;
use PDOException;

class Company extends Db
{
    private $properties = [];

    public function __construct($properties)
    {
        $this->setProperties($properties);
    }

    /**
     * Get the value of properties
     */ 
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set the value of properties
     *
     * @return  self
     */ 
    public function setProperties($properties)
    {
        $this->properties = $properties;

        return $this;
    }

    public function insert()
    {        
        $data = $this->getProperties();

        try {
            $stmt = Db::connect()->prepare("INSERT INTO company
            (cover_img_url, title, subtitle, about, telephone, location, occupation, company_desc) VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt->execute([$data["cover_image"], $data["main_title"], $data["sub_title"], $data["page_about"], $data["tel_number"], $data["page_location"], $data["type_switcher"], $data["company_desc"]])) {
                $DBID = Db::connect()->lastInsertId();
                
                $stmt = Db::connect()->prepare("INSERT INTO cards
                (company_id, img_url_1, img_url_2, img_url_3, desc_1, desc_2, desc_3) VALUES
                (?, ?, ?, ?, ?, ?, ?)");

                if ($stmt->execute([$DBID, $data["image_url"], $data["image_url1"], $data["image_url2"], $data["desc_ser_prod"], $data["desc_ser_prod1"], $data["desc_ser_prod2"]])) {
                    $stmt = Db::connect()->prepare("INSERT INTO links
                    (company_id, linkedin, facebook, twitter, github) VALUES
                    (?, ?, ?, ?, ?)");
                    if ($stmt->execute([$DBID, $data["linkedin"], $data["facebook"], $data["twitter"], $data["github"]])) {
                        $id = encrypt($DBID);
                        $id = urlencode($id);
                        header("Location: ".PATH."company/{$id}/alert");
                        die();
                    }
                }
            }
        } catch (PDOException $ex) {
            file_put_contents(__DIR__ . "/../../log.txt", $ex->getMessage() . PHP_EOL, FILE_APPEND);
            header("Location: ".PATH."404");
            die();
        }
    }
}
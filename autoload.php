<?php
session_start(); 

require_once __DIR__ . "/src/constants.php";
require_once __DIR__ . "/src/helpers/functions.php";

# Loading database folder/files
require_once __DIR__ . "/src/database/database.php";

# Loading classes folder
require_once __DIR__ . "/src/classes/Router/Router.php";
require_once __DIR__ . "/src/classes/Create/Create.php";
<?php 
require_once "tools.php";

define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "moonlightfestival");

define("BASE_URL", "http://localhost/moonlightfestival");

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
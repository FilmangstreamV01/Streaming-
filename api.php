<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$cacheFile = "cache.json";

if (file_exists($cacheFile)) {
    echo file_get_contents($cacheFile);
} else {
    echo json_encode(["erreur" => "Cache vide. Lancez update.php"]);
}
?>

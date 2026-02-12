<?php
// Autoriser ton site GitHub Pages à lire ces données
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Nom du fichier où sont stockées les vidéos
$cacheFile = "cache.json";

// 1. Vérifier si le fichier de cache existe
if (file_exists($cacheFile)) {
    // Lire le contenu du cache
    $data = file_get_contents($cacheFile);
    
    // Envoyer les données au format JSON
    echo $data;
} else {
    // Si le cache n'existe pas encore, afficher une erreur amicale
    echo json_encode([
        "erreur" => "Le cache est vide. Veuillez lancer update.php une première fois.",
        "status" => "error"
    ]);
}
?>

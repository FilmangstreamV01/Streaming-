<?php
// --- CONFIGURATION ---
$YT_API_KEY = 'TA_CLE_API_YOUTUBE'; // Mets ta clé YouTube
$YT_CHANNEL_ID = 'UCxxxxxx';        // Mets l'ID de ta chaîne YouTube
$DM_USER_ID = 'x12345';             // Mets l'ID de ta chaîne Dailymotion

$cacheFile = "cache.json";

// --- 1. RÉCUPÉRATION YOUTUBE ---
$url_yt = "https://www.googleapis.com/youtube/v3/search?key=$YT_API_KEY&channelId=$YT_CHANNEL_ID&part=snippet,id&order=date&maxResults=25";
$res_yt = json_decode(file_get_contents($url_yt), true);

// --- 2. RÉCUPÉRATION DAILYMOTION ---
$url_dm = "https://api.dailymotion.com/user/$DM_USER_ID/videos?fields=id,title,thumbnail_720_url,url&limit=25";
$res_dm = json_decode(file_get_contents($url_dm), true);

// --- 3. FUSION DES DONNÉES ---
$final_data = [
    "youtube" => $res_yt['items'] ?? [],
    "dailymotion" => $res_dm['list'] ?? []
];

// --- 4. SAUVEGARDE ---
if (file_put_contents($cacheFile, json_encode($final_data))) {
    echo "<h1>🚀 Super Bouclier mis à jour !</h1>";
    echo "YouTube et Dailymotion sont synchronisés.";
} else {
    echo "Erreur d'écriture du cache.";
}
?>

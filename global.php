<?php
// global.php

function getLink($key) {
    static $links = null;

    // Determine the base URL dynamically
    $baseUrl = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];

    if ($links === null) {
        $jsonPath = $_SERVER['DOCUMENT_ROOT'] . '/links.json';
        if (file_exists($jsonPath)) {
            $links = json_decode(file_get_contents($jsonPath), true);
        } else {
            // Handle the case where the file doesn't exist
            error_log("links.json not found in root directory");
            return '#';
        }
    }

    // Check if the key exists in the links array
    if (isset($links[$key])) {
        $link = $links[$key];

        // If the link starts with "root/", prepend the base URL
        if (strpos($link, 'root/') === 0) {
            return $baseUrl . '/' . substr($link, 5); // Remove "root/" and prepend base URL
        }

        // Return the link as is if it doesn't start with "root/"
        return $link;
    }

    return '#'; // Default fallback link
}
?>
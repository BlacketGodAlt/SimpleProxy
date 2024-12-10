<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Validate the URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        // Use cURL to fetch the content of the URL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Error: " . curl_error($ch);
        } else {
            // Set the appropriate content type
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            header("Content-Type: $contentType");

            // Output the response
            echo $response;
        }

        curl_close($ch);
    } else {
        echo "Invalid URL.";
    }
} else {
    echo "No URL provided.";
}
?>

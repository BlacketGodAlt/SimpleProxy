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
            // Rewrite links to pass through the proxy
            $proxyBase = basename(__FILE__); // Name of the proxy file
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

            header("Content-Type: $contentType");

            // Use regex to rewrite links in the fetched content
            $response = preg_replace_callback(
                '/(href|src)=(["\'])(.*?)\2/i',
                function ($matches) use ($proxyBase) {
                    $attr = $matches[1]; // href or src
                    $quote = $matches[2]; // " or '
                    $link = $matches[3]; // URL

                    // Only rewrite absolute URLs
                    if (filter_var($link, FILTER_VALIDATE_URL)) {
                        $link = htmlspecialchars("?url=" . urlencode($link));
                    }

                    return "$attr=$quote$link$quote";
                },
                $response
            );

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

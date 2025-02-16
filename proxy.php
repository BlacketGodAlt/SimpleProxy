<?php
error_reporting(0);

// Get the target URL from the query parameter
if (!isset($_GET['url'])) {
    die("No URL specified.");
}

$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);

// Validate the URL
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    die("Invalid URL.");
}

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// Handle HTTP method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('php://input'));
}

// Pass HTTP headers from the client
$headers = getallheaders();
$curlHeaders = [];
foreach ($headers as $key => $value) {
    if (strtolower($key) !== 'host') {
        $curlHeaders[] = "$key: $value";
    }
}
curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeaders);

// Get response
$response = curl_exec($ch);
$info = curl_getinfo($ch);
$httpCode = $info['http_code'];
$contentType = $info['content_type'];
curl_close($ch);

// Set response headers
http_response_code($httpCode);
header("Content-Type: $contentType");

// Output the response
echo $response;
?>

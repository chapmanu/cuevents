<?php
$allowed_origins = [
    'https://www.your-university.edu',  
    'https://a.cms.omniupdate.com' 
];

// The only host we will allow RSS feeds to be fetched from.
$allowed_feed_host = '25livepub.collegenet.com';
// =============================================================================


// --- 1. SET HEADERS ---

// Send the CORS header to allow your website to access this script.
header("Access-Control-Allow-Origin: " . $allowed_origin);
// Set the content type to JSON so the browser knows how to handle the response.
header('Content-Type: application/json');


// --- 2. SECURITY VALIDATION ---

// Check if the 'url' parameter was provided in the request
if (empty($_GET['url'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'URL parameter is missing.']);
    exit; // Stop script execution
}

$feedUrl = $_GET['url'];

// Use PHP's parse_url() to safely break the URL into its components
$urlParts = parse_url($feedUrl);

// Validate the provided URL against our security rules
if (
    $urlParts === false ||                  // Check if the URL is malformed
    !isset($urlParts['scheme']) ||          // Check for a scheme (http/https)
    $urlParts['scheme'] !== 'https' ||       // Enforce HTTPS for security
    !isset($urlParts['host']) ||            // Check for a host
    $urlParts['host'] !== $allowed_feed_host // Ensure the host matches our whitelist
) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'The provided URL is not valid or is not from an allowed domain.']);
    exit;
}


// --- 3. FETCH AND PARSE THE FEED ---

// Use the '@' symbol to suppress warnings on failure; we'll handle errors manually
$xmlString = @file_get_contents($feedUrl);

if ($xmlString === false) {
    http_response_code(502); // Bad Gateway (couldn't fetch from the source)
    echo json_encode(['error' => 'Failed to fetch the RSS feed from the source server.']);
    exit;
}

// Disable libxml errors to prevent leaking path information and handle parsing errors gracefully
libxml_use_internal_errors(true);
$rss = simplexml_load_string($xmlString);

if ($rss === false) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to parse the RSS feed. The feed may be malformed.']);
    exit;
}


// --- 4. FORMAT AND OUTPUT THE DATA ---

$items = [];

// Check if the expected XML structure exists
if (isset($rss->channel->item)) {
    // Loop through each <item> in the <channel>
    foreach ($rss->channel->item as $item) {
        $items[] = [
            'title'       => (string) $item->title,
            'link'        => (string) $item->link,
            'description' => (string) $item->description,
            // RSS feeds often use 'pubDate'. Check for its existence.
            'date'        => isset($item->pubDate) ? (string) $item->pubDate : null, 
        ];
    }
}

// Success! Encode the final array into JSON and send it to the browser.
echo json_encode($items);

?>
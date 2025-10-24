<?php
/**
 * moderncampus-getrssfeed.php
 * A secure script to fetch and parse an RSS feed from a specific domain.
 * This version supports multiple allowed origin domains for CORS.
 */

// =============================================================================
//  CONFIGURATION - **ACTION REQUIRED**
// =============================================================================
// This is your whitelist of domains that are allowed to make requests to this script.
// It includes your production domain and your CMS/staging domain.
$allowed_origins = [
    'https://www.chapman.edu',          // Your main production website
    'https://a.cms.omniupdate.com'       // The Modern Campus testing domain
];

// The only host we will allow RSS feeds to be fetched from.
$allowed_feed_host = '25livepub.collegenet.com';
// =============================================================================


// =============================================================================
//  THIS IS THE KEY PART THAT FIXES THE ERROR
// =============================================================================
// Dynamically check the incoming request's origin against the whitelist.
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // If the origin of the request is in our array of allowed origins...
    if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
        // ...then send back a header that specifically allows that origin.
        header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
    } else {
        // If the origin is NOT in our whitelist, block the request as forbidden.
        http_response_code(403); // Forbidden
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Origin not allowed.']);
        exit; // Stop script execution immediately.
    }
}
// =============================================================================


// Set the content type to JSON so the browser knows how to handle the response.
header('Content-Type: application/json');


// --- SECURITY VALIDATION ---

if (empty($_GET['url'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'URL parameter is missing.']);
    exit;
}

$feedUrl = $_GET['url'];
$urlParts = parse_url($feedUrl);

if (
    $urlParts === false ||
    !isset($urlParts['scheme']) || $urlParts['scheme'] !== 'https' ||
    !isset($urlParts['host']) || $urlParts['host'] !== $allowed_feed_host
) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'The provided URL is not valid or is not from an allowed domain.']);
    exit;
}


// --- FETCH AND PARSE THE FEED ---

$xmlString = @file_get_contents($feedUrl);

if ($xmlString === false) {
    http_response_code(502); // Bad Gateway
    echo json_encode(['error' => 'Failed to fetch the RSS feed from the source server.']);
    exit;
}

libxml_use_internal_errors(true);
$rss = simplexml_load_string($xmlString);

if ($rss === false) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to parse the RSS feed. The feed may be malformed.']);
    exit;
}


// --- FORMAT AND OUTPUT THE DATA ---

$items = [];
if (isset($rss->channel->item)) {
    foreach ($rss->channel->item as $item) {
        $items[] = [
            'title'       => (string) $item->title,
            'link'        => (string) $item->link,
            'description' => (string) $item->description,
            'date'        => isset($item->pubDate) ? (string) $item->pubDate : null, 
        ];
    }
}

echo json_encode($items);

?>
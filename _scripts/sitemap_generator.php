<?php

/**
 * Sitemap Generator for Chapman Events
 *
 * This script fetches an RSS feed of events, extracts the event ID from each item,
 * constructs the proper event URL, and generates a sitemap.xml file.
 *
 * It is designed to be run by a weekly cron job.
 */

// --- CONFIGURATION ---
$baseUrl = getenv('APP_BASE_URL') ?: 'https://events.chapman.edu';

// The source of event data.
define('RSS_FEED_URL', 'https://25livepub.collegenet.com/calendars/test-public-events-calendar.rss');

// The base URL for your event pages. The event ID will be appended to this.
// Note: The trumbaEmbed parameter is already URL-encoded as requested.
define('BASE_EVENT_URL', 'https://events.chapman.edu/index.php?trumbaEmbed=view%3Devent%26eventid%3D');

// The full path and filename where the sitemap.xml will be saved.
// IMPORTANT: Make sure this path is writable by your web server/PHP process.
// Example for a standard web root: '/var/www/html/sitemap.xml'
define('SITEMAP_PATH', __DIR__ . '/../sitemap.xml');

// --- SCRIPT LOGIC ---

echo "Starting sitemap generation...\n";

try {
    // 1. Fetch the RSS feed content using cURL for reliability
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, RSS_FEED_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 30-second timeout
    $rssContent = curl_exec($ch);

    if (curl_errno($ch)) {
        throw new Exception('cURL Error: ' . curl_error($ch));
    }
    curl_close($ch);

    if (empty($rssContent)) {
        throw new Exception('Failed to fetch RSS feed or the feed is empty.');
    }

    // 2. Parse the RSS feed (XML)
    // Suppress errors for invalid XML, as we'll catch it with the === false check
    $rss = @simplexml_load_string($rssContent);

    if ($rss === false) {
        throw new Exception('Failed to parse the RSS feed. It may be malformed.');
    }

    // 3. Create a new XML document for the sitemap
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true; // Makes the output readable

    // Create the root <urlset> element with its namespace
    $urlset = $dom->createElement('urlset');
    $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    $dom->appendChild($urlset);

    // Explicit list of section landing pages (keep in sync with calendar-links.php).
    $sectionUrls = [
        $baseUrl . '/index.php',
        $baseUrl . '/argyros/index.php',
        $baseUrl . '/attallah/index.php',
        $baseUrl . '/copa/index.php',
        $baseUrl . '/crean/index.php',
        $baseUrl . '/dodge/index.php',
        $baseUrl . '/engineering/index.php',
        $baseUrl . '/law/index.php',
        $baseUrl . '/musco/index.php',
        $baseUrl . '/pharmacy/index.php',
        $baseUrl . '/schmid/index.php',
        $baseUrl . '/communication/index.php',
        $baseUrl . '/wilkinson/index.php',
        $baseUrl . '/students/index.php'
    ];

    foreach ($sectionUrls as $url) {
        $urlNode = $dom->createElement('url');
        $urlNode->appendChild($dom->createElement('loc', htmlspecialchars($url)));
        $urlNode->appendChild($dom->createElement('lastmod', date('Y-m-d')));
        $urlNode->appendChild($dom->createElement('changefreq', 'weekly'));
        $urlset->appendChild($urlNode);
    }

    // 4. Loop through each <item> in the RSS feed
    foreach ($rss->channel->item as $item) {
        // Get the link from the RSS item
        $link = (string)$item->link;

        // Parse the link to extract its query parameters
        $queryString = parse_url($link, PHP_URL_QUERY);
        parse_str($queryString, $params);

        // Check if an 'eventid' was found
        if (isset($params['eventid']) && !empty($params['eventid'])) {
            $eventId = $params['eventid'];

            // Construct the final event URL for the sitemap
            $locUrl = BASE_EVENT_URL . $eventId;

            // Get the publication date for <lastmod>
            // and format it to YYYY-MM-DD
            $pubDate = (string)$item->pubDate;
            $lastMod = date('Y-m-d', strtotime($pubDate));

            // Create the <url> element
            $urlNode = $dom->createElement('url');

            // Create and append child elements
            $urlNode->appendChild($dom->createElement('loc', htmlspecialchars($locUrl)));
            $urlNode->appendChild($dom->createElement('lastmod', $lastMod));
            $urlNode->appendChild($dom->createElement('changefreq', 'weekly'));

            // Append the <url> node to the root <urlset>
            $urlset->appendChild($urlNode);
        }
    }

    // 5. Save the generated XML to the specified file path
    if ($dom->save(SITEMAP_PATH)) {
        echo "Sitemap successfully generated at: " . SITEMAP_PATH . "\n";
    } else {
        throw new Exception('Failed to save the sitemap.xml file. Check path and permissions.');
    }

} catch (Exception $e) {
    // Log errors for debugging
    error_log('Sitemap Generation Failed: ' . $e->getMessage());
    echo 'Error: ' . $e->getMessage() . "\n";
    // Exit with a non-zero status code to indicate failure to the cron daemon
    exit(1); 
}

exit(0); // Success
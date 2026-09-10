<?php
/**
 * Extract search term from URL query parameters.
 * Supports ?search=term and ?trumbaEmbed=search%3Dterm
 */
function getTrumbaSearchTerm() {
    if (!empty($_GET['search'])) {
        return trim($_GET['search']);
    }

    if (!empty($_GET['trumbaEmbed'])) {
        $embed = urldecode($_GET['trumbaEmbed']);
        if (preg_match('/(?:^|&)search=([^&]*)/', $embed, $matches)) {
            return trim($matches[1]);
        }
        if (preg_match('/^search=(.*)$/', $embed, $matches)) {
            return trim($matches[1]);
        }
    }

    return '';
}

$trumbaSearchTerm = getTrumbaSearchTerm();

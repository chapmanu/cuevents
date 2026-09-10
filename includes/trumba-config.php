<?php
/**
 * Search URL feature toggle.
 *
 * Instant rollback in production (no redeploy):
 *   Azure Portal → cuevents → Settings → Environment variables
 *   Set ENABLE_SEARCH_URL_SYNC = false
 *
 * Full rollback via git (restores pre-feature code):
 *   git revert <commit-hash> && git push origin main
 */
$enableSearchUrlSync = getenv('ENABLE_SEARCH_URL_SYNC') !== 'false';

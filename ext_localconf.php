<?php

defined('TYPO3') or die();

use GuzzleHttp\Middleware;
use Ideative\VerboseGuzzle\Handler\BodySummarizer;

// Register handler for adjusting Guzzle error messages truncation length
$GLOBALS['TYPO3_CONF_VARS']['HTTP']['handler']['verbose_guzzle'] = Middleware::httpErrors(new BodySummarizer());

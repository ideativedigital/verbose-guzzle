<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Ideative\VerboseGuzzle\Handler;

use GuzzleHttp\BodySummarizerInterface;
use GuzzleHttp\Psr7\Message;
use Psr\Http\Message\MessageInterface;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Truncate Guzzle exception messages to a selected length of characters
 */
final class BodySummarizer implements BodySummarizerInterface
{
    private int $truncateAt;

    public function __construct()
    {
        try {
            // Get truncation length from the extension configuration, or fall back to default
            $this->truncateAt = (int)GeneralUtility::makeInstance(ExtensionConfiguration::class)
                ->get('verbose_guzzle', 'messageLength');
        } catch (\Throwable) {
            $this->truncateAt = 1000;
        }
    }

    /**
     * Returns a summarized message body.
     */
    public function summarize(MessageInterface $message): ?string
    {
        return Message::bodySummary($message, $this->truncateAt);
    }
}

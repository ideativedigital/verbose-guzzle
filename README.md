# Make Guzzle more verbose

This tiny TYPO3 extension makes it possible to define the length used
for truncating exception messages by the Guzzle HTTP library. By default,
the truncation length of Guzzle is 120, which can be frustratingly short.

With this extension, the truncation length can be defined simply as an
extension setting, and defaults to 1000 characters.

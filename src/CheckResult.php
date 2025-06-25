<?php


/**
 * Check result data
 */
readonly class CheckResult
{
    public function __construct(
        public string $name,
        public bool $result,
        public ?string $error = null
    ) {
    }
}
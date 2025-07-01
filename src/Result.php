<?php

namespace Vesh95\Heartbeat;

/**
 * Check result data
 */
readonly class Result
{
    public function __construct(
        public string $name,
        public bool $result,
        public ?string $error = null
    ) {
    }
}
<?php

namespace Vesh95\Pulse;

/**
 * Check interface
 */
interface CheckInterface
{
    /**
     * @return Result
     */
    public function check(): Result;
}
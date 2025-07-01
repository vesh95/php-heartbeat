<?php

namespace Vesh95\Heartbeat;

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
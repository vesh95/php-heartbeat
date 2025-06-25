<?php

namespace vesh95\pulse;

/**
 * Check interface
 */
interface CheckInterface
{
    /**
     * @return CheckResult
     */
    public function check(): CheckResult;
}
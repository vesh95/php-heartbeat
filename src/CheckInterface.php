<?php


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
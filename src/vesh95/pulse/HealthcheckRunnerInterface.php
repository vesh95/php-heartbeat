<?php

namespace vesh95\pulse;

/**
 * Healthcheck runner interface
 */
interface HealthcheckRunnerInterface
{
    /**
     * Append a check to the runner
     *
     * @param CheckInterface $check
     *
     * @return HealthcheckRunnerInterface
     */
    public function append(CheckInterface $check): HealthcheckRunnerInterface;

    /**
     * @return CheckResultsCollection
     */
    public function run(): CheckResultsCollection;
}
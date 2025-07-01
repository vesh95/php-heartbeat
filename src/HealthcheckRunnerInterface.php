<?php

namespace Vesh95\Heartbeat;

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
     * @return ResultsCollection
     */
    public function run(): ResultsCollection;
}